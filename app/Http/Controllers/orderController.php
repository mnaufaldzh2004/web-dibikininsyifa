<?php

namespace App\Http\Controllers;

use App\Models\Ilustrator;
use App\Models\User;
use App\Models\Order;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use App\Models\Service;
use  App\Models\Option;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CustomerObject;
use Xendit\Invoice\CreateInvoiceRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
class orderController extends Controller
{
    public function order($id){
        $service = Service::findOrFail($id);
        $options = Option::all();
        $ilustrators = Ilustrator::all();
        return view('user.order', compact('service', 'options', 'ilustrators'));

    }



    public function storeOrder(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'service_id' => 'required',
        'ilustrator_id' => 'required',
        'image' => 'required|image',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator);
    }

    $service = Service::findOrFail($request->service_id);

    $ilustrator = Ilustrator::findOrFail($request->ilustrator_id);

   $options = [];
$additionalPrice = 0;

if ($request->opsi) {

    $options = Option::whereIn(
        'id',
        $request->opsi
    )->get();

    foreach ($options as $option) {

        $additionalPrice += $option->additional_price;

    }
}

    // upload image
    $imagePath = $request->file('image')
        ->store('orders', 'public');

    // subtotal
    $subtotal = $service->base_price + $additionalPrice;

    // fee 2%
    $fee = $subtotal * 0.02;

    // total
    $totalPrice = $subtotal + $fee;

    // create user
    $user = User::firstOrCreate(
        [
            'phone' => $request->phone
        ],
        [
            'name' => $request->name,
            'role_id' => 2,
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'status' => 'active'
        ]
    );

    // create order
    $order = Order::create([
        'order_code' => 'ORD-' . time(),
        'user_id' => $user->id,
        'ilustrator_id' => $ilustrator->id,
        'service_id' => $service->id,
        'status' => 'pending',
        'total_price' => $totalPrice,
        'image' => $imagePath,
        'payment_date' => null,
        'notes' => $request->notes
    ]);
     

   foreach ($options as $option) {

    OrderDetail::create([
        'order_id' => $order->id,
        'additional_option_id' => $option->id,
        'subtotal' => $option->additional_price,
    ]);

}

    Configuration::setXenditKey(config('xendit.xendit.api_key'));

    $apiInstance = new InvoiceApi();

    $customer = new CustomerObject([
        'given_names' => $user->name,
        'mobile_number' => $user->phone
    ]);

    $create_invoice_request = new CreateInvoiceRequest([
        'external_id' => $order->order_code,
        'amount' => (float) $order->total_price,
        'invoice_duration' => 86400,
        'description' =>  'Pembayaran untuk order ' . $order->order_code,
        'customer' => $customer,

       'success_redirect_url' => "http://localhost:8000/success/" . $order->order_code,
    
        'failed_redirect_url' => "http://localhost:8000/failed",
    ]);

    try {
    $result = $apiInstance->createInvoice($create_invoice_request);
   
    $order->invoice_url = $result['invoice_url'];
    $order->save();

    
    return redirect($result['invoice_url']);

    } catch (\Xendit\XenditSdkException $e) {
    return redirect()->back()->with('error', 'Gagal membuat invoice: ' . $e->getMessage());
}
    }


     public function handleCallback(Request $request)
{

    $callbackToken = $request->header('x-callback-token');

    if($callbackToken !== config('xendit.xendit.callback_token')){
        return response()->json([
            'status' => 'error',
            'message'=> 'Token tidak valid'
        ], 403);
    }
    $data = $request->all();
    $externalId = $data['external_id']; 
    $status = $data['status']; 
    $payment_method = $data['payment_method'];
    $payment_channel = $data['payment_channel'];
    $paid_at = $data['paid_at'];

  
    $order = Order::where('order_code', $externalId)->first();

    if (!$order) {
       
        
        
        return response()->json([
            'status' => 'error',
            'message' => 'Order tidak ditemukan'
        ], 404);
    }

    $order->status = $status; 
    $order->payment_channel = $payment_channel;
    $order->payment_method = $payment_method;
  $order->payment_date = $paid_at  ? Carbon::parse($paid_at) : null;
    $order->save();

   
    return response()->json([
        'status' => 'success',
        'message' => 'Berhasil update status ke ' . $status
    ]);
}

    public function paymentSuccess($orderId){


       $orders = Order::with(['detailOrder', 'ilustrator', 'user', 'service' ])->where('order_code', $orderId)->first();

       if(!$orders){
        return redirect()->route('home')->with('error', 'Pesanan Tidak Ditemukan');
       }

       return view('user.success', compact('orders'));
    }
} 


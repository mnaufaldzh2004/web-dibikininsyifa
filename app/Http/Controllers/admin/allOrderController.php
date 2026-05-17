<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\orderDetail;

class allOrderController extends Controller
{
     public function index(){

        $orders  = Order::with(['user', 'service', 'ilustrator'])->get();

        return view('admin.order.index', compact('orders'));
    }

    public function show($orderId){

    $order= Order::findOrFail($orderId);
     $orderDetail=  orderDetail::where('order_id', $order->id)->get();
       

        return view('admin.order.show', compact('order', 'orderDetail'));
    }
}

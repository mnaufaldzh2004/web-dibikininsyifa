<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class allOrderController extends Controller
{
     public function index(){

        $orders  = Order::with(['user', 'service', 'ilustrator'])->get();

        return view('admin.order', compact('orders'));
    }
}

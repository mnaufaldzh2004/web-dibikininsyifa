<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class dashboardController extends Controller
{
     public function index(){


        $totalOrders = Order::where('status', 'PAID')->count();
        $totalOrdersNow = Order::whereDate('created_at', now())->where('status', 'PAID')->count();
        $totalIncome = Order::where('status', 'PAID')->sum('total_price');
        $totalIncomeNow = Order::whereDate('created_at', now())->where('status', 'PAID')->sum('total_price');

        return view('admin.dashboard', compact('totalOrdersNow', 'totalOrders', 'totalIncome', 'totalIncomeNow'));
        
    }
}

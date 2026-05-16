<?php

use App\Http\Controllers\admin\allOrderController;
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\admin\dashboardController;
// Route::get('/', function () {
//     return view('user.home');
// });

// Route::get('/order', function () {
//     return view('user.order');
// });


Route::get('/success', function () {
    return view('user.success');
});

Route::post('/payments/webhook', [orderController::class, 'handleCallback']);



Route::get('/user-portofolio/{id}', [landingPageController::class, 'detailIlustrator'])->name('user.portofolio');

Route::get('/', [landingPageController::class, 'index'])->name('home');
Route::get('/order/{id}', [orderController::class, 'order'])->name('order');
Route::post('/payment', [ordercontroller::class, 'storeOrder'])->name('payment');
Route::post('/payments/webhook', [orderController::class, 'handleCallback']);
Route::get('/success/{orderId}', [orderController::class, 'paymentSuccess'])->name('success');


//dashboard 

Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::get('all-order', [allOrderController::class, 'index'])->name('allorder');
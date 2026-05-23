<?php

use App\Http\Controllers\admin\allOrderController;
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\ilustratorController;
use App\Http\Controllers\admin\optionController;
use App\Http\Controllers\admin\portofolioController;
use App\Http\Controllers\admin\roleController;
use App\Http\Controllers\admin\serviceController;
use App\Http\Controllers\admin\profileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
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


Route::middleware('guest')->group(function(){
     Route::get('login', [AuthenticatedSessionController::class, 'create']) ->name('login');
  Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
 

//dashboard  untuk admin

Route::middleware('role:admin')->group(function(){
    Route::resource('ilustrator', ilustratorController::class);
    Route::resource('services', serviceController::class);
    Route::resource('roles', roleController::class);
    Route::resource('options', optionController::class);
});


//dashboard ilustrator dan admin

Route::middleware('role:admin|ilustrator')->group(function(){ 
 Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('all-order', [allOrderController::class, 'index'])->name('allorder');
Route::get('detail-order/{orderId}', [allOrderController::class, 'show'])->name('detailorder.show');
Route::get('editPassword', [PasswordController::class, 'index'])->name('editPassword');
Route::put('updatePassword', [PasswordController::class, 'update'])->name('password.update');
Route::resource('profile', profileController::class);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware('role:ilustrator')->group(function(){
    Route::resource('portofolio', portofolioController::class);
});





// require __DIR__.'/auth.php';
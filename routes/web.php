<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/view_catagory', [AdminController::class, 'view_catagory']);

Route::post('/add_catagory', [AdminController::class, 'add_catagory']);

Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);

Route::get('/view_product', [AdminController::class, 'view_product']);

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/show_product', [AdminController::class, 'show_product']);

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

Route::get('/order', [AdminController::class, 'order']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);





Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

Route::get('/show_cart', [HomeController::class, 'show_cart']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::get('/cash_order/{totalproduct}', [HomeController::class,'cash_order']);

Route::controller(HomeController::class)->group(function(){
    Route::get('/stripe/{totalPrice}', 'stripe');
    Route::post('/stripe/{totalprice}', 'stripePost')->name('stripe.post');
});
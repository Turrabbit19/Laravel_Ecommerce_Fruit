<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CouponController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->middleware('isAdmin')->group(function() {
    Route::get('/', function() {
        return view('admin.dashboard');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    Route::resource('banners', BannerController::class);
    Route::resource('coupons', CouponController::class);

    Route::resource('orders', OrderController::class);
    Route::patch('orders/{order}/updateStatus', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
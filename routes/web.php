<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('product/{product:slug}', [HomeController::class, 'product'])->name('product');

Route::get('cart', [CartController::class, 'viewCart'])->name('cart');
Route::post('addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('updateCart', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('removeCart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');

Route::get('checkout', [CheckoutController::class, 'viewCheckout'])->name('checkout');

Route::get('thanks', [CheckoutController::class, 'thankYou'])->name('thanks');
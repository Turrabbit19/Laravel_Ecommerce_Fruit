<?php

use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Auth\RegisterController;
use App\Http\Controllers\Client\Auth\ProfileController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\OrderController;
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
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('product/{product:slug}', [HomeController::class, 'product'])->name('product');

Route::get('cart', [CartController::class, 'viewCart'])->name('cart');
Route::post('addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('updateCart', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('removeCart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');

Route::get('checkout', [CheckoutController::class, 'viewCheckout'])->name('checkout')->middleware('auth', 'verified');
Route::post('order', [OrderController::class, 'order'])->name('order');

Route::get('thanks', [CheckoutController::class, 'thankYou'])->name('thanks')->middleware('auth', 'verified');

Route::get('auth/login', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'login'])->name('login');
Route::get('auth/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth', 'verified');
Route::get('auth/verify/{token}', [LoginController::class, 'verify'])->name('verifyEmail');

Route::get('auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register'])->name('register');
Route::get('auth/verify', [RegisterController::class, 'verify'])->name('verify');

Route::get('auth/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth', 'verified');
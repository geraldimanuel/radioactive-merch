<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate');
    
});

Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
});

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/ticket', 'index');
//     Route::post('/checkout', 'checkout');
//     Route::get('/invoice/{id}', 'invoice');
// });

Route::middleware('guest')->controller(ResetPasswordController::class)->group(function() {
    Route::get('/forgot-password', 'index')->name('password.request');
    Route::post('/forgot-password', 'forgot_password')->name('password.email');
    Route::get('/reset-password/{token}', 'reset_token')->name('password.reset');
    Route::post('/reset-password', 'reset')->name('passord.update');;
});

Route::controller(MerchController::class)->group(function () {
    Route::get('/', 'index'); // endpoint null
    Route::get('/cart', 'cart');
    Route::post('/cart/{id}', 'addToCart');
    // Route::get('/merch', 'home');
    Route::get('item/', 'merch');
    Route::get('item/{id}', 'ShowItem');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart/{id}', 'removeFromCart');
    Route::get('/checkout', 'checkout');
    Route::get('/dashboard', 'dashboard');
    Route::get('item/{id}'. 'removeFromCart');
});
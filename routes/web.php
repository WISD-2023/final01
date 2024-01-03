<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');

Route::get('/order', [OrderController::class, 'index'])->name('order');

Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::put('/pay/{order}', [OrderController::class, 'pay'])->name('order.pay');
Route::get('/orderdetail/{order}', [OrderController::class, 'showOrderDetail'])->name('order.detail');

Route::middleware('auth')->group(function () {
    // 使用新的 MemberController 來更新個人資料
    Route::put('/update-profile', [MemberController::class, 'update'])->name('update-profile');
});

Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';

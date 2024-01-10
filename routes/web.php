<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembersFriendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\MarketController;

// use App\Http\Controllers\FriendController;
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
Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/{order}/edit', [OrderController::class, 'edit'])->name('order.edit');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::put('/order/{order}/update', [OrderController::class, 'update'])->name('order.update');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');

Route::put('/pay/{order}', [OrderController::class, 'pay'])->name('order.pay');
Route::get('/orderdetail/show/{order}', [OrderController::class, 'showOrderDetail'])->name('order.detail.show');

Route::middleware(['web', 'auth'])->group(function () {
    // 使用新的 MemberController 來更新個人資料
    Route::put('/update-profile', [MemberController::class, 'update'])->name('update-profile');
    Route::post('/friend', [MembersFriendController::class, 'store'])->name('friend.store');
    Route::resource('friend', MembersFriendController::class)->except(['create', 'store']);
    Route::post('/product/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

//Route::delete('/friend/{friend}', [MembersFriendController::class, 'destroy'])->name('friend.destroy');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::post('/product/gift-order', [ProductController::class, 'giftOrder'])->name('products.gift-order');
Route::get('/product/{product}/gift-order', [ProductController::class, 'showGiftOrderPage'])->name('products.show-gift-order');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/seller/index', [SellerController::class, 'store'])->name('seller.store');
Route::resource('seller', SellerController::class)->except(['store', 'create']);

Route::resource('seller.market', MarketController::class)->except(['show', 'create', 'update']);
Route::post('/seller/marker/index', [MarketController::class, 'store'])->name('seller.market.store');
Route::get('/seller/market/{market}', [MarketController::class, 'show'])->name('seller.market.show');
Route::post('/seller/market/{market}', [MarketController::class, 'update'])->name('seller.market.update');
/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__ . '/auth.php';

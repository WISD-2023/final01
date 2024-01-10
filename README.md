# 系統畫面

# 系統的主要功能與負責的同學
★ 商品
- Route::get('/', [ProductController::class, 'index'])->name('products.index'); [3B032106 李宣佑](https://github.com/3B032106)
- Route::post('/product/store', [ProductController::class, 'store'])->name('product.store'); [3B032123 顏妤年](https://github.com/3B032123)
- Route::post('/product/gift-order', [ProductController::class, 'giftOrder'])->name('products.gift-order'); [3B032106 李宣佑](https://github.com/3B032106)
- Route::get('/product/{product}/gift-order', [ProductController::class, 'showGiftOrderPage'])->name('products.show-gift-order'); [3B032106 李宣佑](https://github.com/3B032106)
- Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.product'); [3B032106 李宣佑](https://github.com/3B032106)

★ 購物車
- Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); [3B032106 李宣佑](https://github.com/3B032106)
- Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store'); [3B032112 陳泰恩](https://github.com/3B032112)
- Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy'); [3B032112 陳泰恩](https://github.com/3B032112)

★ 訂單
- Route::get('/order', [OrderController::class, 'index'])->name('order.index'); [3B032106 李宣佑](https://github.com/3B032106)
- Route::get('/order/{order}/edit', [OrderController::class, 'edit'])->name('order.edit'); [3B032106 李宣佑](https://github.com/3B032106)
- Route::post('/order', [OrderController::class, 'store'])->name('order.store'); [3B032106 李宣佑](https://github.com/3B032106)
- Route::put('/order/{order}/update', [OrderController::class, 'update'])->name('order.update'); [3B032112 陳泰恩](https://github.com/3B032112)
- Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy'); [3B032112 陳泰恩](https://github.com/3B032112)
- Route::put('/pay/{order}', [OrderController::class, 'pay'])->name('order.pay'); [3B032112 陳泰恩](https://github.com/3B032112)
- Route::get('/orderdetail/show/{order}', [OrderController::class, 'showOrderDetail'])->name('order.detail.show'); [3B032112 陳泰恩](https://github.com/3B032112)

★ 會員
- Route::put('/update-profile', [MemberController::class, 'update'])->name('update-profile'); [3B032123 顏妤年](https://github.com/3B032123)
- Route::post('/friend', [MembersFriendController::class, 'store'])->name('friend.store'); [3B032123 顏妤年](https://github.com/3B032123)
- Route::resource('friend', MembersFriendController::class)->except(['create', 'store']); [3B032123 顏妤年](https://github.com/3B032123)
- Route::post('/product/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store'); [3B032112 陳泰恩](https://github.com/3B032112)
- Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard'); [3B032106 李宣佑](https://github.com/3B032106)

★ 賣家
- Route::get('/seller/index', [SellerController::class, 'store'])->name('seller.store'); [3B032123 顏妤年](https://github.com/3B032123)
- Route::resource('seller', SellerController::class)->except(['store', 'create']); [3B032123 顏妤年](https://github.com/3B032123)
- Route::resource('seller.market', MarketController::class)->except(['show', 'create', 'update']); [3B032123 顏妤年](https://github.com/3B032123)
- Route::post('/seller/marker/index', [MarketController::class, 'store'])->name('seller.market.store'); [3B032123 顏妤年](https://github.com/3B032123)
- Route::get('/seller/market/{market}', [MarketController::class, 'show'])->name('seller.market.show'); [3B032123 顏妤年](https://github.com/3B032123)
- Route::post('/seller/market/{market}', [MarketController::class, 'update'])->name('seller.market.update'); [3B032112 陳泰恩](https://github.com/3B032112)

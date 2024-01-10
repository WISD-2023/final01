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

★ 各項功能完善 [3B032106 李宣佑](https://github.com/3B032106) [3B032112 陳泰恩](https://github.com/3B032112) [3B032123 顏妤年](https://github.com/3B032123)

★ Model 關聯 [3B032106 李宣佑](https://github.com/3B032106)

## ERD

## 關聯式綱要圖

## 實際資料表欄位設計

## 初始專案與負責資料庫的同學
- 初始專案 [3B032106 李宣佑](https://github.com/3B032106)
- 資料庫 [3B032106 李宣佑](https://github.com/3B032106) [3B032112 陳泰恩](https://github.com/3B032112) [3B032123 顏妤年](https://github.com/3B032123)

## 額外使用的套件或樣板
★ 前台樣板 https://startbootstrap.com/template/shop-homepage

作為前台首頁使用，方便簡單的商品頁面

★ 前台Icon https://fontawesome.com/

作為前台商品詳細資訊使用，顯示小圖示

## 系統測試資料
使用 Seeder 自動產生資料
```
artisan db:seed
```

## 使用者測試帳號
- 帳號: `user@localhos`
- 密碼: `password`

## 系統復原步驟
1. 複製 ``git@github.com:WISD-2023/final01.git`` (或是[https://github.com/WISD-2023/final01.git](https://github.com/WISD-2023/final01))

   打開 cmder，進入 www，輸入 `git@github.com:WISD-2023/final01.git` 切換至專案所在資料夾 => `cd final03` 或是 系統環境已經安裝 composer, nodejs, npm, php 並且 sql port 為 33060 可以直接執行 ``build.bat`` 自動化腳本(for Windows)
2. cmder 輸入以下命令，復原專案
   - `composer install`
   - `cp .env.example .env`
   - `artisan key:generate`
   - `npm install`
   - `npm run build`
3. 修改 .env 檔案
   - `DB_CONNECTION=mysql`
   - `DB_HOST=127.0.0.1`
   - `DB_PORT=33060`
   - `DB_DATABASE=final03`
   - `DB_USERNAME=root`
   - `DB_PASSWORD=root`
4. 復原DB/建立資料庫
   - `artisan migrate`
5. 建立模擬資料
   - `artisan db:seed`

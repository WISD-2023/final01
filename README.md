
# 系統畫面
★ 訪客 首頁

購物網站首頁及登入按鈕
![image](https://github.com/WISD-2023/final01/assets/145514645/1e3522fd-18aa-4944-b7e1-fef43d1fb112)

★ 會員 首頁

購物網站首頁 購物車及訂單狀態等會員功能 
![image](https://github.com/WISD-2023/final01/assets/145514645/9223de48-e61b-4471-aba0-639b3c96696a)

★ 會員 首頁

購物網站首頁 點選會員姓名可有更多會員功能
![image](https://github.com/WISD-2023/final01/assets/145514645/3b046865-9197-4f63-af16-91b9a920f970)

★ 訪客/會員 首頁

搜尋商品
![image](https://github.com/WISD-2023/final01/assets/145514645/7ee1063e-f7db-4008-a681-4a0f68b43a33)
![image](https://github.com/WISD-2023/final01/assets/145514645/bcfc5dfa-6116-4734-af45-ae792f5297be)

★ 訪客 查看商品資訊

包含名稱、商品說明、商品狀態、價格、評論及加入購物車，登入後才可評論
![image](https://github.com/WISD-2023/final01/assets/145514645/2f374e8a-376f-479e-a28a-bebee4b77e2f)
![image](https://github.com/WISD-2023/final01/assets/145514645/9c846ce6-cd44-4739-9e78-43dddc083f8d)

★ 會員 查看商品資訊

包含名稱、商品說明、商品狀態、價格、評論及加入購物車，會員可發表評論及進行好友贈送
![image](https://github.com/WISD-2023/final01/assets/145514645/bfb13879-7df3-459f-a483-ea165fb0a1b7)
![image](https://github.com/WISD-2023/final01/assets/145514645/4caa2c80-9cec-4782-94ff-4f3aa7cb9cbf)

★ 會員 購物車

購物車內容及結帳資訊進行購買
![image](https://github.com/WISD-2023/final01/assets/145514645/862ccb37-7e19-4f34-b0a3-bbbfc906e039)

★ 會員 訂單狀態

顯示目前訂單 可查看明細及付款
![image](https://github.com/WISD-2023/final01/assets/145514645/f2ae9994-a608-49b0-bcfc-c998e9a2bb9b)

★ 會員 訂單明細

顯示明細 可修改及刪除此筆訂單
![image](https://github.com/WISD-2023/final01/assets/145514645/dae2c3b8-a9bb-41a3-84e1-577486530343)

★ 會員 個人資訊

顯示個人資訊 可修改個人資訊及變更密碼
![image](https://github.com/WISD-2023/final01/assets/145514645/c81fff92-1dca-4da4-8be8-5eeb69a6e883)
![image](https://github.com/WISD-2023/final01/assets/145514645/2bc602fb-6211-4ee9-9d69-e16775782b51)

★ 會員 好友

顯示好友 可加入好友及解除好友關係
![image](https://github.com/WISD-2023/final01/assets/145514645/0dfac207-46af-447d-a464-ec659d2680f7)

★ 會員不是賣家 賣家

可申請成為賣家
![image](https://github.com/WISD-2023/final01/assets/145514645/6239bd2d-ed79-48ea-b20f-3035f2dd81ba)

★ 會員已是賣家 賣家

顯示自己所有的賣場 可進入賣場及建立新賣場
![image](https://github.com/WISD-2023/final01/assets/145514645/16dae799-418a-4d90-abc6-ef2f93f4bbfe)

★ 賣家 賣場管理

顯示賣場內的商品 可修改賣場資訊
![image](https://github.com/WISD-2023/final01/assets/145514645/267ba03e-c420-4a8d-a6e0-a64e2d5ad0fa)

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
![image](https://github.com/WISD-2023/final01/assets/148925858/02351c69-3f77-460a-b760-7d8ba4ddd799)


## 關聯式綱要圖
![image](https://github.com/WISD-2023/final01/assets/148925858/accd603f-fd96-4bd2-b006-c6a9cb1164ff)



## 實際資料表欄位設計

★ 會員

![image](https://github.com/WISD-2023/final01/assets/145514645/e1df1cf8-18b7-446a-b140-1d5535326173)

★ 購物車
![image](https://github.com/WISD-2023/final01/assets/145514645/7abb1cdd-7fd5-4e5f-8aad-6c7ad50a67bf)

★ 評論
![image](https://github.com/WISD-2023/final01/assets/145514645/981cf628-7849-40f1-8687-aa0a0d42ff08)

★ 訂單

![image](https://github.com/WISD-2023/final01/assets/145514645/e5792198-6b49-4dde-acaf-6ac82e9e83a7)

★ 訂單明細
![image](https://github.com/WISD-2023/final01/assets/145514645/1d21c95a-a2d1-4fe8-9145-e361140a5e87)

★ 商品
![image](https://github.com/WISD-2023/final01/assets/145514645/b1babfe8-fb6c-4a7a-8d9d-0ebb2e88ad9b)

★ 商品種類
![image](https://github.com/WISD-2023/final01/assets/145514645/fc9258cf-530a-4811-9498-8835a3302be9)

★ 商場

![image](https://github.com/WISD-2023/final01/assets/145514645/729f35f2-5589-48bb-ab36-b94abbd72ef3)

★ 會員好友
![image](https://github.com/WISD-2023/final01/assets/145514645/b1a3710e-9a9b-4758-aa59-15de7b2b28b0)

★ 賣家
![image](https://github.com/WISD-2023/final01/assets/145514645/2c1e6e71-db29-4e12-b06c-fddad1caa4d4)

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
   - `DB_DATABASE=final01`
   - `DB_USERNAME=root`
   - `DB_PASSWORD=root`
4. 復原DB/建立資料庫
   - `artisan migrate`
5. 建立模擬資料
   - `artisan db:seed`

## 系統開發人員與工作分配

專案管理/組織者： 
- [3B032106 李宣佑](https://github.com/3B032106) 

負責整體專案進度、資源分配、風險管理…等。


系統分析師：
- [3B032106 李宣佑](https://github.com/3B032106) 
- [3B032112 陳泰恩](https://github.com/3B032112) 

負責收集、分析和整理使用者需求，確保系統符合預期目標。


資料庫設計師：
- [3B032106 李宣佑](https://github.com/3B032106) 
- [3B032112 陳泰恩](https://github.com/3B032112)
- [3B032123 顏妤年](https://github.com/3B032123)

負責建立和管理資料庫，確保數據安全和有效性。

前端開發人員： 
- [3B032123 顏妤年](https://github.com/3B032123)

負責實現會員和訪客的使用者介面，確保良好的使用者體驗。


後端開發人員： 
- [3B032106 李宣佑](https://github.com/3B032106) 
- [3B032112 陳泰恩](https://github.com/3B032112)

負責實現系統的核心邏輯、資料處理和安全性。


測試人員：
- [3B032106 李宣佑](https://github.com/3B032106)
- [3B032112 陳泰恩](https://github.com/3B032112)
- [3B032123 顏妤年](https://github.com/3B032123)

負責系統測試，包括功能測試、性能測試和安全性測試。

會員管理功能：
- [3B032106 李宣佑](https://github.com/3B032106)
- [3B032112 陳泰恩](https://github.com/3B032112)
- [3B032123 顏妤年](https://github.com/3B032123)

由系統分析師和前端/後端開發人員協同完成。

購物功能：
- [3B032123 顏妤年](https://github.com/3B032123)
- [3B032106 李宣佑](https://github.com/3B032106)
- [3B032112 陳泰恩](https://github.com/3B032112)

由前端/後端開發人員負責，與資料庫設計師合作確保資料的正確存儲和檢索。

社交互動功能：
- [3B032112 陳泰恩](https://github.com/3B032112) 

由前端/後端開發人員負責，需要與會員管理功能整合以實現互動特性。

訂單管理功能：
- [3B032106 李宣佑](https://github.com/3B032106)
- [3B032112 陳泰恩](https://github.com/3B032112)

由後端開發人員負責，確保訂單的流程和更新狀態的正確執行。

會員系統維護：
- [3B032106 李宣佑](https://github.com/3B032106)
- [3B032112 陳泰恩](https://github.com/3B032112)

系統分析師和後端開發人員協同，負責處理會員資料、訂單紀錄等相關數據的維護。

平台人員管理：
- [3B032123 顏妤年](https://github.com/3B032123)

專案經理和平台人員共同協作，確保平台人員的登入、登出、商品管理等功能順暢運作。

系統測試與品質保證：
- [3B032106 李宣佑](https://github.com/3B032106)
- [3B032112 陳泰恩](https://github.com/3B032112)
- [3B032123 顏妤年](https://github.com/3B032123)

測試人員負責，確保系統各個功能的正確性、性能和安全性。

使用者介面設計與改進：
 - [3B032123 顏妤年](https://github.com/3B032123)
 
前端開發人員負責，根據使用者反饋進行界面的設計和優化。

  

  

  

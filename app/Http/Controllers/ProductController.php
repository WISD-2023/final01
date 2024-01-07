<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // 獲取所有商品資料，每頁顯示12個
        $products = Product::paginate(12);

        // 將商品資料傳遞到視圖中
        return view('products.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        try {
            // 獲取單一商品的詳細資訊
            $productDetails = Product::findOrFail($product->id);
    
            // 獲取與商品相關的訂單資訊
            $orderDetails = $productDetails->order; // 這裡假設有一個 order 的關聯，你需要根據你的實際情況調整
    
            // 將單一商品的詳細資訊和相關的訂單資訊傳遞到視圖中
            return view('products.product', compact('productDetails', 'orderDetails'));
        } catch (ModelNotFoundException $e) {
            abort(404); // 商品不存在，回傳 404 頁面
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function giftOrder(StoreProductRequest $request)
    {
        // 獲取表單中傳遞的商品 ID
        $productId = $request->input('product_id');
    
        // 使用商品 ID 查找相應的商品
        $product = Product::findOrFail($productId);
    
        // 在這裡應該建立訂單而不是商品
        $order = Order::create([
            // 根據你的訂單模型的欄位進行設定
            'user_id' => auth()->user()->id,  // 使用當前登入用戶的 ID 作為送禮者的 ID
            'payment_method' => $request->input('payment_method'), // 根據你的表單欄位進行設定
            'is_paid' => $request->input('is_paid'), // 根據你的表單欄位進行設定
            'receiver_name' => $request->input('recipient_name'),
            'status' => $request->input('status'), // 根據你的表單欄位進行設定
            // 其他訂單相關欄位...
        ]);
    
        // 同時建立訂單明細
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1, // 假設每個訂單明細只包含一個商品，根據實際情況調整
        ]);
    
        // 將商品和訂單資料傳遞到視圖中
        return redirect()->route('products.gift-order', ['product' => $product])->with('success', '成功送禮！');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\MembersFriend;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\MembersFriendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if($request ==""){
        // 獲取所有商品資料，每頁顯示12個
        $products = Product::paginate(12);

        // 將商品資料傳遞到視圖中
        return view('products.index', compact('products'));}
        else{
            $search = $request->input('search');
        $products = Product::where('name', 'like', "%$search%")->paginate(12);

        return view('products.index', compact('products'))->with('search', $search);}
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

        // 創建訂單實例
        $order = new Order();

        // 設定訂單相關屬性
        $order->user_id = auth()->user()->id;
        $order->payment_method = $request->input('payment_method');
        $order->is_paid = '未付款';
        $order->receiver_name = $request->input('recipient_name');
        $order->status = '審核中';

        // 保存訂單
        $order->save();

        /*
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
        */

        // 創建訂單明細實例
        $orderDetail = new OrderDetail();

        // 設定訂單明細相關屬性
        $orderDetail->order_id = $order->id; // 假設這裡 $order 是先前已經創建好的訂單實例
        $orderDetail->product_id = $product->id;
        $orderDetail->quantity = 1; // 假設每個訂單明細只包含一個商品，根據實際情況調整

        // 保存訂單明細
        $orderDetail->save();

        /*
        // 同時建立訂單明細
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1, // 假設每個訂單明細只包含一個商品，根據實際情況調整
        ]);
        */

        // 將商品和訂單資料傳遞到視圖中
        return redirect()->route('order.index')->with('success', '成功送禮！');
    }

    public function showGiftOrderPage(Request $request, Product $product)
    {
        // 獲取表單中傳遞的商品 ID
        $productId = $product->id;

        // 這裡根據你的模型邏輯獲取商品詳細資訊
        $productDetails = Product::findOrFail($productId);

        // 取得當前使用者的 ID
        $userId = Auth::id();

        // 使用當前使用者的 ID 篩選好友資料
        $friends = MembersFriend::where('user_id', $userId)->get();

        $friendIds = $friends->pluck('friend_id');
        $friendsList = User::whereIn('id', $friendIds)->get();

        return view('products.gift-order', compact('productDetails', 'friendsList'));
    }

}

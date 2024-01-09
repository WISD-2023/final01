<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\MembersFriend;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 取得當前使用者的 ID
        $userId = Auth::id();
    
        // 使用當前使用者的 ID 篩選購物車資料
        $cartItems = Cart::where('user_id', $userId)->get();
    
        // 如果需要的話，你也可以取得相應的商品資料
        $productIds = $cartItems->pluck('product_id');
        $products = Product::whereIn('id', $productIds)->get();
    
        // 取得當前使用者的所有朋友姓名
        $friendIds = MembersFriend::where('user_id', $userId)->pluck('friend_id');
        $friends = User::whereIn('id', $friendIds)->get();
    
        return view('cart.index', compact('cartItems', 'products', 'friends'));
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
    public function store(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->input('product_id');
    
        // 檢查購物車是否已存在相同商品，如果存在則增加數量，否則新增購物車項目
        $existingCartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
    
        if ($existingCartItem) {
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + 1,
            ]);
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
    
        return redirect()->route('cart.index')->with('success', '商品已成功加入購物車');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function showOrderPage()
    {
        // 假設你的購物車項目從資料庫中獲取，請根據實際情況修改這裡的程式碼
        $cartItems = Cart::where('user_id', auth()->id())->get();
    
        // 計算總計，這裡僅為示範，實際情況應根據你的邏輯計算
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    
        return view('order.order', compact('cartItems', 'totalPrice'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 獲取當前使用者的所有訂單
        $userId = auth()->id();
        $orders = Order::where('user_id', $userId)->get();
    
        // 傳遞訂單數據到訂單頁面
        return view('order.order', compact('orders'));
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
        try {
            // 開啟資料庫交易
            DB::beginTransaction();
    
            // 獲取目前使用者的購物車ID和ID
            $userId = auth()->id();
    
            // 創建一筆訂單
            $order = new Order();
            $order->status = "審核中";
            $order->is_paid = "未付款";
            $order->payment_method = $request->paymentMethod;
            $order->receiver_name = $request->receiverName;
            $order->user_id = $userId; // 將購物車ID存入訂單
            // 其他收貨人資訊的處理，根據實際情況添加
            $order->save();
    
            // 獲取被勾選的商品ID陣列
            $selectedProducts = $request->input('buy', []);
            $quantities = $request->input('quantity', []);
    
            // 將選定的商品建立到訂單明細
            foreach ($selectedProducts as $key => $productId) {
                $quantity = $quantities[$key] ?? 1; // 使用索引對應取得商品數量
    
                // 在 order_details 資料表中新增訂單明細
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $productId;
                $orderDetail->quantity = $quantity;
                // 其他訂單明細資訊的處理，根據實際情況添加
                $orderDetail->save();
            }
    
            // 清空購物車中屬於被勾選商品的項目
            Cart::where('user_id', $userId)
            ->whereIn('product_id', $selectedProducts)
            ->delete();
    
            // 提交資料庫交易
            DB::commit();
    
            // 其他相關邏輯，例如發送確認郵件等...
    
            return redirect()->route('order.index')->with('success', '訂單已成功刪除');
        } catch (\Exception $e) {
            // 如果有任何錯誤發生，回滾資料庫交易
            DB::rollBack();
            
            // 處理錯誤，你可以根據實際情況進行適當的處理
            dd($e);
            return back()->with('error', '訂單建立失敗：' . $e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // 取得此訂單的所有商品ID和數量
        $orderDetails = $order->orderDetails;
    
        // 取得商品資料
        $products = Product::whereIn('id', $orderDetails->pluck('product_id')->toArray())->get();
    
        // 傳遞商品資料和訂單資料到視圖
        return view('order.order-edit', compact('order', 'products', 'orderDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        try {
            // 開啟資料庫交易
            DB::beginTransaction();

            // 更新訂單資訊
            $order->update([
                'payment_method' => $request->input('paymentMethod'),
                'is_paid' => $request->input('isPaid'),
                'receiver_name' => $request->input('receiverName'),
                // 其他需要更新的欄位...
            ]);

            // 更新訂單明細中的商品數量
            foreach ($order->orderDetails as $orderDetail) {
                $productId = $orderDetail->product_id;
                $quantity = $request->input("quantity.$productId", 1); // 如果沒有該商品的新數量，預設為 1

                $orderDetail->update([
                    'quantity' => $quantity,
                    // 其他需要更新的訂單明細欄位...
                ]);
            }

            // 其他需要更新的邏輯...

            // 提交資料庫交易
            DB::commit();

            return redirect()->route('order.index')->with('success', '訂單已成功修改');
        } catch (\Exception $e) {
            // 如果有任何錯誤發生，回滾資料庫交易
            DB::rollBack();

            // 處理錯誤，你可以根據實際情況進行適當的處理
            dd($e);
            return back()->with('error', '訂單修改失敗：' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // 確認使用者只能刪除自己的訂單
        if ($order->user_id === auth()->id()) {
            $order->delete();
            return redirect()->route('order.index')->with('success', '訂單已成功刪除');
        } else {
            return redirect()->route('order.index')->with('error', '您無權刪除此訂單');
        }
    }

    public function pay(Order $order)
    {
        // 假設你的 orders 資料表中有一個欄位叫做 is_paid
        $order->update(['is_paid' => '已付款']);

        return redirect()->route('order.index'); // 重定向回訂單頁面
    }

    public function showOrderDetail(Order $order)
    {
        // 傳遞訂單數據到訂單明細頁面
        return view('order.orderdetail', ['order' => $order]);
    }
}

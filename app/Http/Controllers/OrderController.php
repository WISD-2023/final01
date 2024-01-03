<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
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
        return view('order.order', ['orders' => $orders]);
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
    
            // 清空購物車中的資料
            Cart::where('user_id', $userId)->delete();
    
            // 提交資料庫交易
            DB::commit();
    
            // 其他相關邏輯，例如發送確認郵件等...
    
            return redirect()->route('order'); // 假設有一個訂單成功頁面的路由
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

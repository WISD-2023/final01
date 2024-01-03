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
        //
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

            // 創建一筆訂單
            $order = new Order();
            $order->status = "審核中";
            $order->is_paid = "未付款";
            $order->payment_method = $request->paymentMethod;
            $order->receiver_name = $request->receiverName;
            // 其他收貨人資訊的處理，根據實際情況添加
            $order->save();

            // 獲取被勾選的商品ID陣列
            $selectedProducts = $request->input('buy', []);

            // 將選定的商品建立到訂單明細
            foreach ($selectedProducts as $productId) {
                $quantityKey = 'quantity_' . $productId;
                $quantity = $request->input($quantityKey, 1); // 假設沒有指定數量就預設為1

                // 在 order_details 資料表中新增訂單明細
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $productId;
                $orderDetail->quantity = $quantity;
                // 其他訂單明細資訊的處理，根據實際情況添加
                $orderDetail->save();

                // 清空購物車中該商品
                $userId = auth()->id(); // 假設使用者已經登入，可以獲取使用者ID
                Cart::where('user_id', $userId)->where('product_id', $productId)->delete();
            }

            // 提交資料庫交易
            DB::commit();

            // 其他相關邏輯，例如發送確認郵件等...

            return redirect()->route('order'); // 假設有一個訂單成功頁面的路由
        } catch (\Exception $e) {
            // 如果有任何錯誤發生，回滾資料庫交易
            DB::rollBack();

            // 處理錯誤，你可以根據實際情況進行適當的處理
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

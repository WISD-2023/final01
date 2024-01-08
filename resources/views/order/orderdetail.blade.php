@extends('layouts.app')

@section('title', '社交購物商場 - 訂單明細')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-semibold mb-4">訂單明細</h1>

        <div class="bg-white shadow-md rounded my-6">
            <div class="p-4 border-b bg-gray-100">
                <!-- 顯示訂單詳細資訊，例如訂單號碼、支付方式等 -->
                <h3 class="text-lg font-semibold leading-6 text-gray-900 mb-2">訂單編號：{{ $order->id }}</h3>
                <p class="mb-4"></p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <p class="text-sm leading-5 text-gray-700">支付方式：</p>
                        <p class="text-lg font-semibold leading-6 text-gray-900">{{ $order->payment_method }}</p>
                    </div>
                    <div>
                        <p class="text-sm leading-5 text-gray-700">是否支付：</p>
                        <p class="text-lg font-semibold leading-6 text-gray-900">{{ $order->is_paid }}</p>
                    </div>
                    <div>
                        <p class="text-sm leading-5 text-gray-700">收貨人姓名：</p>
                        <p class="text-lg font-semibold leading-6 text-gray-900">{{ $order->receiver_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm leading-5 text-gray-700">訂單狀態：</p>
                        <p class="text-lg font-semibold leading-6 text-gray-900">{{ $order->status }}</p>
                    </div>
                </div>
            </div>

            <div class="p-4">
                <!-- 顯示訂單商品明細 -->
                @if($order->orderDetails->count() > 0)
                    <h2 class="text-2xl font-semibold mb-2">訂單商品明細</h2>
                    <table class="min-w-full border rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">商品名稱</th>
                                <th class="py-2 px-4">數量</th>
                                <th class="py-2 px-4">單價</th>
                                <!-- 添加其他商品明細欄位 -->
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                            @foreach($order->orderDetails as $orderDetail)
                                <tr>
                                    <td class="py-2 px-4">
                                        @isset($orderDetail->product)
                                            {{ $orderDetail->product->name }}
                                        @else
                                            商品不存在
                                        @endisset
                                    </td>
                                    <td class="py-2 px-4">{{ $orderDetail->quantity }}</td>
                                    <td class="py-2 px-4">{{ $orderDetail->product ? '$' . $orderDetail->product->price : 'N/A' }}</td>
                                    <!-- 添加其他商品明細資訊 -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-lg">此訂單沒有商品明細。</p>
                @endif
            </div>
            <div class="flex justify-end p-4 border-t">
                <div class="flex gap-4">
                    <a href="{{ route('order.edit', ['order' => $order]) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800 transition">修改訂單</a>
                    <form method="POST" action="{{ route('order.destroy', ['order' => $order]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-800 transition">刪除訂單</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

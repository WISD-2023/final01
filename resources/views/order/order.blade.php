@extends('layouts.app')

@section('title', '社交購物商場')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-4">訂單確認</h1>

        <!-- 訂單明細 -->
        <div class="mb-4 p-4 border rounded-lg">
            <h2 class="text-2xl font-semibold mb-4">訂單明細</h2>
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">商品名稱</th>
                        <th class="border border-gray-300 p-2">商品價格</th>
                        <th class="border border-gray-300 p-2">數量</th>
                        <th class="border border-gray-300 p-2">小計</th>
                    </tr>
                </thead>
                <tbody id="orderDetails">
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $cartItem->product->name }}</td>
                        <td class="border border-gray-300 p-2">${{ $cartItem->product->price }}</td>
                        <td class="border border-gray-300 p-2">{{ $cartItem->quantity }}</td>
                        <td class="border border-gray-300 p-2">${{ $cartItem->product->price * $cartItem->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- 訂單總額等相關內容 -->
        
        <!-- 購買按鈕 -->
        <!-- 此處可以添加其他相關按鈕或內容 -->

    </div>
@endsection
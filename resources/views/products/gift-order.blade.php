@extends('layouts.app')

@section('title', '社交購物商場 - 送禮')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-4">送禮</h1>

    <div class="flex">
        <!-- 顯示商品資訊 -->
        <div class="w-1/2 pr-8">
            <h2 class="text-2xl font-semibold mb-2">商品：{{ $productDetails->name }}</h2>
            <img src="{{ $productDetails->pic }}" alt="{{ $productDetails->name }}" class="w-600 h-700 object-cover rounded-md">
        </div>

        <!-- 送禮表單 -->
        <div class="w-1/2">
            <form action="{{ route('products.gift-order') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $productDetails->id }}">

                <!-- 送禮者姓名，抓取目前使用者帳號的名字 -->
                <div class="mb-4">
                    <label for="sender_name" class="block text-sm font-medium text-gray-700">送禮者姓名</label>
                    <input type="text" name="sender_name" id="sender_name" class="mt-1 p-2 w-full border rounded-md" value="{{ auth()->user()->name }}" readonly>
                </div>

                <!-- 收禮者姓名，下拉式選單抓取當前使用者的朋友 -->
                <div class="mb-4">
                    <label for="recipient_name" class="block text-sm font-medium text-gray-700">收禮者姓名</label>
                    <select name="recipient_name" id="recipient_name" class="mt-1 p-2 w-full border rounded-md">
                        @foreach($friendsList as $friend)
                        <option value="{{ $friend->name }}" data-email="{{ $friend->email }}">{{ $friend->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- 收禮者電子郵件，自動帶入選擇的收禮者姓名的電子郵件 -->
                <div class="mb-4">
                    <label for="recipient_email" class="block text-sm font-medium text-gray-700">收禮者電子郵件</label>
                    <input type="text" name="recipient_email" id="recipient_email" class="mt-1 p-2 w-full border rounded-md" readonly>
                </div>

                <!-- 付款方式 -->
                <div class="mb-4">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">付款方式</label>
                    <select name="payment_method" id="payment_method" class="mt-1 p-2 w-full border rounded-md">
                        <option value="貨到付款">貨到付款</option>
                        <option value="線上支付">線上支付</option>
                        <option value="銀行轉帳">銀行轉帳</option>
                        <option value="信用卡">信用卡</option>
                    </select>
                </div>

                <!-- 商品數量，下拉式選單 1~10 -->
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">商品數量</label>
                    <select name="quantity" id="quantity" class="mt-1 p-2 w-full border rounded-md">
                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>

                <!-- 送禮按鈕 -->
                <button type="submit" class="bg-warning text-white py-2 px-4 rounded-md">送禮</button>
            </form>
        </div>
    </div>
</div>
@endsection
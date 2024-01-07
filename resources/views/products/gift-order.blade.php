@extends('layouts.app')

@section('title', '社交購物商場 - 送禮')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-semibold mb-4">送禮訂單</h1>

        <div class="flex">
            <!-- 顯示商品資訊 -->
            <div class="w-1/2 pr-8">
                <img src="{{ $productDetails->pic }}" alt="{{ $productDetails->name }}" class="w-600 h-700 object-cover rounded-md">
            </div>

            <!-- 送禮表單 -->
            <div class="w-1/2">
                <form action="{{ route('order.gift-order') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $productDetails->id }}">

                    <!-- 商品資訊 -->
                    <!-- ...（略） -->

                    <!-- 收禮者姓名 -->
                    <div class="mb-4">
                        <label for="recipient_name" class="block text-sm font-medium text-gray-700">收禮者姓名</label>
                        <input type="text" name="recipient_name" id="recipient_name" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <!-- 送禮者姓名 -->
                    <div class="mb-4">
                        <label for="sender_name" class="block text-sm font-medium text-gray-700">送禮者姓名</label>
                        <input type="text" name="sender_name" id="sender_name" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <!-- 送禮者電子郵件 -->
                    <div class="mb-4">
                        <label for="sender_email" class="block text-sm font-medium text-gray-700">送禮者電子郵件</label>
                        <input type="email" name="sender_email" id="sender_email" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <!-- 付款方式 -->
                    <div class="mb-4">
                        <label for="payment_method" class="block text-sm font-medium text-gray-700">付款方式</label>
                        <input type="text" name="payment_method" id="payment_method" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <!-- 是否已付款 -->
                    <div class="mb-4">
                        <label for="is_paid" class="block text-sm font-medium text-gray-700">是否已付款</label>
                        <input type="text" name="is_paid" id="is_paid" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <!-- 訂單狀態 -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">訂單狀態</label>
                        <input type="text" name="status" id="status" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <!-- 送禮按鈕 -->
                    <button type="submit" class="bg-warning text-white py-2 px-4 rounded-md">送禮</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', '社交購物商場')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-4">購物車</h1>

        <div class="grid grid-cols-2 gap-4">
            <!-- 商品清單 -->
            <div class="col-span-1">
                @foreach($products as $product)
                    <div class="mb-4 p-4 border rounded-lg flex items-center">
                        <!-- 加入購物車按鈕 -->
                        <label for="buy" class="mr-4">
                        <input type="checkbox" name="buy" id="buy{{ $loop->iteration }}" class="mr-1" data-name="{{ $product->name }}" data-price="{{ $product->price }}"> 加入購物車
                        </label>

                        <!-- 照片區域 -->
                        <div class="flex-shrink-0">
                            <img src="{{ $product->pic }}" alt="{{ $product->name }}" class="w-32 h-40 object-cover rounded-md">
                        </div>

                        <!-- 商品資訊區域 -->
                        <div class="flex flex-col justify-between ml-4">
                            <div>
                                <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                                <p class="text-sm text-gray-500">{{ $product->status }}</p>
                                <p class="text-lg font-bold text-green-500">${{ $product->price }}</p>
                            </div>

                            <!-- 購買數量下拉式選單 -->
                            <label for="quantity" class="block mt-2 text-sm text-gray-600">
                                <select name="quantity" id="quantity" class="w-16 p-2 border rounded-md">
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" @if($product->pivot && $i == $product->pivot->quantity) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- 訂單明細 -->
            <div class="col-span-1">
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
                    <tbody id="orderDetails"> <!-- 將訂單明細的<tbody>標籤加上id="orderDetails" -->
                        <!-- 此處不需顯示預先購買的商品項目 -->
                    </tbody>
                </table>

                <!-- 訂單總額 -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold">訂單總額</h3>
                    <p class="text-2xl font-bold text-green-500" id="totalAmount">$0.00</p>
                </div>

                <!-- 購買按鈕 -->
                <button id="purchaseButton" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md">購買</button>
            </div>
    </div>
@endsection
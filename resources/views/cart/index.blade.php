@extends('layouts.app')

@section('title', '社交購物商場')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-4">購物車</h1>

        <div class="grid grid-cols-2 gap-4">
            <!-- 商品清單 -->
            <div class="col-span-1">
                @forelse($cartItems as $cartItem)
                    <div class="mb-4 p-4 border rounded-lg flex items-center">
                        <!-- 這裡是加入購物車按鈕 -->
                        <label for="buy{{ $loop->iteration }}" class="mr-4">
                            <input type="checkbox" name="buy" id="buy{{ $loop->iteration }}" class="mr-1" data-id="{{ $cartItem->product->id }}" data-name="{{ $cartItem->product->name }}" data-price="{{ $cartItem->product->price }}"> 加入購物車
                        </label>

                        <!-- 商品照片區域 -->
                        <div class="flex-shrink-0">
                            <img src="{{ $cartItem->product->pic }}" alt="{{ $cartItem->product->name }}" class="w-32 h-40 object-cover rounded-md">
                        </div>

                        <!-- 商品資訊區域 -->
                        <div class="flex flex-col justify-between ml-4">
                            <div>
                                <h2 class="text-lg font-semibold">{{ $cartItem->product->name }}</h2>
                                <p class="text-sm text-gray-500">{{ $cartItem->product->status }}</p>
                                <p class="text-lg font-bold text-green-500">${{ $cartItem->product->price }}</p>
                            </div>

                            <!-- 商品數量下拉式選單 -->
                            <label for="quantity" class="block mt-2 text-sm text-gray-600">
                                <select name="quantity" id="quantity" class="w-16 p-2 border rounded-md">
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" @if($i == $cartItem->quantity) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </label>
                        </div>
                    </div>
                @empty
                    <p>購物車是空的。</p>
                @endforelse
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
                    <tbody id="orderDetails">
                        <!-- 在這裡顯示購物車中已選擇的商品 -->
                    </tbody>
                </table>

                <!-- 訂單總額 -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold">訂單總額</h3>
                    <p class="text-2xl font-bold text-green-500" id="totalAmount">$0.00</p>
                </div>

                <!-- 購買按鈕 -->
                <a href="{{ route('order.show') }}" id="purchaseButton" class="btn btn-primary">購買</a>
            </div>
        </div>
    </div>
@endsection

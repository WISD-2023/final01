@extends('layouts.app')

@section('title', '社交購物商場')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-4">購物車</h1>

        <form method="post" action="{{ route('order.store') }}" id="purchaseForm">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <!-- 購物車清單部分 -->
                <div class="col-span-1">
                    @forelse($cartItems as $cartItem)
                        <div class="mb-4 p-4 border rounded-lg flex items-center">
                            <!-- 加入購物車按鈕 -->
                            <label for="buy{{ $loop->iteration }}" class="mr-4">
                                <input type="checkbox" name="buy[]" id="buy{{ $loop->iteration }}" class="mr-1" value="{{ $cartItem->product->id }}"> 加到訂單
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
                                    <select name="quantity[]" class="w-16 p-2 border rounded-md" data-quantity="{{ $cartItem->quantity }}">
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

                <!-- 購買按鈕 -->
                <div class="col-span-1">
                    <h2 class="text-2xl font-semibold mb-4">結帳資訊</h2>

                    <!-- 支付方式 -->
                    <div class="mb-4">
                        <label for="paymentMethod" class="block text-sm font-medium text-gray-600">支付方式</label>
                        <select name="paymentMethod" id="paymentMethod" class="w-full p-2 border rounded-md">
                            <option value="cashOnDelivery">貨到府款</option>
                            <option value="onlinePayment">線上支付</option>
                            <option value="bankTransfer">銀行轉帳</option>
                            <option value="creditCard">信用卡</option>
                        </select>
                    </div>

                    <!-- 收貨人姓名 -->
                    <div class="mb-4">
                        <label for="receiverName" class="block text-sm font-medium text-gray-600">收貨人姓名</label>
                        <input type="text" name="receiverName" id="receiverName" class="w-full p-2 border rounded-md" required>
                    </div>

                    <!-- 其他收貨人資訊，根據需要添加 -->
                    <!-- ... -->

                    <!-- 購買按鈕 -->
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded border border-green-500 hover:bg-white hover:text-green-500">購買</button>
                </div>
            </div>
        </form>
    </div>
@endsection

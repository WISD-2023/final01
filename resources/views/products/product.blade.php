@extends('layouts.app')

@section('title', '社交購物商場 - 商品詳細資訊')

@section('content')
    <div class="container mx-auto my-8">
        <!-- 顯示特定商品的詳細資訊 -->
        <div class="flex">
            <!-- 商品照片 -->
            <div class="w-1/2 pr-8">
                <img src="{{ $productDetails->pic }}" alt="{{ $productDetails->name }}" class="w-600 h-700 object-cover rounded-md">
            </div>

            <!-- 商品資訊 -->
            <div class="w-1/2 flex flex-col justify-center">
                <!-- 商品名稱 -->
                <h2 class="text-4xl font-bold mb-2">{{ $productDetails->name }}</h2>
                
                <!-- 商品價格 -->
                <p class="text-xl font-bold mb-2">${{ $productDetails->price }}</p>
                
                <!-- 商品描述 -->
                <p class="mb-4">{{ $productDetails->description }}</p>
                
                <!-- 商品狀態 -->
                <div class="flex items-center">
                    <div class="rounded-full bg-gray-300 px-4 py-2 mr-2">
                        {{ $productDetails->status }}
                    </div>
                    <!-- 加入購物車按鈕 -->
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                        <button type="submit" class="flex items-center bg-blue-500 text-white py-2 px-4 rounded-md">
                            <i class="bi bi-cart-fill mr-2"></i> 加入購物車
                        </button>
                    </form>

                    @if(auth()->check())
                        <!-- 送禮按鈕 -->
                        <a href="{{ route('products.show-gift-order', ['product' => $productDetails->id]) }}" class="flex items-center text-warning py-2 px-4">
                                <i class="bi bi-gift mr-2"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <hr class="my-6">
        <!-- 顯示商品評論 -->
        <div>
            <h3 class="text-2xl font-bold mb-4">商品評論</h3>

            @forelse($productDetails->reviews as $review)
                <div class="mb-4">
                    <p class="text-lg font-semibold">{{ $review->user->name }}</p>
                    <p class="mb-2">{{ $review->content }}</p>
                    <p class="text-gray-500">評分: {{ $review->rating }}</p>
                </div>
            @empty
                <p>目前尚無評論。</p>
            @endforelse

            <!-- 評論表單 -->
            @auth
                <form action="{{ route('reviews.store', ['product' => $productDetails->id]) }}" method="post" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-lg font-medium text-gray-800">評論內容</label>
                        <textarea name="content" id="content" rows="3" class="mt-1 p-2 w-full border rounded-md text-lg" style="margin-bottom: 0.5rem;" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="rating" class="block text-lg font-medium text-gray-800">評分</label>
                        <select name="rating" id="rating" class="mt-1 p-2 w-full border rounded-md text-lg text-gray-500" style="margin-bottom: 0.5rem;" required>
                            <option value="" disabled selected>請選擇分數</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">提交評論</button>
                </form>
            @else
                <div class="mt-4 text-xl font-bold text-gray-600">
                    請登入後發表評論。
                </div>
            @endauth
        </div>
    </div>
@endsection
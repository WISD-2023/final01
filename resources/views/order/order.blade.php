@extends('layouts.app')

@section('title', '社交購物商場 - 訂單確認')

@section('content')
    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-bold mb-4">訂單明細</h2>

        @foreach($cartItems as $cartItem)
            <div class="mb-4">
                <h4 class="text-xl font-bold">{{ $cartItem->product->name }}</h4>
                <p>數量: {{ $cartItem->quantity }}</p>
                <p>單價: ${{ $cartItem->product->price }}</p>
                <p>小計: ${{ $cartItem->quantity * $cartItem->product->price }}</p>
            </div>
            <hr class="my-2">
        @endforeach

        <div class="mt-4">
            <h3 class="text-xl font-bold">總計: ${{ $totalPrice }}</h3>
        </div>

        <div class="mt-8">
            <!-- 在這裡加入訂購按鈕 -->
            <a href="{{ route('order.confirm') }}" class="btn btn-primary">確認訂單</a>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', '社交購物商場 - 修改訂單')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-4xl font-semibold mb-6">修改訂單</h1>
    <form action="{{ route('order.update', ['order' => $order->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="paymentMethod" class="block text-sm font-medium text-gray-700">支付方式：</label>
            <select name="paymentMethod" id="paymentMethod" class="mt-1 p-2 border rounded-md w-full">
                @foreach(['貨到府款', '線上支付', '銀行轉帳', '信用卡'] as $option)
                    <option value="{{ $option }}" @if($order->payment_method === $option) selected @endif>{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="receiver_Name" class="block text-sm font-medium text-gray-700">收貨人姓名：</label>
            <input type="text" name="receiverName" id="receiver_Name" class="mt-1 p-2 border rounded-md w-full" value="{{ $order->receiver_name }}">
        </div>

        <div class="mb-4">
            <label for="isPaid" class="block text-sm font-medium text-gray-700">是否支付：</label>
            <span class="mt-1 p-2 border rounded-md w-full bg-gray-100">{{ $order->is_paid }}</span>
        </div>

        <table class="table w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2">商品</th>
                    <th class="p-2 text-center">數量</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="p-2">{{ $product->name }}</td>
                        <td class="p-2 text-center">
                            <input type="number" name="quantity[{{ $product->id }}]" value="{{ $orderDetails->where('product_id', $product->id)->first()->quantity ?? 1 }}" min="1" class="p-1 border rounded-md">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right mt-4">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">儲存修改</button>
        </div>
    </form>
</div>
@endsection

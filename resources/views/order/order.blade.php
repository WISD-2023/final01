@extends('layouts.app')

@section('title', '社交購物商場 - 訂單')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-4">訂單</h1>

        @if($orders)
            <table class="min-w-full border rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">訂單流水號</th>
                        <th class="py-2 px-4">支付方式</th>
                        <th class="py-2 px-4">是否支付</th>
                        <th class="py-2 px-4">收貨人姓名</th>
                        <th class="py-2 px-4">訂單狀態</th>
                        <th class="py-2 px-4">操作</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-200">
                    @foreach($orders as $order)
                        <tr>
                            <td class="py-2 px-4">{{ $order->id }}</td>
                            <td class="py-2 px-4">{{ $order->payment_method }}</td>
                            <td class="py-2 px-4">{{ $order->is_paid }}</td>
                            <td class="py-2 px-4">{{ $order->receiver_name }}</td>
                            <td class="py-2 px-4">{{ $order->status }}</td>
                            <td class="py-2 px-4 flex space-x-2">
                                @if($order->is_paid === '未付款')
                                    <form method="POST" action="{{ route('order.pay', ['order' => $order]) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded-md">付款</button>
                                    </form>
                                @endif
                                <a href="{{ route('order.detail', ['order' => $order]) }}" class="bg-green-500 text-white px-2 py-1 rounded-md">訂單明細</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>目前沒有訂單。</p>
        @endif
    </div>
@endsection

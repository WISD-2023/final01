@extends('layouts.app')

@section('title', '社交購物商場 - 訂單')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-4">訂單</h1>

        @if($orders->count() > 0)
            <table class="min-w-full border rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">訂單流水號</th>
                        <th class="py-2 px-4">支付方式</th>
                        <th class="py-2 px-4">是否支付</th>
                        <th class="py-2 px-4">收貨人姓名</th>
                        <!-- 添加其他你需要顯示的訂單信息 -->
                    </tr>
                </thead>
                <tbody class="bg-gray-200">
                    @foreach($orders as $order)
                        <tr>
                            <td class="py-2 px-4">{{ $order->id }}</td>
                            <td class="py-2 px-4">{{ $order->payment_method }}</td>
                            <td class="py-2 px-4">{{ $order->is_paid }}</td>
                            <td class="py-2 px-4">{{ $order->receiver_name }}</td>
                            <!-- 添加其他你需要顯示的訂單信息 -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>目前沒有訂單。</p>
        @endif
    </div>
@endsection

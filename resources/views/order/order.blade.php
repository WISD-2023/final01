@extends('layouts.app')

@section('title', '社交購物商場 - 訂單')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-semibold mb-4">訂單確認</h1>

        @if(isset($orders) && $orders->count() > 0)
            <table class="w-full border">
                <thead>
                    <tr>
                        <th class="border">訂單編號</th>
                        <th class="border">付款狀態</th>
                        <th class="border">收貨人姓名</th>
                        <!-- 其他需要顯示的訂單資訊，根據實際情況添加 -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="border">{{ $order->id }}</td>
                            <td class="border">{{ $order->is_paid }}</td>
                            <td class="border">{{ $order->receiver_name }}</td>
                            <!-- 其他需要顯示的訂單資訊，根據實際情況添加 -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>目前沒有訂單。</p>
        @endif
    </div>
@endsection

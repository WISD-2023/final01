@extends('layouts.app')

@section('title', '社交購物商場 - 賣家管理')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p class="mb-4">歡迎 {{ Auth::user()->name }} 進入管理賣場頁面。</p>

            @forelse($markets as $market)
                @if ($market->seller_id == $seller->id)
                    <div class="flex items-center justify-between mt-4 border-b pb-2">
                        <div class="flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $market->name }}</p>
                        </div>
                        <form action="{{ route('seller.market.show', $market->id) }}" method="GET">
                            @csrf
                            <button class="btn btn-sm btn-indigo" type="submit">進入</button>
                        </form>
                    </div>
                @endif
            @empty
                <p>你尚未建立賣場。</p>
                <div class="mt-4 flex items-center justify-end gap-x-4">
                    <form action="{{ route('seller.market.store') }}" method="POST"> <!-- 修改這裡使用 POST 方法 -->
                        @csrf
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">建立賣場</button>
                    </form>
                </div>
            @endforelse

            <!-- Add a button for creating a market -->
            <div class="mt-4 flex items-center justify-end gap-x-4">
                <!-- 修改這裡使用 POST 方法 -->
                <form action="{{ route('seller.market.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">建立賣場</button>
                </form>

            </div>

        </div>
    </div>
@endsection

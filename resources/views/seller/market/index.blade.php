@extends('layouts.app')

@section('title', '社交購物商場')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Show error message -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <p>以下是你的賣場。</p>
                    @foreach($markets as $market)
                        @if ($market->seller_id == $seller->id)
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900" {{ $A=true }}>{{ $market->id }}</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $market->name }}</p>
                            </div>
                            <form action="{{ route('seller.market.show',$market->id) }}" method="GET">
                                @method('SHOW')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">進入</button>
                            </form>
                        @endif
                    @endforeach
                @if($A!=true)
                    <p>你尚未建立賣場。</p>
                    <div class="mt-4 flex items-center justify-end gap-x-4">
                        <form action="{{ route('seller.market.create') }}">
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">建立賣場</button>
                        </form>
                    </div>
                @endif
        </div>
    </div>
@endsection

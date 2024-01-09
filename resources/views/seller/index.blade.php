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
        @if ($user->seller)
        <div class="mt-4 flex items-center justify-end gap-x-4">
            <form action="{{ route('seller.market.index',$user->seller) }}">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">查看賣場</button>
            </form>
        </div>
        @else
        <p>你還不是賣家。</p>
        <div class="mt-4 flex items-center justify-end gap-x-4">

            <a href="{{ route('seller.store') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">成為賣家</a>

        </div>
        @endif
    </div>
</div>
@endsection
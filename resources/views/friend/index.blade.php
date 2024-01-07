@extends('layouts.app')

@section('title', '社交購物商場')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-semibold mb-4">好友</h1>
            <!-- Profile Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-2">好友列表</h2>
                @forelse($members as $member)
                    <p class="text-gray-600 mb-4">{{ $member->name }}</p>
                @empty
                    <p>沒有好友。</p>
                @endforelse
            </div>
            <!-- Addfriend form goes here -->
            <form method="POST" action="{{ route('update-profile') }}">
                @csrf
                @method('PUT')
                <!-- Addfriend -->
                <div class="form-group mb-4">
                    <label for="name">填寫好友姓名</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="請輸入姓名">
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">加入</button>
                </div>
            </form>
        </div>
    </div>
@endsection

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

            <!-- Add friend form goes here -->
            <form method="POST" action="{{ route('friend.store') }}">
                @csrf
                @method('POST')
                <!-- Add friend -->
                <div class="form-group mb-4">
                    <label for="name">填寫好友姓名</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="請輸入姓名">
                </div>
                <div class="mt-4 flex items-center justify-end gap-x-4">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">加入</button>
                </div>
            </form>

            <h1 class="text-3xl font-semibold mb-4">好友列表</h1>

            <!-- Profile Section -->
            <div class="mb-8">
                @if(count($members) > 0)
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach($members as $member)
                            <li class="flex justify-between gap-x-6 py-1">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-10 w-10 flex-none rounded-full bg-gray-50" src="{{ $member->profile_image_url }}" alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $member->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $member->email }}</p>
                                    </div>
                                </div>
                                <!-- Add other friend details as needed -->
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>沒有好友。</p>
                @endif
            </div>
        </div>
    </div>
@endsection

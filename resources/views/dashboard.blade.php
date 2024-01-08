@extends('layouts.app')

@section('title', '社交購物商場')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-semibold mb-4">個人資訊</h1>

            <!-- Profile Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-2">個人檔案</h2>
                <p class="text-gray-600 mb-4">這些資訊將公開顯示，請謹慎填寫。</p>

                <!-- Your profile form goes here -->
                <form method="POST" action="{{ route('update-profile') }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="form-group mb-4">
                        <label for="name">姓名</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="請輸入姓名" value="{{ auth()->user()->name }}">
                    </div>

                    <!-- Gender -->
                    <div class="form-group mb-4">
                        <label for="gender">性別</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="男" {{ auth()->user()->gender === '男' ? 'selected' : '' }}>男</option>
                            <option value="女" {{ auth()->user()->gender === '女' ? 'selected' : '' }}>女</option>
                            <option value="未知" {{ auth()->user()->gender === '未知' ? 'selected' : '' }}>未知</option>
                        </select>
                    </div>

                    <!-- Birthday -->
                    <div class="form-group mb-4">
                        <label for="birthday">生日</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ auth()->user()->birthday }}">
                    </div>

                    <!-- Telephone -->
                    <div class="form-group mb-4">
                        <label for="telephone">手機</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" maxlength="10" placeholder="請輸入手機" value="{{ auth()->user()->telephone }}">
                    </div>

                    <!-- Address -->
                    <div class="form-group mb-4">
                        <label for="address">地址</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}">
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-4">
                        <label for="email">電子信箱</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                    </div>

                    <!-- Password (optional, only if you want to allow users to update password) -->
                    <div class="form-group mb-4">
                        <label for="new_password">新密碼</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="請輸入新密碼">
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">儲存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
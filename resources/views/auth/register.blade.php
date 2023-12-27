<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('姓名')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('電子信箱')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('密碼')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('確認密碼')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('性別')" />
            <select id="gender" name="gender" class="block mt-1 w-full">
                <option value="男" {{ old('gender') == '男' ? 'selected' : '' }}>男</option>
                <option value="女" {{ old('gender') == '女' ? 'selected' : '' }}>女</option>
                <option value="未知" {{ old('gender') == '未知' ? 'selected' : '' }}>未知</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Birthday -->
        <div class="mt-4">
            <x-input-label for="birthday" :value="__('生日')" />
            <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" required />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <!-- Telephone -->
        <div class="mt-4">
        <x-input-label for="telephone" :value="__('手機')" />
        <x-text-input id="telephone" class="block mt-1 w-full"
                        type="text"
                        name="telephone"
                        value="09XXXXXXXX" {{-- 預設值 --}}
                        onfocus="clearDefaultValue(this)" {{-- 當滑鼠焦點在上面時清除 --}}
                        maxlength="10" {{-- 限制最大字元數 --}}
                        required />
        <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('地址')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('已經註冊過了嗎?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('註冊') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function clearDefaultValue(input) {
            if (input.value === "09XXXXXXXX") {
                input.value = "";
            }
        }
    </script>
</x-guest-layout>

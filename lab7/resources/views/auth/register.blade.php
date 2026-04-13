<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Họ tên" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="diachi" value="Địa chỉ" />
            <x-text-input id="diachi" class="block mt-1 w-full" type="text" name="diachi" :value="old('diachi')" autocomplete="street-address" />
            <x-input-error :messages="$errors->get('diachi')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="nghenghiep" value="Nghề nghiệp" />
            <x-text-input id="nghenghiep" class="block mt-1 w-full" type="text" name="nghenghiep" :value="old('nghenghiep')" />
            <x-input-error :messages="$errors->get('nghenghiep')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phai" value="Phái" />
            <select id="phai" name="phai" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Chọn phái --</option>
                <option value="Nam" @selected(old('phai') === 'Nam')>Nam</option>
                <option value="Nữ" @selected(old('phai') === 'Nữ')>Nữ</option>
                <option value="Khác" @selected(old('phai') === 'Khác')>Khác</option>
            </select>
            <x-input-error :messages="$errors->get('phai')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Mật khẩu" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Nhập lại mật khẩu" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                Đã có tài khoản?
            </a>

            <x-primary-button class="ms-4">
                Đăng ký
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

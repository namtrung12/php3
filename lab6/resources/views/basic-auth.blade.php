<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            HTTP Basic Authentication
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-2xl bg-white p-8 shadow-sm">
                <p class="text-lg font-semibold">Bạn đã vượt qua lớp xác thực HTTP Basic.</p>
                <p class="mt-4 text-slate-700">
                    Middleware `auth.basic` mặc định xác thực bằng email và mật khẩu của bảng `users`.
                </p>
                <ul class="mt-4 space-y-2 text-sm text-slate-600">
                    <li>Ví dụ: `vuiqua@gmail.com / hehe`</li>
                    <li>Ví dụ: `buonqua@gmail.com / huhu`</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

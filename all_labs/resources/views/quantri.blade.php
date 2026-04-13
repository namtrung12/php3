<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Khu vực quản trị
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-amber-200 bg-amber-50 p-8 shadow-sm">
                <p class="text-lg font-semibold text-amber-900">Chỉ admin mới xem được trang này.</p>
                <p class="mt-4 text-amber-800">
                    Bạn đã đi qua middleware `quantri` thành công. Điều kiện hiện tại là `idgroup = 1`.
                </p>
                <p class="mt-3 text-sm text-amber-700">Tài khoản đang dùng: {{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Quản trị tin
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-2xl bg-white p-8 shadow-sm">
                <p class="text-lg font-semibold">Bạn đang ở khu vực quản trị tin.</p>
                <p class="mt-4 text-slate-700">
                    Route này được bảo vệ bằng middleware `auth` đặt trong `__construct` của controller.
                </p>
                <p class="mt-3 text-sm text-slate-500">Người dùng hiện tại: {{ auth()->user()->name }} - {{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
</x-app-layout>

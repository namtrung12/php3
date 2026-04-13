<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Trang download
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-2xl bg-white p-8 shadow-sm">
                <p class="text-lg font-semibold">Chào bạn {{ Auth::user()->name }}</p>
                <p class="mt-4 text-slate-700">
                    Đây là trang download software, chỉ dành cho thành viên đã đăng nhập.
                </p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white" href="{{ route('dashboard') }}">Về dashboard</a>
                    <a class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700" href="{{ route('thoat') }}">Thoát</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

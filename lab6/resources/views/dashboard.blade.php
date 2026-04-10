<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bảng điều khiển Lab 6
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid gap-4 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg lg:col-span-2">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold">Thông tin người dùng đang đăng nhập</h3>
                        <div class="mt-4 grid gap-3 sm:grid-cols-2">
                            <div class="rounded-lg bg-slate-50 p-4">
                                <div class="text-sm text-slate-500">Họ tên</div>
                                <div class="font-semibold">{{ auth()->user()->name }}</div>
                            </div>
                            <div class="rounded-lg bg-slate-50 p-4">
                                <div class="text-sm text-slate-500">Email</div>
                                <div class="font-semibold">{{ auth()->user()->email }}</div>
                            </div>
                            <div class="rounded-lg bg-slate-50 p-4">
                                <div class="text-sm text-slate-500">Địa chỉ</div>
                                <div class="font-semibold">{{ auth()->user()->diachi ?: 'Chưa cập nhật' }}</div>
                            </div>
                            <div class="rounded-lg bg-slate-50 p-4">
                                <div class="text-sm text-slate-500">Nhóm quyền</div>
                                <div class="font-semibold">{{ auth()->user()->idgroup === 1 ? 'Admin' : 'Thành viên' }}</div>
                            </div>
                            <div class="rounded-lg bg-slate-50 p-4">
                                <div class="text-sm text-slate-500">Nghề nghiệp</div>
                                <div class="font-semibold">{{ auth()->user()->nghenghiep ?: 'Chưa cập nhật' }}</div>
                            </div>
                            <div class="rounded-lg bg-slate-50 p-4">
                                <div class="text-sm text-slate-500">Phái</div>
                                <div class="font-semibold">{{ auth()->user()->phai ?: 'Chưa chọn' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold">Các chức năng cần test</h3>
                        <div class="mt-4 space-y-3 text-sm">
                            <a class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('download') }}">
                                `auth` route protect: Trang download
                            </a>
                            <a class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('quantritin.index') }}">
                                `auth` trong controller: Quản trị tin
                            </a>
                            <a class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('quantri') }}">
                                Middleware `quantri`: Chỉ admin
                            </a>
                            <a class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('http-basic') }}">
                                HTTP Basic Authentication
                            </a>
                            <a class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('password.request') }}">
                                Quên mật khẩu
                            </a>
                            <a class="block rounded-lg border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('thoat') }}">
                                Thoát bằng route thủ công `/thoat`
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 6 Authentication & Middleware</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    <main class="mx-auto flex min-h-screen max-w-6xl items-center px-6 py-16">
        <div class="grid gap-8 lg:grid-cols-[1.4fr,1fr]">
            <section class="rounded-3xl bg-gradient-to-br from-sky-950 via-sky-900 to-cyan-800 p-10 text-white shadow-2xl">
                <p class="text-sm uppercase tracking-[0.3em] text-cyan-200">PHP3 Lab 6</p>
                <h1 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">Authentication và Middleware với Laravel Breeze</h1>
                <p class="mt-5 max-w-2xl text-base leading-7 text-sky-100">
                    Project này triển khai các ý chính của Lab 6: đăng ký, đăng nhập, quên mật khẩu,
                    route bảo vệ bằng `auth`, middleware `quantri`, HTTP Basic Authentication và route thoát thủ công.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl bg-white/10 p-5 backdrop-blur">
                        <div class="text-sm text-cyan-100">Tài khoản admin mẫu</div>
                        <div class="mt-2 font-semibold">vuiqua@gmail.com / hehe</div>
                        <div class="font-semibold">buonqua@gmail.com / huhu</div>
                    </div>
                    <div class="rounded-2xl bg-white/10 p-5 backdrop-blur">
                        <div class="text-sm text-cyan-100">Tài khoản thường</div>
                        <div class="mt-2 font-semibold">giahu@gmail.com / hihi</div>
                        <div class="mt-2 text-sm text-cyan-100">Chỉ admin mới vào được `/quantri`.</div>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl bg-white p-8 shadow-xl">
                <h2 class="text-2xl font-bold">Truy cập nhanh</h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Trạng thái hiện tại:
                    @auth
                        <span class="font-semibold text-emerald-700">Đã đăng nhập với {{ auth()->user()->name }}</span>
                    @else
                        <span class="font-semibold text-amber-700">Chưa đăng nhập</span>
                    @endauth
                </p>

                <div class="mt-6 space-y-3 text-sm">
                    @auth
                        <a class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('dashboard') }}">Vào dashboard</a>
                        <a class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('download') }}">Test route `auth`</a>
                        <a class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('quantritin.index') }}">Test controller có middleware `auth`</a>
                        <a class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('quantri') }}">Test middleware `quantri`</a>
                    @else
                        <a class="block rounded-2xl bg-slate-900 px-4 py-3 font-semibold text-white hover:bg-slate-800" href="{{ route('login') }}">Đăng nhập</a>
                        <a class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('register') }}">Đăng ký</a>
                    @endauth

                    <a class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('password.request') }}">Quên mật khẩu</a>
                    <a class="block rounded-2xl border border-slate-200 px-4 py-3 hover:bg-slate-50" href="{{ route('http-basic') }}">HTTP Basic Auth</a>
                </div>
            </section>
        </div>
    </main>
</body>
</html>

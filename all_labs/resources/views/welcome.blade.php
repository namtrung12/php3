@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Authentication & Middleware')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-lg-5">
                    <h1 class="h3 fw-bold">Authentication và Middleware với Laravel Breeze</h1>
                    <p class="mt-3 text-secondary">
                        Lab 6 triển khai đăng ký, đăng nhập, quên mật khẩu, route bảo vệ bằng middleware
                        <code>auth</code>, middleware <code>quantri</code>, HTTP Basic Authentication và route thoát thủ công.
                    </p>

                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <div class="fw-semibold">Tài khoản admin mẫu</div>
                                <div class="mt-2 small text-secondary">vuiqua@gmail.com / hehe</div>
                                <div class="small text-secondary">buonqua@gmail.com / huhu</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <div class="fw-semibold">Tài khoản thường</div>
                                <div class="mt-2 small text-secondary">giahu@gmail.com / hihi</div>
                                <div class="small text-secondary">Chỉ admin mới vào được trang quản trị.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h5 fw-bold">Truy cập nhanh</h2>
                    <p class="small text-secondary mb-3">
                        Trạng thái:
                        @auth
                            <span class="fw-semibold text-success">Đã đăng nhập với {{ auth()->user()->name }}</span>
                        @else
                            <span class="fw-semibold text-warning">Chưa đăng nhập</span>
                        @endauth
                    </p>

                    <div class="d-grid gap-2">
                        @auth
                            <a class="btn btn-primary" href="{{ route('dashboard') }}">Vào dashboard</a>
                            <a class="btn btn-outline-primary" href="{{ route('download') }}">Test route auth</a>
                            <a class="btn btn-outline-primary" href="{{ route('quantritin.index') }}">Test controller auth</a>
                            <a class="btn btn-outline-primary" href="{{ route('quantri') }}">Test middleware quantri</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}">Đăng nhập</a>
                            <a class="btn btn-outline-primary" href="{{ route('register') }}">Đăng ký</a>
                        @endauth

                        <a class="btn btn-outline-secondary" href="{{ route('password.request') }}">Quên mật khẩu</a>
                        <a class="btn btn-outline-secondary" href="{{ route('http-basic') }}">HTTP Basic Auth</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

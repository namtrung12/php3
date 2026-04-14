@extends('layouts.app')

@section('title', 'Đăng nhập ASM2')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h3 mb-3">Đăng nhập ASM2</h1>
                    <p class="text-muted">
                        Đăng nhập để xem sản phẩm hoặc truy cập khu vực quản trị.
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.store') }}" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email', 'lehanam3570@gmail.com') }}"
                                required
                                autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1"
                                @checked(old('remember'))
                            >
                            <label class="form-check-label" for="remember">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                    </form>

                    <div class="text-center mt-3">
                        Chưa có tài khoản?
                        <a href="{{ route('register') }}">Đăng ký ngay</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

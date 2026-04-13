@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Đăng nhập')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 fw-bold">Đăng nhập</h1>
                    <p class="text-secondary small">Dùng tài khoản đã đăng ký để vào dashboard Lab 6.</p>

                    <form method="POST" action="{{ route('login') }}" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password">Mật khẩu</label>
                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label">Ghi nhớ đăng nhập</label>
                        </div>

                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                            @endif
                            <button class="btn btn-primary" type="submit">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

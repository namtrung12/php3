@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Quên mật khẩu')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 fw-bold">Quên mật khẩu</h1>
                    <p class="text-secondary small">
                        Nhập email đã đăng ký. Hệ thống sẽ gửi liên kết đặt lại mật khẩu về hộp thư của bạn.
                    </p>

                    <form method="POST" action="{{ route('password.email') }}" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Gửi liên kết đặt lại mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

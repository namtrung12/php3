@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Xác minh email')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h1 class="h4 fw-bold">Xác minh email</h1>
            <p class="text-secondary">
                Cảm ơn bạn đã đăng ký. Vui lòng xác minh email bằng liên kết hệ thống đã gửi.
                Nếu chưa nhận được email, bạn có thể gửi lại liên kết xác minh.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    Liên kết xác minh mới đã được gửi đến email bạn dùng khi đăng ký.
                </div>
            @endif

            <div class="d-flex flex-wrap gap-2">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">Gửi lại email xác minh</button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-secondary" type="submit">Đăng xuất</button>
                </form>
            </div>
        </div>
    </div>
@endsection

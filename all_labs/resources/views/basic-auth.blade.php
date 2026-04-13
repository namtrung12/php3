@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - HTTP Basic Authentication')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h1 class="h4 fw-bold">HTTP Basic Authentication</h1>
            <p class="mt-3">
                Bạn đã vượt qua lớp xác thực HTTP Basic. Middleware <code>auth.basic</code> mặc định xác thực
                bằng email và mật khẩu của bảng <code>users</code>.
            </p>
            <ul class="mb-0">
                <li>Ví dụ admin: <code>vuiqua@gmail.com / hehe</code></li>
                <li>Ví dụ admin: <code>buonqua@gmail.com / huhu</code></li>
            </ul>
        </div>
    </div>
@endsection

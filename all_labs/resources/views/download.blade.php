@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Trang download')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h1 class="h4 fw-bold">Trang download</h1>
            <p class="mt-3 mb-0">
                Chào bạn <strong>{{ Auth::user()->name }}</strong>. Đây là trang download software, chỉ dành cho
                thành viên đã đăng nhập.
            </p>

            <div class="d-flex flex-wrap gap-2 mt-4">
                <a class="btn btn-primary" href="{{ route('dashboard') }}">Về dashboard</a>
                <a class="btn btn-outline-secondary" href="{{ route('thoat') }}">Thoát</a>
            </div>
        </div>
    </div>
@endsection

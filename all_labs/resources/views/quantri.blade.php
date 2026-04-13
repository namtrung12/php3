@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Khu vực quản trị')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="alert alert-warning border-warning">
        <h1 class="h4 fw-bold">Khu vực quản trị</h1>
        <p class="mb-2">Chỉ admin mới xem được trang này.</p>
        <p class="mb-0 small">
            Bạn đã đi qua middleware <code>quantri</code> thành công. Điều kiện hiện tại là <code>idgroup = 1</code>.
            Tài khoản đang dùng: <strong>{{ auth()->user()->email }}</strong>
        </p>
    </div>
@endsection

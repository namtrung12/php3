@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Dashboard')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
        <div>
            <h1 class="h3 fw-bold mb-1">Bảng điều khiển Lab 6</h1>
            <p class="text-secondary mb-0">Thông tin người dùng và các route cần test trong bài authentication.</p>
        </div>
        <a class="btn btn-outline-secondary" href="{{ route('lab6.home') }}">Về trang Lab 6</a>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h5 fw-bold">Thông tin người dùng đang đăng nhập</h2>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="small text-secondary">Họ tên</div>
                                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="small text-secondary">Email</div>
                                <div class="fw-semibold">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="small text-secondary">Địa chỉ</div>
                                <div class="fw-semibold">{{ auth()->user()->diachi ?: 'Chưa cập nhật' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="small text-secondary">Nhóm quyền</div>
                                <div class="fw-semibold">{{ auth()->user()->idgroup === 1 ? 'Admin' : 'Thành viên' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="small text-secondary">Nghề nghiệp</div>
                                <div class="fw-semibold">{{ auth()->user()->nghenghiep ?: 'Chưa cập nhật' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="small text-secondary">Phái</div>
                                <div class="fw-semibold">{{ auth()->user()->phai ?: 'Chưa chọn' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h5 fw-bold">Các chức năng cần test</h2>
                    <div class="d-grid gap-2 mt-3">
                        <a class="btn btn-outline-primary" href="{{ route('download') }}">Route auth: Trang download</a>
                        <a class="btn btn-outline-primary" href="{{ route('quantritin.index') }}">Controller có middleware auth</a>
                        <a class="btn btn-outline-primary" href="{{ route('quantri') }}">Middleware quantri</a>
                        <a class="btn btn-outline-primary" href="{{ route('http-basic') }}">HTTP Basic Authentication</a>
                        <a class="btn btn-outline-secondary" href="{{ route('password.request') }}">Quên mật khẩu</a>
                        <a class="btn btn-outline-secondary" href="{{ route('thoat') }}">Thoát bằng route thủ công</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

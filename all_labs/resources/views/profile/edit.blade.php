@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Tài khoản')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
        <div>
            <h1 class="h3 fw-bold mb-1">Tài khoản</h1>
            <p class="text-secondary mb-0">Cập nhật thông tin cá nhân, mật khẩu và kiểm tra chức năng xóa tài khoản.</p>
        </div>
        <a class="btn btn-outline-secondary" href="{{ route('dashboard') }}">Về dashboard</a>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="col-lg-5">
            <div class="d-grid gap-4">
                @include('profile.partials.update-password-form')
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Đăng ký ASM2')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h3 mb-3">Đăng ký ASM2</h1>
                    <p class="text-muted">
                        Tạo tài khoản mới để đăng nhập và quản lý danh mục, sản phẩm, user.
                    </p>

                    <form method="POST" action="{{ route('register.store') }}" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="diachi" class="form-label">Địa chỉ</label>
                            <input
                                type="text"
                                class="form-control @error('diachi') is-invalid @enderror"
                                id="diachi"
                                name="diachi"
                                value="{{ old('diachi') }}"
                            >
                            @error('diachi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nghenghiep" class="form-label">Nghề nghiệp</label>
                                <input
                                    type="text"
                                    class="form-control @error('nghenghiep') is-invalid @enderror"
                                    id="nghenghiep"
                                    name="nghenghiep"
                                    value="{{ old('nghenghiep') }}"
                                >
                                @error('nghenghiep')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phai" class="form-label">Giới tính</label>
                                <select id="phai" name="phai" class="form-select @error('phai') is-invalid @enderror">
                                    <option value="">-- Chọn giới tính --</option>
                                    <option value="Nam" @selected(old('phai') === 'Nam')>Nam</option>
                                    <option value="Nữ" @selected(old('phai') === 'Nữ')>Nữ</option>
                                    <option value="Khác" @selected(old('phai') === 'Khác')>Khác</option>
                                </select>
                                @error('phai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
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

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-success w-100">Đăng ký</button>
                    </form>

                    <div class="text-center mt-3">
                        Đã có tài khoản?
                        <a href="{{ route('login') }}">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

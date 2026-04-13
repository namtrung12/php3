@extends('layouts.app')

@section('title', 'Thêm user')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <h1 class="mb-0">Thêm user</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>

    <form action="{{ route('users.store') }}" method="POST" class="card shadow-sm">
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" name="diachi" id="diachi" class="form-control @error('diachi') is-invalid @enderror" value="{{ old('diachi') }}">
                @error('diachi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <label for="idgroup" class="form-label">Nhóm quyền</label>
                    <select name="idgroup" id="idgroup" class="form-select @error('idgroup') is-invalid @enderror" required>
                        <option value="0" @selected((string) old('idgroup', '0') === '0')>User</option>
                        <option value="1" @selected((string) old('idgroup') === '1')>Admin</option>
                    </select>
                    @error('idgroup')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="nghenghiep" class="form-label">Nghề nghiệp</label>
                    <input type="text" name="nghenghiep" id="nghenghiep" class="form-control @error('nghenghiep') is-invalid @enderror" value="{{ old('nghenghiep') }}">
                    @error('nghenghiep')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="phai" class="form-label">Giới tính</label>
                    <select name="phai" id="phai" class="form-select @error('phai') is-invalid @enderror">
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
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Lưu user</button>
        </div>
    </form>
@endsection

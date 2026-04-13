@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Đăng ký')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 fw-bold">Đăng ký tài khoản</h1>
                    <p class="text-secondary small">Form mở rộng thêm địa chỉ, nghề nghiệp và phái theo yêu cầu Lab 6.</p>

                    <form method="POST" action="{{ route('register') }}" class="mt-4">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Họ tên</label>
                                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="diachi">Địa chỉ</label>
                                <input id="diachi" class="form-control @error('diachi') is-invalid @enderror" type="text" name="diachi" value="{{ old('diachi') }}" autocomplete="street-address">
                                @error('diachi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="nghenghiep">Nghề nghiệp</label>
                                <input id="nghenghiep" class="form-control @error('nghenghiep') is-invalid @enderror" type="text" name="nghenghiep" value="{{ old('nghenghiep') }}">
                                @error('nghenghiep')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="phai">Phái</label>
                                <select id="phai" name="phai" class="form-select @error('phai') is-invalid @enderror">
                                    <option value="">-- Chọn phái --</option>
                                    <option value="Nam" @selected(old('phai') === 'Nam')>Nam</option>
                                    <option value="Nữ" @selected(old('phai') === 'Nữ')>Nữ</option>
                                    <option value="Khác" @selected(old('phai') === 'Khác')>Khác</option>
                                </select>
                                @error('phai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="password_confirmation">Nhập lại mật khẩu</label>
                                <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-4">
                            <a href="{{ route('login') }}">Đã có tài khoản?</a>
                            <button class="btn btn-primary" type="submit">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

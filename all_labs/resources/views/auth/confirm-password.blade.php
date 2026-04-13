@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Xác nhận mật khẩu')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 fw-bold">Xác nhận mật khẩu</h1>
                    <p class="text-secondary small">
                        Đây là khu vực bảo mật. Vui lòng xác nhận mật khẩu trước khi tiếp tục.
                    </p>

                    <form method="POST" action="{{ route('password.confirm') }}" class="mt-4">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label" for="password">Mật khẩu</label>
                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

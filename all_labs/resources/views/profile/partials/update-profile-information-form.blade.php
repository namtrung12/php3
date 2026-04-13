<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <h2 class="h5 fw-bold">Thông tin cá nhân</h2>
        <p class="text-secondary small">Cập nhật họ tên và email của tài khoản đang đăng nhập.</p>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-4">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label class="form-label" for="name">Họ tên</label>
                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="form-text">
                        Email của bạn chưa được xác minh.
                        <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline" type="submit">
                            Gửi lại email xác minh.
                        </button>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success mt-3 mb-0">
                            Liên kết xác minh mới đã được gửi đến email của bạn.
                        </div>
                    @endif
                @endif
            </div>

            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-primary" type="submit">Lưu thông tin</button>

                @if (session('status') === 'profile-updated')
                    <span class="text-success small">Đã lưu.</span>
                @endif
            </div>
        </form>
    </div>
</div>

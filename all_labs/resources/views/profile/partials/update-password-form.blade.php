<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <h2 class="h5 fw-bold">Đổi mật khẩu</h2>
        <p class="text-secondary small">Nhập mật khẩu hiện tại trước khi đặt mật khẩu mới.</p>

        <form method="post" action="{{ route('password.update') }}" class="mt-4">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label" for="update_password_current_password">Mật khẩu hiện tại</label>
                <input id="update_password_current_password" name="current_password" type="password" class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}" autocomplete="current-password">
                @foreach ($errors->updatePassword->get('current_password') as $message)
                    <div class="invalid-feedback">{{ $message }}</div>
                @endforeach
            </div>

            <div class="mb-3">
                <label class="form-label" for="update_password_password">Mật khẩu mới</label>
                <input id="update_password_password" name="password" type="password" class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}" autocomplete="new-password">
                @foreach ($errors->updatePassword->get('password') as $message)
                    <div class="invalid-feedback">{{ $message }}</div>
                @endforeach
            </div>

            <div class="mb-4">
                <label class="form-label" for="update_password_password_confirmation">Nhập lại mật khẩu mới</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control {{ $errors->updatePassword->has('password_confirmation') ? 'is-invalid' : '' }}" autocomplete="new-password">
                @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                    <div class="invalid-feedback">{{ $message }}</div>
                @endforeach
            </div>

            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-primary" type="submit">Lưu mật khẩu</button>

                @if (session('status') === 'password-updated')
                    <span class="text-success small">Đã lưu.</span>
                @endif
            </div>
        </form>
    </div>
</div>

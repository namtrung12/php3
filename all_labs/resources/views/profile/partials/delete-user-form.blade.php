<div class="card border-danger shadow-sm">
    <div class="card-body p-4">
        <h2 class="h5 fw-bold text-danger">Xóa tài khoản</h2>
        <p class="text-secondary small">
            Nhập mật khẩu để xác nhận. Sau khi xóa, tài khoản sẽ bị loại khỏi hệ thống.
        </p>

        <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
            @csrf
            @method('delete')

            <div class="mb-4">
                <label class="form-label" for="password">Mật khẩu</label>
                <input id="password" name="password" type="password" class="form-control {{ $errors->userDeletion->has('password') ? 'is-invalid' : '' }}" placeholder="Nhập mật khẩu hiện tại">
                @foreach ($errors->userDeletion->get('password') as $message)
                    <div class="invalid-feedback">{{ $message }}</div>
                @endforeach
            </div>

            <button class="btn btn-danger" type="submit">Xóa tài khoản</button>
        </form>
    </div>
</div>

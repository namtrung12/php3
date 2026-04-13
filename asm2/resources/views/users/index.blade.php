@extends('layouts.app')

@section('title', 'Quản lý user')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <div>
            <h1 class="mb-0">Quản lý user</h1>
            <div class="text-muted small">Danh sách tài khoản có thể đăng nhập ASM2.</div>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-success">Thêm user</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('users.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-sm-9 col-md-10">
            <input
                type="text"
                name="keyword"
                class="form-control"
                placeholder="Tìm theo tên hoặc email..."
                value="{{ $keyword }}"
            >
        </div>
        <div class="col-sm-3 col-md-2 d-grid">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
                    <th>Nghề nghiệp</th>
                    <th>Giới tính</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->diachi ?: '-' }}</td>
                        <td>{{ (int) $user->idgroup === 1 ? 'Admin' : 'User' }}</td>
                        <td>{{ $user->nghenghiep ?: '-' }}</td>
                        <td>{{ $user->phai ?: '-' }}</td>
                        <td>{{ optional($user->created_at)->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa user này?')"
                                    @disabled(auth()->id() === $user->id)
                                >
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Không tìm thấy user phù hợp.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
@endsection

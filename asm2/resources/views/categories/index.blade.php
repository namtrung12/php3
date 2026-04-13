@extends('layouts.app')

@section('title', 'Danh mục sản phẩm')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <h1 class="mb-0">Danh mục sản phẩm</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Thêm mới</a>
    </div>

    @auth
        <div class="alert alert-info">
            Chào bạn <strong>{{ auth()->user()->name }}</strong>.
            Email: <strong>{{ auth()->user()->email }}</strong>.
            Quyền: <strong>{{ (int) auth()->user()->idgroup === 1 ? 'Admin' : 'User' }}</strong>.
        </div>
    @endauth

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

    <form action="{{ route('categories.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-sm-9 col-md-10">
            <input
                type="text"
                name="keyword"
                class="form-control"
                placeholder="Tìm theo tên danh mục..."
                value="{{ $keyword }}"
            >
        </div>
        <div class="col-sm-3 col-md-2 d-grid">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status ? 'Hiển thị' : 'Ẩn' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')"
                            >
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Không tìm thấy danh mục phù hợp.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection

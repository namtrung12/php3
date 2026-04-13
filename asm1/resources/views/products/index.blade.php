@extends('layouts.app')

@section('title', 'Quản lý sản phẩm')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <h1 class="mb-0">Quản lý sản phẩm</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">Thêm mới</a>
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

    <form action="{{ route('products.index') }}" method="GET" class="row g-2 mb-3">
        <div class="col-sm-9 col-md-10">
            <input
                type="text"
                name="keyword"
                class="form-control"
                placeholder="Tim theo ten san pham..."
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
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if (!empty($product->image))
                                <img
                                    src="{{ str_starts_with((string) $product->image, 'http') ? $product->image : asset($product->image) }}"
                                    alt="{{ $product->name }}"
                                    style="width: 64px; height: 64px; object-fit: cover; border-radius: 8px;"
                                >
                            @else
                                <span class="text-muted">Chưa có</span>
                            @endif
                        </td>
                        <td>{{ number_format((int) $product->price, 0, ',', '.') }} VND</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category_name ?? 'Chưa có' }}</td>
                        <td>{{ (int) $product->status === 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Ban chac chan muon xoa san pham nay?')"
                                >
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Không tìm thấy sản phẩm phù hợp.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $products->links() }}
@endsection

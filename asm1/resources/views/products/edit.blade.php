@extends('layouts.app')

@section('title', 'Cập nhật sản phẩm')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <h1 class="mb-0">Cập nhật sản phẩm</h1>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name', $product->name) }}"
                required
            >
        </div>

        <div class="col-md-3">
            <label for="price" class="form-label">Giá</label>
            <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                min="0"
                value="{{ old('price', $product->price) }}"
                required
            >
        </div>

        <div class="col-md-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input
                type="number"
                id="quantity"
                name="quantity"
                class="form-control"
                min="0"
                value="{{ old('quantity', $product->quantity) }}"
                required
            >
        </div>

        <div class="col-md-6">
            <label for="image" class="form-label">Hình ảnh mới (không chọn nếu giữ ảnh cũ)</label>
            <input type="file" id="image" name="image" class="form-control" accept=".jpg,.jpeg,.png,.gif,.webp,image/*">

            @if (!empty($product->image))
                <div class="mt-2">
                    <img
                        src="{{ str_starts_with((string) $product->image, 'http') ? $product->image : asset($product->image) }}"
                        alt="{{ $product->name }}"
                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;"
                    >
                </div>
            @endif
        </div>

        <div class="col-md-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected((string) old('category_id', $product->category_id) === (string) $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="status" class="form-label">Trang thái</label>
            <select id="status" name="status" class="form-select" required>
                <option value="1" @selected((string) old('status', $product->status) === '1')>Hiển thị</option>
                <option value="0" @selected((string) old('status', $product->status) === '0')>Ẩn</option>
            </select>
        </div>

        <div class="col-12">
            <label for="describe" class="form-label">Mô tả</label>
            <textarea id="describe" name="describe" rows="4" class="form-control" required>{{ old('describe', $product->describe) }}</textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
        </div>
    </form>
@endsection

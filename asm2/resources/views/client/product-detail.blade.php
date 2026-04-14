@extends('layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <div class="d-flex justify-content-between align-items-center gap-2 mb-3 flex-wrap">
        <div>
            <h1 class="h4 mb-1">Chi tiết sản phẩm</h1>
            <p class="text-muted mb-0">Thông tin sản phẩm dành cho người dùng đã đăng nhập.</p>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Quay lại trang chủ</a>
    </div>

    <div class="card shadow-sm">
        <div class="row g-0">
            <div class="col-12 col-md-5">
                @if (! empty($product->image))
                    <img
                        src="{{ str_starts_with((string) $product->image, 'http') ? $product->image : asset($product->image) }}"
                        alt="{{ $product->name }}"
                        class="img-fluid w-100 h-100"
                        style="max-height: 420px; object-fit: cover;"
                    >
                @else
                    <div class="h-100 d-flex align-items-center justify-content-center text-muted" style="min-height: 300px;">
                        Không có hình ảnh
                    </div>
                @endif
            </div>

            <div class="col-12 col-md-7">
                <div class="card-body">
                    <p class="text-muted mb-2">Danh mục: {{ $product->category?->name ?? 'Chưa phân loại' }}</p>
                    <h2 class="h3">{{ $product->name }}</h2>
                    <p class="text-danger fw-bold fs-5">{{ number_format((int) $product->price, 0, ',', '.') }} VND</p>
                    <p class="mb-2">Số lượng còn: {{ $product->quantity }}</p>
                    <p class="mb-0">Mô tả: {{ $product->describe }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

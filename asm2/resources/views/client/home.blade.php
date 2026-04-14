@extends('layouts.app')

@section('title', 'Trang chủ sản phẩm')

@section('content')
    <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap mb-4">
        <div>
            <h1 class="h3 mb-1">Danh mục và sản phẩm</h1>
            <p class="text-muted mb-0">Trang mặc định cho khách và người dùng trong ASM2.</p>
        </div>

        @auth
            <div class="text-muted text-end">
                Xin chào <strong>{{ auth()->user()->name }}</strong><br>
                Quyền: <strong>{{ (int) auth()->user()->idgroup === 1 ? 'Admin' : 'User' }}</strong>
            </div>
        @endauth
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('home') }}" method="GET" class="row g-2">
                <div class="col-12 col-md-5">
                    <input
                        type="text"
                        name="keyword"
                        class="form-control"
                        value="{{ $keyword }}"
                        placeholder="Tìm theo tên sản phẩm..."
                    >
                </div>

                <div class="col-12 col-md-5">
                    <select name="category_id" class="form-select">
                        <option value="">Tất cả danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($selectedCategoryId === $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 col-md-1 d-grid">
                    <button type="submit" class="btn btn-primary">Tìm</button>
                </div>

                <div class="col-6 col-md-1 d-grid">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <h2 class="h5 mb-3">Danh sách danh mục</h2>
    <div class="d-flex flex-wrap gap-2 mb-4">
        <a
            href="{{ route('home', array_filter(['keyword' => $keyword])) }}"
            class="btn btn-sm {{ $selectedCategoryId === null ? 'btn-dark' : 'btn-outline-dark' }}"
        >
            Tất cả
        </a>
        @foreach ($categories as $category)
            <a
                href="{{ route('home', array_filter(['keyword' => $keyword, 'category_id' => $category->id])) }}"
                class="btn btn-sm {{ $selectedCategoryId === $category->id ? 'btn-dark' : 'btn-outline-dark' }}"
            >
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <h2 class="h5 mb-3">Danh sách sản phẩm</h2>

    @if ($products->isEmpty())
        <div class="alert alert-warning">Không tìm thấy sản phẩm phù hợp.</div>
    @else
        <div class="row g-3">
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        @if (! empty($product->image))
                            <img
                                src="{{ str_starts_with((string) $product->image, 'http') ? $product->image : asset($product->image) }}"
                                class="card-img-top"
                                alt="{{ $product->name }}"
                                style="height: 220px; object-fit: cover;"
                            >
                        @endif

                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">{{ $product->category?->name ?? 'Chưa phân loại' }}</p>
                            <h3 class="h6">{{ $product->name }}</h3>
                            <p class="text-danger fw-bold mb-2">{{ number_format((int) $product->price, 0, ',', '.') }} VND</p>
                            <p class="text-muted small mb-2">Số lượng: {{ $product->quantity }}</p>
                            <p class="text-muted small mb-3">
                                {{ \Illuminate\Support\Str::limit((string) $product->describe, 90) }}
                            </p>

                            @guest
                                <p class="small text-muted mb-2">Đăng nhập để xem chi tiết sản phẩm.</p>
                            @endguest

                            <a href="{{ route('client.products.show', $product) }}" class="btn btn-primary mt-auto">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @endif
@endsection

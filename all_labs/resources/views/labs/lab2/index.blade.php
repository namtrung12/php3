@extends('labs.layout')

@section('title', 'Lab 2 - Query Builder')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1>Lab 2 - Sử dụng Query Builder</h1>
            <p class="text-muted">Lấy dữ liệu từ bảng `tin` và `loaitin` bằng DB Query Builder.</p>
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary" href="{{ route('lab2.xemnhieu') }}">Tin xem nhiều</a>
                <a class="btn btn-primary" href="{{ route('lab2.tinmoi') }}">Tin mới</a>
                <a class="btn btn-outline-primary" href="{{ route('lab2.tintrongloai', 1) }}">Tin trong loại 1</a>
                <a class="btn btn-outline-primary" href="{{ route('lab2.tin', 1) }}">Chi tiết tin 1</a>
            </div>
        </div>
    </div>
@endsection

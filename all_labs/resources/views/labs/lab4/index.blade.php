@extends('labs.layout')

@section('title', 'Lab 4 - Migration & Seeder')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1>Lab 4 - Migration & Seeder</h1>
            <p class="text-muted">Dữ liệu được tạo bằng migration và seeder trong project tổng.</p>
            <div class="row g-3">
                <div class="col-md-3"><div class="border rounded p-3 bg-light">Loại tin: <strong>{{ $loaiTinCount }}</strong></div></div>
                <div class="col-md-3"><div class="border rounded p-3 bg-light">Tin: <strong>{{ $tinCount }}</strong></div></div>
                <div class="col-md-3"><div class="border rounded p-3 bg-light">Sản phẩm: <strong>{{ $productCount }}</strong></div></div>
                <div class="col-md-3"><div class="border rounded p-3 bg-light">Loại SP: <strong>{{ $loaiSanPhamCount }}</strong></div></div>
            </div>
            <div class="mt-3 d-flex gap-2">
                <a class="btn btn-primary" href="{{ route('lab4.tin.trongloai', 1) }}">Xem dữ liệu seed loại 1</a>
                <a class="btn btn-outline-primary" href="{{ route('lab4.tin.chitiet', 1) }}">Chi tiết tin 1</a>
            </div>
        </div>
    </div>
@endsection

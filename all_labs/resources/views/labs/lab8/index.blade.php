@extends('labs.layout')

@section('title', 'Lab 8 - RESTful API')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1>Lab 8 - RESTful API With Laravel</h1>
            <p class="text-muted">API vẫn tách riêng ở prefix `/api`, dùng Postman để test.</p>
            <h2 class="h5">Products</h2>
            <pre class="bg-light border rounded p-3">GET    /api/products
POST   /api/products
GET    /api/products/{id}
PUT    /api/products/{id}
DELETE /api/products/{id}</pre>
            <h2 class="h5">LoaiSanPham</h2>
            <pre class="bg-light border rounded p-3">GET    /api/loaisanpham
POST   /api/loaisanpham
GET    /api/loaisanpham/{id}
PUT    /api/loaisanpham/{id}
DELETE /api/loaisanpham/{id}</pre>
            <h2 class="h5">Auth Sanctum</h2>
            <pre class="bg-light border rounded p-3">POST /api/dangky
POST /api/dangnhap
GET  /api/profile
POST /api/logout</pre>
        </div>
    </div>
@endsection

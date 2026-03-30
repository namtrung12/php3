@extends('layouts.app')

@section('title', 'Chi tiết tin')

@section('content')
    <div class="card">
        <h1>Chi tiết tin #{{ $id }}</h1>
        <p class="muted">Đây là nội dung chi tiết cho bản tin có id = {{ $id }} (dữ liệu demo).</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis, nisl ac placerat laoreet, purus nisl
            gravida nunc, eget convallis ipsum libero in turpis. Đây chỉ là nội dung mẫu phục vụ bài lab.</p>
        <a class="btn" href="{{ url('/tin-tuc') }}">← Quay lại danh sách</a>
    </div>
@endsection

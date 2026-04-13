@extends('labs.layout')

@section('title', 'Lab 1 - Cơ bản về Laravel')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1>Lab 1 - Cơ bản về Laravel</h1>
            <p class="text-muted">Thực hành route, controller, view và truyền tham số.</p>
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary" href="{{ route('lab1.tintuc') }}">Tin tức</a>
                <a class="btn btn-outline-primary" href="{{ route('lab1.lienhe') }}">Liên hệ</a>
                <a class="btn btn-outline-primary" href="{{ route('lab1.thongtinsv') }}">Thông tin sinh viên</a>
            </div>
        </div>
    </div>
@endsection

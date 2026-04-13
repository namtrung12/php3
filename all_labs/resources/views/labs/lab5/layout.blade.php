@extends('labs.layout')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-0">@yield('lab5_title', 'Lab 5 - Eloquent ORM')</h1>
            <p class="text-muted mb-0">CRUD bảng tin bằng Eloquent, relationship và soft delete.</p>
        </div>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('lab5.tin.index') }}">Danh sách</a>
            <a class="btn btn-outline-dark" href="{{ route('lab5.tin.trash') }}">Thùng rác</a>
            <a class="btn btn-primary" href="{{ route('lab5.tin.create') }}">+ Thêm tin</a>
        </div>
    </div>

    @yield('lab5_content')
@endsection

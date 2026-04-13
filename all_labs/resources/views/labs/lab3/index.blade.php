@extends('labs.layout')

@section('title', 'Lab 3 - Blade Template')

@section('content')
    <div class="row g-3">
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="h4">Lab 3 - Blade Template</h1>
                    <p class="text-muted">Tách layout, menu, danh sách và chi tiết tin bằng Blade.</p>
                    <h2 class="h6">Chuyên mục</h2>
                    <div class="list-group">
                        @foreach ($loaiTin as $loai)
                            <a class="list-group-item list-group-item-action" href="{{ route('lab3.tin.trongloai', $loai->id) }}">
                                {{ $loai->tenLoai }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @include('labs.shared.news-list', [
                'labTitle' => 'Lab 3 - Trang chủ',
                'title' => 'Tin mới',
                'tin' => $tinMoi,
                'detailRoute' => 'lab3.tin.chitiet',
            ])
        </div>
    </div>
@endsection

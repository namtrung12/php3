@extends('labs.layout')

@section('title', 'PHP3 - Tất cả bài lab')

@section('content')
    <div class="p-4 p-lg-5 bg-white border rounded-3 shadow-sm mb-4">
        <p class="text-uppercase small text-primary fw-bold mb-2">Một project, một server</p>
        <h1 class="display-6 fw-bold">PHP3 - All Labs</h1>
        <p class="lead mb-0">
            Các bài Lab 1 đến Lab 8 được tách riêng theo từng module để giảng viên mở và chấm từng phần,
            nhưng chỉ cần chạy một lệnh `php artisan serve`.
        </p>
    </div>

    <div class="row g-3">
        @foreach ($labs as $lab)
            <div class="col-md-6 col-xl-3">
                <a class="card h-100 text-decoration-none shadow-sm" href="{{ $lab['url'] }}">
                    <div class="card-body">
                        <div class="badge text-bg-primary mb-3">Lab {{ $lab['number'] }}</div>
                        <h2 class="h5 text-dark">{{ $lab['title'] }}</h2>
                        <p class="text-muted mb-0">Mở phần bài làm riêng của Lab {{ $lab['number'] }}.</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

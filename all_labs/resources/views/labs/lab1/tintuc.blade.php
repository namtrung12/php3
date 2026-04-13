@extends('labs.layout')

@section('title', 'Lab 1 - Tin tức')

@section('content')
    <h1 class="mb-3">Tin tức Lab 1</h1>
    <div class="row g-3">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5">{{ $post['title'] }}</h2>
                        <p class="text-muted">{{ $post['excerpt'] }}</p>
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('lab1.chitiet', $post['id']) }}">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

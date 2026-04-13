@extends('labs.layout')

@section('title', $labTitle)

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <p class="text-uppercase small text-primary fw-bold mb-1">{{ $labTitle }}</p>
            <h1>{{ $tin->tieuDe }}</h1>
            <p class="text-muted">
                Ngày đăng: {{ \Illuminate\Support\Carbon::parse($tin->ngayDang)->format('d/m/Y H:i') }}
                - Lượt xem: {{ number_format($tin->xem) }}
            </p>
            <div class="alert alert-info">{{ $tin->tomTat }}</div>
            <p>{{ $tin->noiDung }}</p>
        </div>
    </div>
@endsection

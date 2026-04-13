@extends('labs.layout')

@section('title', 'Lab 1 - Chi tiết tin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1>Chi tiết tin số {{ $id }}</h1>
            <p class="text-muted">Route nhận tham số `id` từ URL và truyền sang view.</p>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
    <div class="card">
        <h1>Đây là trang chủ</h1>
        <p class="muted">Chào mừng bạn đến với bài Lab 1 – thực hành các khái niệm cơ bản của Laravel: routing, controller, view và truyền tham số.</p>
        <a class="btn" href="{{ url('/tin-tuc') }}">Xem tin tức</a>
    </div>
@endsection

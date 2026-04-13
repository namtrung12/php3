@extends('labs.layout')

@section('active_lab', 'lab6')
@section('title', 'Lab 6 - Quản trị tin')

@section('content')
    <div class="page-kicker">Lab 6</div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h1 class="h4 fw-bold">Quản trị tin</h1>
            <p class="mt-3 mb-2">
                Bạn đang ở khu vực quản trị tin. Route này được bảo vệ bằng middleware <code>auth</code>
                đặt trong controller.
            </p>
            <p class="small text-secondary mb-0">
                Người dùng hiện tại: {{ auth()->user()->name }} - {{ auth()->user()->email }}
            </p>
        </div>
    </div>
@endsection

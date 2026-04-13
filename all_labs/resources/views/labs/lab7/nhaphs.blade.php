@extends('labs.layout')

@section('title', 'Lab 7 - Nhập học sinh')

@section('content')
    <form method="post" action="{{ route('lab7.hs_store') }}" class="card shadow-sm">
        @csrf
        <div class="card-body">
            <h1 class="h4">NHẬP THÔNG TIN HỌC SINH</h1>
            @if ($errors->any())
                <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            <div class="mb-3"><label class="form-label">Họ tên</label><input class="form-control" name="hoten" value="{{ old('hoten') }}"></div>
            <div class="mb-3"><label class="form-label">Tuổi</label><input class="form-control" name="tuoi" value="{{ old('tuoi') }}"></div>
            <div class="mb-3"><label class="form-label">Ngày sinh</label><input class="form-control" name="ngaysinh" value="{{ old('ngaysinh') }}"></div>
            <button class="btn btn-primary">Lưu thông tin</button>
        </div>
    </form>
@endsection

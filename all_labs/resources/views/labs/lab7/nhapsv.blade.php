@extends('labs.layout')

@section('title', 'Lab 7 - Nhập sinh viên')

@section('content')
    <form method="post" action="{{ route('lab7.sv_store') }}" class="card shadow-sm">
        @csrf
        <div class="card-body">
            <h1 class="h4">NHẬP THÔNG TIN SINH VIÊN</h1>
            @if ($errors->any())
                <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            @foreach (['masv' => 'Mã SV', 'hoten' => 'Họ tên', 'tuoi' => 'Tuổi', 'ngaysinh' => 'Ngày sinh', 'cmnd' => 'CMND', 'email' => 'Email'] as $field => $label)
                <div class="mb-3">
                    <label class="form-label">{{ $label }}</label>
                    <input class="form-control" name="{{ $field }}" value="{{ old($field) }}">
                    @error($field)<span class="badge text-bg-danger">{{ $message }}</span>@enderror
                </div>
            @endforeach
            <button class="btn btn-primary">Xử lý</button>
        </div>
    </form>
@endsection

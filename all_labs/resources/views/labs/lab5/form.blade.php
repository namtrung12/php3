@extends('labs.lab5.layout')

@section('title', 'Lab 5 - '.$title)
@section('lab5_title', 'Lab 5 - '.$title)

@section('lab5_content')
    <form class="card shadow-sm" method="POST" action="{{ $action }}">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input class="form-control" name="tieuDe" value="{{ old('tieuDe', $tin->tieuDe) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Loại tin</label>
                <select class="form-select" name="idLT">
                    @foreach ($loaiTin as $loai)
                        <option value="{{ $loai->id }}" @selected(old('idLT', $tin->idLT) == $loai->id)>{{ $loai->tenLoai }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tóm tắt</label>
                <textarea class="form-control" name="tomTat" rows="3">{{ old('tomTat', $tin->tomTat) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea class="form-control" name="noiDung" rows="5">{{ old('noiDung', $tin->noiDung) }}</textarea>
            </div>
            <button class="btn btn-primary">Lưu</button>
        </div>
    </form>
@endsection

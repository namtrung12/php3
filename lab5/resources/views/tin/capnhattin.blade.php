@extends('tin.layout')

@section('title', 'Cập nhật tin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h5 mb-3">Cập nhật tin #{{ $tin->id }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tin.update', $tin) }}" method="POST" class="col-lg-7 col-md-9">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label" for="tieuDe">Tiêu đề</label>
                    <input id="tieuDe" name="tieuDe" class="form-control" value="{{ old('tieuDe', $tin->tieuDe) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tomTat">Tóm tắt</label>
                    <textarea id="tomTat" name="tomTat" class="form-control" rows="3">{{ old('tomTat', $tin->tomTat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="urlHinh">urlHinh</label>
                    <input id="urlHinh" name="urlHinh" class="form-control" value="{{ old('urlHinh', $tin->urlHinh) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="idLT">idLT</label>
                    <select id="idLT" name="idLT" class="form-select" required>
                        @foreach ($loaiTin as $lt)
                            <option value="{{ $lt->id }}" {{ old('idLT', $tin->idLT) == $lt->id ? 'selected' : '' }}>
                                {{ $lt->tenLoai ?? ('Loại ' . $lt->id) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                <a href="{{ route('tin.index') }}" class="btn btn-link">Hủy</a>
            </form>
        </div>
    </div>
@endsection

@extends('tin.layout')

@section('title', 'Thêm tin mới')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h5 mb-3">Form thêm tin</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tin.store') }}" method="POST" class="col-lg-7 col-md-9">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="tieuDe">Tiêu đề</label>
                    <input id="tieuDe" name="tieuDe" class="form-control" value="{{ old('tieuDe') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tomTat">Tóm tắt</label>
                    <textarea id="tomTat" name="tomTat" class="form-control" rows="3">{{ old('tomTat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="urlHinh">urlHinh</label>
                    <input id="urlHinh" name="urlHinh" class="form-control" value="{{ old('urlHinh') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="idLT">idLT</label>
                    <select id="idLT" name="idLT" class="form-select" required>
                        <option value="">-- Chọn loại tin --</option>
                        @foreach ($loaiTin as $lt)
                            <option value="{{ $lt->id }}" {{ old('idLT') == $lt->id ? 'selected' : '' }}>
                                {{ $lt->tenLoai ?? ('Loại ' . $lt->id) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Thêm tin</button>
            </form>
        </div>
    </div>
@endsection

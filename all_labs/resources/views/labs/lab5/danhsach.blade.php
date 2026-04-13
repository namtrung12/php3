@extends('labs.lab5.layout')

@section('title', 'Lab 5 - Danh sách tin')
@section('lab5_title', 'Lab 5 - Danh sách tin')

@section('lab5_content')
    <div class="row g-3 mb-3">
        <div class="col-md-3"><div class="card"><div class="card-body">Tổng tin: <strong>{{ $stats['tongTin'] }}</strong></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body">Tổng xem: <strong>{{ number_format($stats['tongLuotXem']) }}</strong></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body">Xem cao nhất: <strong>{{ number_format($stats['luotXemCaoNhat']) }}</strong></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body">Thùng rác: <strong>{{ $stats['dangTrongThungRac'] }}</strong></div></div></div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead><tr><th>ID</th><th>Tiêu đề</th><th>Loại</th><th>Ngày</th><th class="text-end">Thao tác</th></tr></thead>
                <tbody>
                @foreach ($listTin as $tin)
                    <tr>
                        <td>{{ $tin->id }}</td>
                        <td>{{ $tin->tieuDe }}</td>
                        <td>{{ $tin->loaitin->tenLoai ?? 'N/A' }}</td>
                        <td>{{ optional($tin->ngayDang)->format('d/m/Y') }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('lab5.tin.edit', $tin) }}">Sửa</a>
                            <form class="d-inline" method="POST" action="{{ route('lab5.tin.destroy', $tin) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('tin.layout')

@section('title', 'Danh sách tin')

@section('content')
    <div class="row g-3 mb-3">
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Tổng số tin</div>
                    <div class="fs-3 fw-bold">{{ $stats['tongTin'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Tổng lượt xem</div>
                    <div class="fs-3 fw-bold">{{ number_format($stats['tongLuotXem']) }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Lượt xem cao nhất</div>
                    <div class="fs-3 fw-bold">{{ number_format($stats['luotXemCaoNhat']) }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Tin trong thùng rác</div>
                    <div class="fs-3 fw-bold">{{ $stats['dangTrongThungRac'] }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h5 mb-3">Tất cả bài tin</h2>
            <p class="text-muted">Danh sách lấy bằng Eloquent kèm quan hệ `belongsTo`, thống kê `count`, `sum`, `max` và hỗ trợ xóa mềm.</p>

            @if ($listTin->isEmpty())
                <p class="text-muted mb-0">Chưa có bài tin nào.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-sm align-middle">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Loại tin</th>
                            <th>Ngày đăng</th>
                            <th>Lượt xem</th>
                            <th class="text-end">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($listTin as $tin)
                            <tr>
                                <td>{{ $tin->id }}</td>
                                <td class="fw-semibold">{{ $tin->tieuDe }}</td>
                                <td>{{ $tin->loaitin->tenLoai ?? 'N/A' }}</td>
                                <td>{{ optional($tin->ngayDang)->format('d/m/Y H:i') }}</td>
                                <td>{{ number_format($tin->xem) }}</td>
                                <td class="text-end">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('tin.edit', $tin) }}">Sửa</a>
                                    <form class="d-inline" action="{{ route('tin.destroy', $tin) }}" method="POST" onsubmit="return confirm('Xóa tin này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

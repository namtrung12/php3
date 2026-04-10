@extends('tin.layout')

@section('title', 'Thùng rác')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h5 mb-3">Tin đã xóa mềm</h2>
            <p class="text-muted">Phần này dùng `onlyTrashed()`, `restore()` và `forceDelete()` để bám sát nội dung slide Eloquent.</p>

            @if ($listTin->isEmpty())
                <p class="text-muted mb-0">Thùng rác đang trống.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-sm align-middle">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Loại tin</th>
                            <th>Đã xóa lúc</th>
                            <th class="text-end">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($listTin as $tin)
                            <tr>
                                <td>{{ $tin->id }}</td>
                                <td class="fw-semibold">{{ $tin->tieuDe }}</td>
                                <td>{{ $tin->loaitin->tenLoai ?? 'N/A' }}</td>
                                <td>{{ optional($tin->deleted_at)->format('d/m/Y H:i') }}</td>
                                <td class="text-end">
                                    <form class="d-inline" action="{{ route('tin.restore', $tin->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-outline-success" type="submit">Khôi phục</button>
                                    </form>
                                    <form class="d-inline" action="{{ route('tin.forceDestroy', $tin->id) }}" method="POST" onsubmit="return confirm('Xóa vĩnh viễn tin này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Xóa vĩnh viễn</button>
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

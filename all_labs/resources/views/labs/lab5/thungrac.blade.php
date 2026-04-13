@extends('labs.lab5.layout')

@section('title', 'Lab 5 - Thùng rác')
@section('lab5_title', 'Lab 5 - Thùng rác')

@section('lab5_content')
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead><tr><th>ID</th><th>Tiêu đề</th><th>Ngày xóa</th><th class="text-end">Thao tác</th></tr></thead>
                <tbody>
                @forelse ($listTin as $tin)
                    <tr>
                        <td>{{ $tin->id }}</td>
                        <td>{{ $tin->tieuDe }}</td>
                        <td>{{ optional($tin->deleted_at)->format('d/m/Y H:i') }}</td>
                        <td class="text-end">
                            <form class="d-inline" method="POST" action="{{ route('lab5.tin.restore', $tin->id) }}">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm btn-outline-success">Khôi phục</button>
                            </form>
                            <form class="d-inline" method="POST" action="{{ route('lab5.tin.forceDestroy', $tin->id) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Xóa vĩnh viễn</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-muted">Thùng rác trống.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lab 5 - Eloquent ORM')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle at 10% 20%, #e0f2fe 0, transparent 35%),
                       radial-gradient(circle at 90% 10%, #ffe4cc 0, transparent 30%),
                       #f8fafc;
            min-height: 100vh;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-0">@yield('title', 'Lab 5 - Eloquent ORM')</h1>
            <p class="text-muted mb-0">Quản lý bảng tin bằng Eloquent.</p>
        </div>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('tin.index') }}">Danh sách</a>
            <a class="btn btn-outline-dark" href="{{ route('tin.trash') }}">Thùng rác</a>
            <a class="btn btn-primary" href="{{ route('tin.create') }}">+ Thêm tin</a>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @yield('content')
</div>
</body>
</html>

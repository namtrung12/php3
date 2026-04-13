<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PHP3 All Labs')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">PHP3 All Labs</a>
        <div class="navbar-nav flex-row flex-wrap gap-2">
            @foreach (range(1, 8) as $lab)
                <a class="nav-link py-1" href="{{ url('/lab'.$lab) }}">Lab {{ $lab }}</a>
            @endforeach
        </div>
    </div>
</nav>

<main class="container py-4">
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @yield('content')
</main>
</body>
</html>

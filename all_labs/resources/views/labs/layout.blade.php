<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PHP3 All Labs')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --app-bg: #f6f7f2;
            --app-text: #202522;
            --app-muted: #647067;
            --app-line: #dfe5dc;
            --app-panel: #ffffff;
            --app-green: #1f6f5b;
            --app-red: #b4233a;
            --app-yellow: #f2b84b;
        }

        body {
            background: var(--app-bg);
            color: var(--app-text);
            font-family: Arial, Helvetica, sans-serif;
        }

        .app-header {
            background: var(--app-panel);
            border-bottom: 1px solid var(--app-line);
        }

        .brand-mark {
            align-items: center;
            color: var(--app-text);
            display: inline-flex;
            font-weight: 700;
            gap: .65rem;
            text-decoration: none;
        }

        .brand-mark span {
            align-items: center;
            background: var(--app-green);
            border-radius: 8px;
            color: #fff;
            display: inline-flex;
            height: 34px;
            justify-content: center;
            width: 34px;
        }

        .lab-strip {
            background: #fff;
            border-bottom: 1px solid var(--app-line);
            overflow-x: auto;
        }

        .lab-strip a,
        .side-lab a {
            border-radius: 8px;
            color: var(--app-text);
            font-weight: 600;
            text-decoration: none;
        }

        .lab-strip a {
            display: inline-flex;
            padding: .55rem .85rem;
            white-space: nowrap;
        }

        .lab-strip a.active,
        .side-lab a.active {
            background: var(--app-green);
            color: #fff;
        }

        .app-shell {
            display: grid;
            gap: 1.25rem;
            grid-template-columns: 230px minmax(0, 1fr);
        }

        .side-lab {
            position: sticky;
            top: 5.5rem;
        }

        .side-lab .panel {
            background: var(--app-panel);
            border: 1px solid var(--app-line);
            border-radius: 8px;
            padding: .85rem;
        }

        .side-lab a {
            display: block;
            padding: .55rem .7rem;
        }

        .side-lab a + a {
            margin-top: .25rem;
        }

        .content-area {
            min-width: 0;
        }

        .page-kicker {
            color: var(--app-muted);
            font-size: .9rem;
            font-weight: 700;
            letter-spacing: 0;
            margin-bottom: .65rem;
        }

        .btn-primary {
            --bs-btn-bg: var(--app-green);
            --bs-btn-border-color: var(--app-green);
            --bs-btn-hover-bg: #185846;
            --bs-btn-hover-border-color: #185846;
        }

        .btn-outline-primary {
            --bs-btn-color: var(--app-green);
            --bs-btn-border-color: var(--app-green);
            --bs-btn-hover-bg: var(--app-green);
            --bs-btn-hover-border-color: var(--app-green);
        }

        .card,
        .alert,
        .btn,
        .form-control,
        .form-select,
        .list-group-item {
            border-radius: 8px;
        }

        @media (max-width: 991.98px) {
            .app-shell {
                grid-template-columns: 1fr;
            }

            .side-lab {
                position: static;
            }

            .side-lab .panel {
                display: none;
            }
        }
    </style>
    @stack('styles')
</head>
@php
    $labs = [
        1 => ['title' => 'Laravel cơ bản', 'url' => url('/lab1')],
        2 => ['title' => 'Query Builder', 'url' => url('/lab2')],
        3 => ['title' => 'Blade Template', 'url' => url('/lab3')],
        4 => ['title' => 'Migration & Seeder', 'url' => url('/lab4')],
        5 => ['title' => 'Eloquent ORM', 'url' => url('/lab5')],
        6 => ['title' => 'Auth & Middleware', 'url' => url('/lab6')],
        7 => ['title' => 'Validation & Mail', 'url' => url('/lab7')],
        8 => ['title' => 'RESTful API', 'url' => url('/lab8')],
    ];

    $activeLab = trim($__env->yieldContent('active_lab', request()->segment(1)));

    if (! preg_match('/^lab[1-8]$/', $activeLab)) {
        $activeLab = null;
    }

    if (! $activeLab && request()->routeIs('login', 'register', 'password.*', 'verification.*')) {
        $activeLab = 'lab6';
    }
@endphp
<body>
<header class="app-header sticky-top">
    <div class="container py-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <a class="brand-mark" href="{{ route('home') }}">
                <span>PHP</span>
                <strong>PHP3 All Labs</strong>
            </a>
            <div class="d-flex flex-wrap align-items-center gap-2 small">
                @auth
                    <span class="text-secondary">{{ auth()->user()->name }}</span>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('profile.edit') }}">Tài khoản</a>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button class="btn btn-sm btn-outline-secondary" type="submit">Đăng xuất</button>
                    </form>
                @else
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('login') }}">Đăng nhập</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('register') }}">Đăng ký</a>
                @endauth
            </div>
        </div>
    </div>
</header>

<nav class="lab-strip">
    <div class="container d-flex gap-2 py-2">
        <a class="{{ $activeLab ? '' : 'active' }}" href="{{ route('home') }}">Tổng quan</a>
        @foreach ($labs as $number => $lab)
            <a class="{{ $activeLab === 'lab'.$number ? 'active' : '' }}" href="{{ $lab['url'] }}">Lab {{ $number }}</a>
        @endforeach
    </div>
</nav>

<main class="container app-shell py-4">
    <aside class="side-lab">
        <div class="panel">
            <div class="page-kicker">Danh sách bài lab</div>
            <a class="{{ $activeLab ? '' : 'active' }}" href="{{ route('home') }}">Tổng quan</a>
            @foreach ($labs as $number => $lab)
                <a class="{{ $activeLab === 'lab'.$number ? 'active' : '' }}" href="{{ $lab['url'] }}">
                    Lab {{ $number }} - {{ $lab['title'] }}
                </a>
            @endforeach
        </div>
    </aside>

    <section class="content-area">
        @if (session('status') && session('status') !== 'profile-updated' && session('status') !== 'password-updated')
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </section>
</main>
@stack('scripts')
</body>
</html>

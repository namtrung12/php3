<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >
    <title>@yield('title', 'ASM2')</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container justify-content-end">
            <div class="d-flex flex-wrap align-items-center gap-2">
                @auth
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Quản lý danh mục</a>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Quản lý sản phẩm</a>
                    @if ((int) auth()->user()->idgroup === 1)
                        <a href="{{ route('users.index') }}" class="btn btn-primary">Quản lý user</a>
                    @endif
                    <span class="text-muted small ms-2">
                        {{ auth()->user()->name }}
                        ({{ (int) auth()->user()->idgroup === 1 ? 'Admin' : 'User' }})
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Đăng xuất</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Đăng ký</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @yield('content')
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>
</body>
</html>

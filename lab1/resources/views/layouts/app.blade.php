<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Lab 1')</title>
    <style>
        :root {
            --bg: #f7f8fb;
            --card: #ffffff;
            --text: #0f172a;
            --muted: #475569;
            --primary: #2563eb;
            --border: #e2e8f0;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text);
        }
        header {
            background: var(--card);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .nav {
            max-width: 1080px;
            margin: 0 auto;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .nav a {
            text-decoration: none;
            color: var(--muted);
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 8px;
        }
        .nav a:hover {
            background: #e7efff;
            color: var(--primary);
        }
        .brand {
            font-weight: 800;
            color: var(--primary);
            margin-right: 10px;
        }
        .container {
            max-width: 1080px;
            margin: 32px auto 48px;
            padding: 0 20px;
        }
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06);
        }
        h1, h2, h3 { margin-top: 0; }
        .muted { color: var(--muted); }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: var(--primary);
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }
        .btn:hover { opacity: .9; }
        ul.clean { list-style: none; padding: 0; margin: 0; }
        ul.clean li { padding: 10px 0; border-bottom: 1px solid var(--border); }
    </style>
</head>
<body>
<header>
    <nav class="nav">
        <span class="brand">Lab1</span>
        <a href="{{ url('/') }}">Trang chủ</a>
        <a href="{{ url('/tin-tuc') }}">Tin tức</a>
        <a href="{{ url('/lien-he') }}">Liên hệ</a>
        <a href="{{ url('/thongtinsv') }}">Thông tin SV</a>
    </nav>
</header>
<main class="container">
    @yield('content')
    @hasSection('aside')
        <div style="margin-top:24px">
            @yield('aside')
        </div>
    @endif
</main>
</body>
</html>

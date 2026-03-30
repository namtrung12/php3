@extends('layouts.app')

@section('title', 'Tin tức')

@section('content')
    <div class="card">
        <h1>Tin tức</h1>
        <p class="muted">Danh sách bài viết mẫu (dữ liệu tĩnh dùng để luyện tập routing + view).</p>
        <ul class="clean">
            @foreach($posts as $post)
                <li>
                    <a href="{{ url('/ct/' . $post['id']) }}" style="color: #0f172a; font-weight: 700; text-decoration: none;">
                        {{ $post['title'] }}
                    </a>
                    <div class="muted" style="margin-top:4px;">{{ $post['excerpt'] }}</div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

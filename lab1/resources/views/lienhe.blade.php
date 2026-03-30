@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')
    <div class="card">
        <h1>Liên hệ</h1>
        <p class="muted">Bạn có thể để lại lời nhắn, chúng tôi sẽ phản hồi sớm nhất.</p>
        <form style="margin-top:16px; display:grid; gap:12px;">
            <div>
                <label for="name">Họ tên</label><br>
                <input id="name" type="text" placeholder="Nguyễn Văn A" style="width:100%;padding:10px;border:1px solid #e2e8f0;border-radius:10px;">
            </div>
            <div>
                <label for="email">Email</label><br>
                <input id="email" type="email" placeholder="email@example.com" style="width:100%;padding:10px;border:1px solid #e2e8f0;border-radius:10px;">
            </div>
            <div>
                <label for="msg">Nội dung</label><br>
                <textarea id="msg" rows="4" placeholder="Bạn cần hỗ trợ gì?" style="width:100%;padding:10px;border:1px solid #e2e8f0;border-radius:10px;"></textarea>
            </div>
            <button class="btn" type="button">Gửi</button>
        </form>
    </div>
@endsection

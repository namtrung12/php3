@extends('labs.layout')

@section('title', 'Lab 7 - Validation & Send Mail')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1>Lab 7 - Validation & Send Mail</h1>
            <p class="text-muted">Validate bằng Request, FormRequest và route gửi mail Mailgun.</p>
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary" href="{{ route('lab7.hs') }}">Form học sinh</a>
                <a class="btn btn-primary" href="{{ route('lab7.sv') }}">Form sinh viên</a>
                <a class="btn btn-outline-primary" href="{{ route('lab7.guimail') }}">Gửi mail</a>
            </div>
        </div>
    </div>
@endsection

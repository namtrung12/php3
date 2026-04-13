@extends('labs.layout')

@section('title', 'Lab 2 - '.$title)

@section('content')
    @include('labs.shared.news-list', [
        'labTitle' => 'Lab 2 - Query Builder',
        'title' => $title,
        'tin' => $tin,
        'detailRoute' => $detailRoute,
    ])
@endsection

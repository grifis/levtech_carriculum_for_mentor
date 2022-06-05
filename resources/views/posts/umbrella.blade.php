@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/umbrella.css">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>傘詳細ページ</h1>
        <h2 class="title">
            場所：{{$kasa->name}}
        </h2>
        <p class="umbrella_count">残数：{{ $kasa->count }}</p>
        <p>QRコードを読み取ってください</p>
        <a href="/">地図に戻る</a>
    </body>
</html>

@endsection
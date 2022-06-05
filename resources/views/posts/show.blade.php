<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        
        @if($weather['weather']['0']['id'] ===500 or $weather['weather']['0']['id'] ===531)
            <a href="https://open.spotify.com/playlist/6IX5cuygyqVO6nZnCVUVmQ">今日の雨におすすめのプレイリスト</a>
        @elseif($weather['weather']['0']['id'] >=501 or $weather['weather']['0']['id'] <522)
            <a href="https://open.spotify.com/playlist/41VeP3G3G8W35pVrrcSxUf">今日の雨におすすめのプレイリスト</a>
        @else
            <p>残念、今日は雨が降ってない…</p>
        @endif
        
        <!--<?php-->
        <!--dd($weather)?>-->
       
    </body>
</html>
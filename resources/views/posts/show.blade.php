<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{ asset("css/index.css") }}' type='text/css'>
    </head>
    <body>
        
        @if($weather['weather']['0']['id'] ===500 or $weather['weather']['0']['id'] ===501)
            <a href="https://open.spotify.com/playlist/6IX5cuygyqVO6nZnCVUVmQ">今の雨におすすめのプレイリスト</a>
        @elseif($weather['weather']['0']['id'] >=502 and $weather['weather']['0']['id'] <522)
            <a href="https://open.spotify.com/playlist/41VeP3G3G8W35pVrrcSxUf">今の雨におすすめのプレイリスト</a>
        @else
            <p>残念、今は雨が降ってない…</p>
        @endif
        
        <!--weatherに入っている天気情報を表示-->
        <!--<?php-->
        <!--dd($weather)?>-->
       
    </body>
</html>
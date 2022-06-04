<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アプリ名</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Rainyの投稿一覧</h1>
        <h2>
            <a href='/weathers/sunny/2'>Sunny</a>
        </h2>
        <h2>
            <a href='/weathers/rainy/1/posts/create'>Create</a>
        </h2>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h3 class='title'>{{ $post->title }}</h2>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>
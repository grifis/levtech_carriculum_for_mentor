<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Themes</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1>投稿詳細ページ</h1>
        <h2 class="title">
            タイトル：{{ $theme->title }}
        </h2>
        
        <form action="/themes" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="answers[body]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>

        <div class="footer">
            <p class="edit">[<a href="/themes/{{ $theme->id }}/edit">編集</a>]</p>
            <a href="/">一覧ページへ戻る</a>
            <p class='make'>[<a href='/themes/make'>make</a>]</p>
        </div>
        
        <div class='posts'>
            <div class='post'>
                <h2 class='title'>Title</h2>
                <p class='body'>This is a sample body.</p>
            </div>
        </div>
    </body>
</html>
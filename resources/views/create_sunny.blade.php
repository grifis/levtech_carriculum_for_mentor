<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アプリ名</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Post your episode in the sunny day.</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="Episode title" value="{{ old('post.title') }}"/>
                <!--<p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>-->
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="Your episode in the sunny day.">{{ old('post.body') }}</textarea>
                <!--<p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>-->
            </div>
            <input type="hidden" name="post[weather_id]" value="{{ $weather->id }}"/>
            <input type="hidden" name="post[category_id]" value="1"/>
            <input type="submit" value="Save"/>
        </form>
        <div class="back">[<a href="/weathers/sunny/2">Back</a>]</div>
    </body>
</html>
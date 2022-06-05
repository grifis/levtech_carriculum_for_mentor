<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>大喜利</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>大喜利</h1>
        <h2>お題一覧</h2>
        <div>
            [<a href='/themes/create'>新規作成</a>]
        </div>
        <div class='themes'>
            @foreach($themes as $theme)
                <div class='theme'>
                    <h2 class='title'>
                        <a href="/themes/{{ $theme->id }}">{{ $theme->title }}</a>
                    </h>
                    <form action="/themes/{{ $theme->id }}" id="form_{{ $theme->id }}"  method="theme" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onClick="deleteTheme({{$theme->id}});">削除</button> {{--script内に定義したdeleteThemeを使用している--}}
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $themes->links() }}
        </div>
        <div>
            <a href="/rainy">今日は雨？</a>
        </div>
        
    </body>
    <script>
        
        function deleteTheme(theme_id) {
            form = document.getElementById('form_' + theme_id);  //各投稿ごとのdeleteのformを取得
            is_submit = confirm('本当に削除してもよろしいですか？'); //はいの場合true,いいえの場合falseをis_submitに格納
            
            if(is_submit) {  //is_submitがtrueの場合のみ、{}の中の処理が行われる
                form.submit();  //deleteするformをsubmitする（投稿を削除している）
            }
        }
    </script>
</html>
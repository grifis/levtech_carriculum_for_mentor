<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ogiri</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="wf-hannari"><h1 class="title0">おおぎり</h1></div>
        <div class="hare">
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
        </div>
        <div class='paginate'>
            {{ $themes->links() }}
        </div>
        <div>
            <p href="/themes/"
        </div>
        
    </body>
    <script>
        const weather =@json($weather);
        let  today_tokyo_weather =weather[0].timeSeries[0].areas[0].weathers[0];
        console.log(today_tokyo_weather);
        
        function deleteTheme(theme_id) {
            form = document.getElementById('form_' + theme_id);  //各投稿ごとのdeleteのformを取得
            is_submit = confirm('本当に削除してもよろしいですか？'); //はいの場合true,いいえの場合falseをis_submitに格納
            
            if(is_submit) {  //is_submitがtrueの場合のみ、{}の中の処理が行われる
                form.submit();  //deleteするformをsubmitする（投稿を削除している）
            }
        }
    </script>
</html>
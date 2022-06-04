<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>レバテックチーム開発</h1>
        
        <div id="map" style="height:500px; width:500px">
	    </div>
	    
	    {!! Form::open(['route' => 'result.currentLocation','method' => 'get']) !!}
    　　 {{--隠しフォームでresult.currentLocationに位置情報を渡す--}}
    　　 {{--lat用--}}
    　　 {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
    　　 {{--lng用--}}
    　　 {!! Form::hidden('lng','lng',['class'=>'lng_input']) !!}
    　　 {{--setlocation.jsを読み込んで、位置情報取得するまで押せないようにdisabledを付与し、非アクティブにする。--}}
    　　 {{--その後、disableはfalseになるようにsetlocation.js内に記述した--}}
    　　 {!! Form::submit("周辺を表示", ['class' => "btn btn-success btn-block",'disabled']) !!}
    　　 {!! Form::close() !!}
    　
	    
        <h2>投稿一覧ページ</h2>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>本文：{{ $post->body}}</p>
                    <p>カテゴリー:<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}"  method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onClick="deletePost({{$post->id}});">削除</button> {{--script内に定義したdeletePostを使用している--}}
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div>
            [<a href='/posts/create'>新規作成</a>]
        </div>
    </body>
    <script>
        function deletePost(post_id) {
            form = document.getElementById('form_' + post_id);  //各投稿ごとのdeleteのformを取得
            is_submit = confirm('本当に削除してもよろしいですか？'); //はいの場合true,いいえの場合falseをis_submitに格納
            
            if(is_submit) {  //is_submitがtrueの場合のみ、{}の中の処理が行われる
                form.submit();  //deleteするformをsubmitする（投稿を削除している）
            }
        }
    </script>
    
    <script>
            // currentLocation.jsで使用する定数latに、controllerで定義した$latをいれて、currentLocation.jsに渡す
            const lat = {{ $lat }};

            // currentLocation.jsで使用する定数lngに、controllerで定義した$lngをいれて、currentLocation.jsに渡す
            const lng = {{ $lng }};
        </script>
    　 
    　　 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    　　 
	    <script src="{{ asset('/js/setLocation.js') }}"></script>
        <script src="{{ asset('/js/currentLocation.js') }}"></script>
	    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('services.googlemap.apikey')}}&callback=initMap" async defer>
	   </script>
</html>
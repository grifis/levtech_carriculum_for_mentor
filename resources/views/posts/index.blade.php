<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel='stylesheet' href='{{ asset("css/index.css") }}' type='text/css'>
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
    　　 {!! Form::submit("現在地", ['class' => "btn btn-success btn-block",'disabled']) !!}
    　　 {!! Form::close() !!}
    　　 
    　　 　 <button type=“button” onclick="location.href='/posts/london'">ロンドン</button>
    　　 <button type=“button” onclick="location.href='/posts/namibu'">ナミブ砂漠</button>
    　　 <button type=“button” onclick="location.href='/posts/makko'">鹿児島県</button>
    　
	
    　　 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    　　 
	    <script src="{{ asset('/js/setLocation.js') }}"></script>
        <script src="{{ asset('/js/result.js') }}"></script>
	    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{config('services.googlemap.apikey')}}&callback=initMap" async defer>
	   </script>
</html>
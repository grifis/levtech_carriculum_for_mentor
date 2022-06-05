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
	    
	    {!! Form::open(['route' => 'show.show','method' => 'get']) !!}
    　　 {{--隠しフォームでresult.currentLocationに位置情報を渡す--}}
    　　 {{--lat用--}}
    　　 {!! Form::hidden('lat','lat',['class'=>'lat_input']) !!}
    　　 {{--lng用--}}
    　　 {!! Form::hidden('lng','lng',['class'=>'lng_input']) !!}
    　　 {{--setlocation.jsを読み込んで、位置情報取得するまで押せないようにdisabledを付与し、非アクティブにする。--}}
    　　 {{--その後、disableはfalseになるようにsetlocation.js内に記述した--}}
    　　 {!! Form::submit("プレイリストへ", ['class' => "btn btn-success btn-block",'disabled']) !!}
    　　 {!! Form::close() !!}
    　　 

    　　 
    　　 <p>現在地の　緯度：{{$lat}}　経度：{{$lng}}</p>
    　　 
    　
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
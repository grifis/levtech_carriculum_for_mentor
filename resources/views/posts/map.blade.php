
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="serch">
            <input type="text" placeholder="地点"/>
        </div>
        <div class="map">
            <image src="https://shop6-makeshop.akamaized.net/shopimages/mapplepod/000000000002_s6rE7oO.jpg">
        </div>
        
    </body>
</html>

@endsection
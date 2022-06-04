<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ResultController extends Controller
{
    public function currentLocation(Request $request, Post $post)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        // currentLocationで表示
        return view('posts/currentLocation', [
            // 現在地緯度latをbladeへ渡す
            'lat' => $lat,
            // 現在地経度lngをbladeへ渡す
            'lng' => $lng,
            'posts' => $post->getPaginateByLimit()
        ]);
    }
}

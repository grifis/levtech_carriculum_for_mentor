<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Post;

class OpenWeatherController extends Controller
{
        public function weatherData(Post $post) {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        $city = 'Tokyo';

        //$url = "$base_url?units=metric&q=$city&APPID=$API_KEY";
        $url = "$base_url?lat=31.5965&lon=130.5571&APPID=$API_KEY";

        
         // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);
        
        //$weathers = array();
        
        //$weathers[$i] = array(
        //'temp' => $list['main']['temp'],
        //'humidity' => $list['main']['humidity'],
        //'weather'=> $list['weather'][0]['main']
        //);
        //dd($weather_data['rain']['1h']);
        
        return view('posts/show', [
                'weather' => $weather_data, 
                'posts' => $post->getPaginateByLimit()]
        );
        
        
    }
}

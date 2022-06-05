<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Post;

class OpenWeatherController extends Controller
{
        public function weatherData(Request $request, Post $post) {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        $city = 'Tokyo';
        $lat = $request->lat;
        $lng = $request->lng;
        
        // dd($lat);

        //$url = "$base_url?units=metric&q=$city&APPID=$API_KEY";
        $url = "$base_url?lat=$lat&lon=$lng&APPID=$API_KEY";

        
         // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);
        
         return view('posts/show', [
                'weather' => $weather_data, 
                'posts' => $post->getPaginateByLimit(),]
        );
        }
        
        
        public function londonData(Request $request, Post $post) {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');

        $url = "$base_url?lat=51.509&lon=-0.126&APPID=$API_KEY";

        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);
        
        return view('posts/show', [
                'weather' => $weather_data, 
                'posts' => $post->getPaginateByLimit(),]
        );
        }
        
        public function namibuData(Request $request, Post $post) {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');

        $url = "$base_url?lat=24.457&lon=15.1635&APPID=$API_KEY";

        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);
        
        return view('posts/show', [
                'weather' => $weather_data, 
                'posts' => $post->getPaginateByLimit(),]
        );
        
    }
    
     public function makkoData(Request $request, Post $post) {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');

        $url = "$base_url?lat=31.3146&lon=131.217&APPID=$API_KEY";

        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);
        
        return view('posts/show', [
                'weather' => $weather_data, 
                'posts' => $post->getPaginateByLimit(),]
        );
        
    }
}

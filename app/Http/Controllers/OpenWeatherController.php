<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OpenWeatherController extends Controller
{
        public function weatherData() {
        $API_KEY = config('services.openweathermap.key');
        $base_url = config('services.openweathermap.url');
        $city = 'Tokyo';

        $url = "$base_url?units=metric&q=$city&APPID=$API_KEY";

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);
        $lists = $data['list'];

        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);
        dd($weather_data);
        
        //$weathers = array();
        
        //$weathers[$i] = array(
        //'temp' => $list['main']['temp'],
        //'humidity' => $list['main']['humidity'],
        //'weather'=> $list['weather'][0]['main']
        //);
        
        return $weathers;
    }
}

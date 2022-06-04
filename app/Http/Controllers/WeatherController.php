<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;

class WeatherController extends Controller
{
    public function index_rainy(Weather $weather)
    {
        $posts=$weather->posts()->get();
        return view('rainy')->with(['weather' => $weather, 'posts' => $posts]);
    }
}

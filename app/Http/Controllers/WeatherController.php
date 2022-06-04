<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;

class WeatherController extends Controller
{
    public function index(Weather $weather)
    {
        return view('Weathers.index')->with(['posts' => $weather->getByWeather()]);
    }
}

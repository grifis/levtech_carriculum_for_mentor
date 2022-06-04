<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'OpenWeatherController@weatherData');
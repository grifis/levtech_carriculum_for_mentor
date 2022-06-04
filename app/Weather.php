<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function getByWeather(int $limit_count = 5)
{
     return $this->posts()->with('weather')->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
}

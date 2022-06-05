<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
    protected $fillable =
    [
        'post_id'
    ];
    
    public function getPaginateByLimitLike(int $limit_count = 5)
    {
        return $this->orderBy('like','DESC')->paginate($limit_count);
    }
}

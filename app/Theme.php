<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    
    protected $fillable = [
        'title',
        'image',
        ];
    
    function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
}

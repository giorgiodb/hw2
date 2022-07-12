<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = null;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user', 'id');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like');
    }
}

?>
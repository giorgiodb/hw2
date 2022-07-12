<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    public $timestamps = null;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'username', 'username');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}

?>
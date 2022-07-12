<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Play extends Model
{
    public $timestamps = null;
    
    protected $table = 'play';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user', 'username');
    }
}

?>
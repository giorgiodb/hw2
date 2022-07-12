<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pref extends Model
{
    public $timestamps = null;
    
    protected $table = 'pref';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user', 'username');
    }
}

?>
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user_s';

    public $timestamps = null;

    public function post()
    {
        return $this->hasMany('App\Models\Post', 'user', 'id');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like', 'username', 'username');
    }

    public function pref()
    {
        return $this->hasMany('App\Models\Pref', 'user', 'username' );
    }

    public function play()
    {
        return $this->hasMany('App\Models\Play', 'user', 'username');
    }
}

?>


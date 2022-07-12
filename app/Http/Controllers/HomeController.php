<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;

class HomeController extends Controller {

    public function enter() {
        $session_id = session('user_id');
        $user = User::where('id', $session_id)->first();
        if (!isset($user)){
            return view('login');
        }else{
            return view("home")->with("user", $user);
        }
    }
}

?>
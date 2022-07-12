<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SignupController extends Controller
{
    protected function createUser(){
        $request = request();
        if($this->countError($request) == 0){
            $user = new User;
            $user->foto = $request['foto'];
            $user->name = $request['name'];
            $user->surname = $request['surname'];
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->password = $request['password'];
            $user->save();
            
            if($user){
                Session::put('user_id', $user->id);
                return redirect('home');
            }else {
                return redirect('signup')->withInput();
            }
        }else {
            return redirect('signup')->withInput();
        }
    }

    private function countError($value) {
        $error = [];
        # USERNAME
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $value['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $value['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        # EMAIL
        if (!filter_var($value['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $value['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }
        # PASSWORD
        if (strlen($value["password"]) < 4) {
            $error[] = "Pochi caratteri presenti";
        } else if (strlen($value["password"]) > 10) {
            $error[] = "Troppi caratteri presenti";
        } else if(preg_match('/^([a-zA-Z0-9_]+[^.,;:@&?^$£"])$/', $value['password'])) {
            $error[] = "Caratteri non validi";
        }

        # CONFERMA PASSWORD
        if (strcmp($value["password"], $value["confirm_password"]) != 0) {
            $error[] = "Le due password non coincidono";
        }

        return count($error);
    }

    public function checkUsername($q) {
        $exist = User::where('username', $q)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($q) {
        $exist = User::where('email', $q)->exists();
        return ['exists' => $exist];
    }

    public function signupPage() {
        return view('signup');
    }
}
?>
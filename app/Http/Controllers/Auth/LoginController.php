<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function login(){
        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('inicio');
        }else{
            return  back();
        }
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }
}

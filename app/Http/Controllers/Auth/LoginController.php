<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string|min:8',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect(route('backend.admin.index'));
        }
    }

    public function showLogin(){
        return view('auth.login');
    }

}
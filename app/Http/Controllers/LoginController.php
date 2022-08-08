<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function log(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Type your email!',
            'password.required' => 'Type your password!'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

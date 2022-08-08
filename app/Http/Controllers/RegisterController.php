<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){

        return view('auth.register');

    }

    public function reg(Request $request){
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'surname' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ],[
            'name.required' => 'Type your name!',
            'surname.required' => 'Type your surname!',
            'email.required' => 'Type your email!',
            'password.required' => 'Type your password!',
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return redirect('/login')->with('success','Please redirect to login page for auth!');
    }


    
}

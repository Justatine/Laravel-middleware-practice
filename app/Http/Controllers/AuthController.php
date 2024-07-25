<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function show(){
        return view('index');
    }

    public function login(){
        validator(request()->all(), [
            'email' => ['required','email'],
            'password' => ['required'],
        ])->validate();

        if (auth()->attempt(request()->only(['email', 'password']))) {
            return redirect('/dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function logout(){
        auth()->logout();

        return redirect('/');
    }
}

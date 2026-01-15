<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    // public function showlogin() {
    //     return redirect('/');
    // }
    public function showLogin()
{
    // If user is already logged in, redirect to dashboard
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    
    return view('login');
}

public function showRegister() {
    return view('register');
}
}


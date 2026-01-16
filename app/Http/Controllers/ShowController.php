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
    // Check if user is already logged in
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    
    return view('login');
}

public function showRegister() {
    return view('register');
}

public function dashboardAcc() {
     $user = auth()->user();

    return view('dashboard', [
        'user' => $user
    ]);
}
}


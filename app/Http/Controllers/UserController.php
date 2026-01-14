<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // para sa registration
    public function register(Request $request) {
       $registerfill = $request->validate([
        'username' => ['required', 'min:4', 'max:8'],
        'email' => ['required', 'email', 'unique:users'],
        'bday' => ['required', 'date'],
        'password' => ['required', 'min:4', 'max:8']
        // 'username' => 'required',
        // 'email' => 'required',
        // 'bday' => 'required',
        // 'password' => 'required',
       ]);

       $registerfill['password'] = bcrypt($registerfill['password']);
       User::create($registerfill);

       return 'yow';
    }
}

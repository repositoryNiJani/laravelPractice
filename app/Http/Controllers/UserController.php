<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserPreference;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // para sa registration
    public function register(Request $request) {
       $registerfill = $request->validate([
        'username' => ['required', 'min:4', 'max:8', Rule::unique('users','username')],
        'email' => ['required', 'email', Rule::unique('users','email')],
        'bday' => ['required', 'date'],
        'password' => ['required', 'min:4', 'max:8']
        // 'username' => 'required',
        // 'email' => 'required',
        // 'bday' => 'required',
        // 'password' => 'required',
        
       ]);

       $registerfill['password'] = bcrypt($registerfill['password']);
 
    //    $user = User::create($registerfill);
    //    auth()->login($user);
    //    return redirect('/login');
    //    return view('login');
    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    // public function logout() {
    //   //   auth()->logout();
    //     return redirect('/login');
    // }

//     public function logout(Request $request)
// {
//     Auth::logout();
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();
    
//     // Redirect to login page (GET request)
//     return redirect()->route('login.submit'); // Make sure 'login' route uses GET
// }

public function logout(Request $request)
{
    Auth::logout();              // 1. Log out the user
    $request->session()->invalidate();  // 2. Invalidate the session
    $request->session()->regenerateToken(); // 3. Regenerate CSRF token
    
    return redirect()->route('login'); // 4. Redirect to login
}

   //  public function login(Request $request) {
   //       $registerfill = $request->validate([
   //          'loginusername' => 'required',
   //          'loginpassword' => 'required'
   //       ]);

   //       if (auth()->attempt(
   //          ['username' => $registerfill['loginusername'],
   //          'password' => $registerfill['loginpassword']]
   //       )) 
   //          $request->session()->regenerate();
   //       {

   //       }
   //      return redirect('/');
   //  }

   // In your AuthController.php
public function loginform(Request $request)
{
    $credentials = $request->validate([
        'loginusername' => 'required', // Note: using loginusername from your form
        'loginpassword' => 'required'
    ]);

    // Attempt login with username (not email)
    if (Auth::attempt([
        'username' => $request->loginusername, // or 'email' if you're using email
        'password' => $request->loginpassword
    ])) {
        $request->session()->regenerate();
        return redirect('/dashboard'); // Redirect to dashboard
    }

    return back()->withErrors([
        'loginusername' => 'Invalid credentials.',
    ]);
}


public function saveColor(Request $request) {
    $color = $request->validate([
        'color' => 'required|in:red,yellow,blue,green',
    ]);
     $userId = Auth::user()->username; // Make sure user is logged 


     UserPreference::updateOrCreate(
            ['username' => $userId], // Find by user_id
            ['color' => $color['color']] // Update or create with this data
        );
         return back()->with('success', 'Color preference saved!');
}

}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//    $account = Post::where('username', auth()->id())->get();
//     return view('dashaboard', ['username'=> $account,
//     // 'bday' => $bday,
//     // 'email' => $email,
//     ]);
// });

// Route::post('/register', function(){
//     return 'wow';
// }); 

// php artisan make:controller UserController 
// Route::post('/register', [UserController::class, 'register']); 
// Route::get('/register', [ShowController::class, 'showRegister'])->name('register');


// // Route::post('/logout', [UserController::class, 'logout']);
// Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// // Route::post('/login',[UserController::class, 'login']);
// // Route::get('/showlogin', [AuthController::class, 'showLoginForm'])->name('showlogin');

// Route::get('/login', [ShowController::class, 'showLogin'])->name('login.post');
// Route::post('/login', [UserController::class, 'login']);

// Route::get('/dashboard', function () {return view('dashboard'); // Make sure dashboard.blade.php exists
// })->name('dashboard');

// Login routes - only accessible to guests (not logged in users)
// Route::middleware(['guest'])->group(function () {
//     Route::get('/login', [ShowController::class, 'showLogin'])->name('login');
//     Route::post('/loginform', [UserController::class, 'loginform'])->name('login.post');
//     Route::get('/register', [ShowController::class, 'showRegister'])->name('register');
//     Route::post('/registerform', [UserController::class, 'register'])->name('register.post');
// });

// // Dashboard routes - only accessible to authenticated users
// Route::middleware(['auth'])->group(function () {
//     Route::get('/loginform', [UserController::class, 'loginform'])->name('dashboard');
//     //  Route::post('/loginform', [UserController::class, 'login'])->name('login.post');
//     Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// });

// day 3 wow 

// para sa lahat 
Route::middleware(['guest'])->group(function() {

// get - shwo the form boi
// post - fill up the form  

    // go to register form 
    Route::get('/register', [ShowController::class, 'showRegister'])->name('register');
    //fill up the reg form
    Route::post('/register', [UserController::class, 'register'])->name('register.post');
    
    // go to login form 
    Route::get('/login', [ShowController::class, 'showLogin'])->name('login');
    //fill up the login form
    Route::post('/login', [UserController::class, 'loginform'])->name('login.post');

    // unang makikita ng guest
    Route::get('/', function () {
    return view('login');
    }); 

}); 

// after mag login 
// bawal ang post sa loob ng auth 
Route::middleware(['auth'])->group(function() {

    // para sa dashboard 
    // Route::get('/dashboard', function() {
    //     return view('dashboard');
    // })->name('dashboard');

    // dashboard ng user na may data
    Route::get('/dashboard', function() {
        $user = auth()->user();

        return view('dashboard', [
            'user' => $user
        ]);
    })->name('dashboard'); 

    Route::get('dashboard', [ShowController::class, 'dashboardAcc'])->name('dashboard');

    Route::post('/color', [UserController::class, 'saveColor'])->name('color.save');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // Optional: Redirect root
    Route::get('/', function() {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
    });

});

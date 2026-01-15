<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('register');
});

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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login'])->name('login.post');
});

// Dashboard routes - only accessible to authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
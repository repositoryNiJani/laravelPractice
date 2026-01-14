<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/register', function(){
//     return 'wow';
// }); 

// php artisan make:controller UserController 
Route::post('/register', [UserController::class, 'register']); 

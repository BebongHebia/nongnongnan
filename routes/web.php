<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/create-account', function(){
    return view('register');
});

//Create Account
Route::post('/register', [UserController::class, 'register']);

//Login
Route::post('/login', [UserController::class, 'login']);

//Logout
Route::post('/logout', [Usercontroller::class, 'logout']);

Route::get('/user-dashboard', function(){
    if (Auth::check() && auth()->user()->role = 'User'){
        return view('users.dashboard');
    }else{
        return redirect('/');
    }
});

Route::get('/admin-dashboard', function(){
    if (Auth::check() && auth()->user()->role = 'Admin'){
        return view('admin.dashboard');
    }else{
        return redirect('/');
    }
});

Route::get('/admin-users', function(){
    if (Auth::check() && auth()->user()->role = 'Admin'){
        return view('admin.users');
    }else{
        return redirect('/');
    }
});

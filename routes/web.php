<?php

use App\Models\User;
use App\Models\Transaction;
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

//Fetching
Route::get('/get-staff-kap', function(){
    $staff_kap = User::where('role', 'Staff-Kapitan')->get();
    return response()->json($staff_kap);
});

Route::get('/get-staff-sec', function(){
    $staff_sec = User::where('role', 'Staff-Secretary')->get();
    return response()->json($staff_sec);
});

Route::get('/get-users', function(){
    $users = User::where('role', 'User')->get();
    return response()->json($users);
});

//Function
Route::post('/add-user', [UserController::class, 'add_user']);
Route::post('/edit-user', [Usercontroller::class, 'edit_user']);
Route::post('/delete-user', [UserController::class, 'delete_user']);

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

Route::get('/admin-staff-kapitan', function(){
    if (Auth::check() && auth()->user()->role = 'Admin'){
        return view('admin.staff_kapitan');
    }else{
        return redirect('/');
    }
});

Route::get('/admin-staff-secretary', function(){
    if (Auth::check() && auth()->user()->role = 'Admin'){
        return view('admin.staff_secretary');
    }else{
        return redirect('/');
    }
});

Route::get('/admin-transactions', function(){
    if (Auth::check() && auth()->user()->role = 'Admin'){

        $transactions = Transaction::all();

        return view('admin.transactions', ['transactions' => $transactions]);
    }else{
        return redirect('/');
    }
});


Route::get('/admin-transactions/document-type={doc_type}/transaction-id={trans_id}', function($doc_type, $trans_id){
    if (Auth::check() && auth()->user()->role = 'Admin'){

        $transactions = Transaction::find($trans_id);

        return view('admin.view_transactions', ['transactions' => $transactions]);
    }else{
        return redirect('/');
    }
});

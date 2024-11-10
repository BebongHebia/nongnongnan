<?php

use App\Models\User;
use App\Models\Kagawad;
use App\Models\Transaction;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KagawadController;
use App\Http\Controllers\UserIdPicController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\KagawadIdPicController;

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

Route::get('/fetch-announcement', function(){
    $announcement = Announcement::all();

    return response()->json($announcement);
});


Route::get('/get_kagawad', function(){
    $kagawad = Kagawad::all();
    return response()->json($kagawad);

});

//Function
Route::post('/add-user', [UserController::class, 'add_user']);
Route::post('/edit-user', [Usercontroller::class, 'edit_user']);
Route::post('/delete-user', [UserController::class, 'delete_user']);
Route::post('/receive-transactions', [TransactionController::class, 'receive_transactions']);
Route::post('/decline-transactions', [TransactionController::class, 'decline_transactions']);
Route::post('/print-transactions', [TransactionController::class, 'print_transactions']);
Route::post('/transaction-add-id', [UserIdPicController::class, 'add_id']);
Route::post('/add-announcement', [AnnouncementController::class, 'add_announcement']);
Route::post('/edit-announcement', [AnnouncementController::class, 'edit_announcement']);
Route::post('/delete-announcement', [AnnouncementController::class, 'delete_announcement']);
Route::post('/add-kagawad', [KagawadController::class, 'add_kagawad']);
Route::post('/edit-kagawad', [KagawadController::class, 'edit_kagawad']);
Route::post('/delete-kagawad', [KagawadController::class, 'delete_kagawad']);
Route::post('/update-user-profile', [Usercontroller::class, 'update_user_profile']);
Route::post('/add-kagawad-id', [KagawadIdPicController::class, 'add_id_pic']);
Route::post('/update-kagawad-profile', [KagawadController::class, 'update_kagawad_profile']);



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

Route::get('/admin-kagawad', function(){
    if (Auth::check() && auth()->user()->role = 'Admin'){
        return view('admin.kagawad');
    }else{
        return redirect('/');
    }
});

Route::get('/view-user={user_id}', function($user_id){
    if (Auth::check() && auth()->user()->role = 'Admin'){

        $user_details = User::find($user_id);

        return view('admin.user_profile', ['user_details' => $user_details]);
    }else{
        return redirect('/');
    }
});

Route::get('/view-kagawad={user_id}', function($user_id){
    if (Auth::check() && auth()->user()->role = 'Admin'){

        $kagawad_details = Kagawad::find($user_id);

        return view('admin.kagawad_profile', ['kagawad_details' => $kagawad_details]);
    }else{
        return redirect('/');
    }
});



Route::get('/admin-org-charts', function(){
    if (Auth::check() && auth()->user()->role = 'Admin'){
        return view('admin.organization_chart');
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

Route::get('/admin-announcements', function(){
    if (Auth::check() && auth()->user()->role = 'Admin'){


        return view('admin.announcement');
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

Route::get('/print-transactions-complete/trans-id={trans_id}', function($trans_id){
    $transactions = Transaction::find($trans_id);
    return view('print', ['transactions' => $transactions]);
});

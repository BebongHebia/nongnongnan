<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function register(Request $request){
        if ($request->password == $request->c_password){
            $user = User::create([
                'complete_name' => $request->complete_name,
                'purok' => $request->purok,
                'bday' => $request->bday,
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => $request->password,
                'sex' => $request->sex,
                'role' => 'User',
                'status' => 'Active',
            ]);

            Auth::login($user);


            Alert::success('Success', 'Registration Completed');

            return redirect('/user-dashboard');
        }
        else{
            Alert::warning('Error', 'Password Does not match please try again');
            return redirect()->back();
        }
    }

    public function login(Request $request){
        $inputs = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($inputs)) {
            $request->session()->regenerate();

            $user_id = auth()->user()->id;
            $get_user_info = User::find($user_id);
            $user_role = $get_user_info['role'];

            if($user_role == "Admin"){
                return redirect('/admin-dashboard');
            }elseif ($user_role == "User"){
                return redirect('/user-dashboard');

            }

        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}

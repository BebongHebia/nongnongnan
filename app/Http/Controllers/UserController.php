<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserIdPic;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                'user_password' => $request->password,
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
            }elseif ($user_role == "Staff-Secretary"){
                return redirect('/secretary-dashboard');
            }

        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

    public function add_user(Request $request){

        $get_latest_user_id = User::latest()->first();

        User::create([
            'complete_name' => $request->complete_name,
            'purok' => $request->purok,
            'sex' => $request->sex,
            'bday' => $request->bday,
            'phone' => $request->phone,
            'role' => $request->role,
            'status' => 'Active',
            'username' => date("Ymd") . $get_latest_user_id->id,
            'password' => date("Ymd") . $get_latest_user_id->id,
            'user_password' => date("Ymd") . $get_latest_user_id->id,
        ]);

        return response()->json();
    }

    public function edit_user(Request $request){
        $user = User::find($request->user_id);
        $user->complete_name = $request->complete_name;
        $user->purok = $request->purok;
        $user->sex = $request->sex;
        $user->bday = $request->bday;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->save();
        return response()->json();

    }

    public function delete_user(Request $request){

        $get_user_transaction_code = Transaction::where('user_id', $request->user_id)->count();

        if ($get_user_transaction_code > 0){
            $get_user_transaction_code_list = Transaction::where('user_id', $request->user_id)->get();

            foreach($get_user_transaction_code_list as $items_get_user_transaction_code_list){
                $get_transaction = Transaction::find($items_get_user_transaction_code_list->id);
                $get_transaction->delete();
            }
        }

        $get_user_pics = UserIdPic::where('user_id', $request->user_id)->get();
        foreach($get_user_pics as $items_get_user_pics){
            $pics = UserIdPic::find($items_get_user_pics->id);
            $pics->delete();
        }

        $user = User::find($request->user_id);
        $user->delete();
        return response()->json();
    }

    public function update_user_profile(Request $request){
        $user = User::find($request->user_id);
        $user->complete_name = $request->complete_name;
        $user->purok = $request->purok;
        $user->sex = $request->sex;
        $user->bday = $request->bday;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back();
    }



}

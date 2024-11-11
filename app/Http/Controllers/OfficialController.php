<?php

namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\Http\Request;
use App\Models\OfficialIdPic;

class OfficialController extends Controller
{
    public function add_official(Request $request){

        Official::create([
            'complete_name' => $request->complete_name,
            'sex' => $request->sex,
            'bday' => $request->bday,
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
            'fields' => $request->fields,
            'status' => 'Active',
            'system_id' => date("Ymdhisa"),
        ]);

        return response()->json();
    }

    public function edit_official(Request $request){
        $official = Official::find($request->off_id);
        $official->complete_name = $request->complete_name;
        $official->sex = $request->sex;
        $official->bday = $request->bday;
        $official->address = $request->address;
        $official->phone = $request->phone;
        $official->role = $request->role;
        $official->fields = $request->fields;
        $official->status = $request->status;
        $official->save();

        return response()->json();
    }

    public function delete_official(Request $request){
        $official = Official::find($request->off_id);
        $official->delete();

        $get_off_pics = OfficialIdPic::where('user_id', $request->off_id)->get();

        foreach($get_off_pics as $item_get_off_pics){
            $off_pic = OfficialIdPic::find($item_get_off_pics->id);
            $off_pic->delete();
        }
        return response()->json();
    }


    public function edit_official_v2(Request $request){
        $official = Official::find($request->off_id);
        $official->complete_name = $request->complete_name;
        $official->sex = $request->sex;
        $official->bday = $request->bday;
        $official->address = $request->address;
        $official->phone = $request->phone;
        $official->role = $request->role;
        $official->fields = $request->fields;
        $official->status = $request->status;
        $official->save();

        return redirect()->back();
    }




}

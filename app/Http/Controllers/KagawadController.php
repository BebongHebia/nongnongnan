<?php

namespace App\Http\Controllers;

use App\Models\Kagawad;
use Illuminate\Http\Request;

class KagawadController extends Controller
{
    public function add_kagawad(Request $request){

        $get_kagawad = Kagawad::latest()->first();
        if ($get_kagawad == null){
            $system_id = 1;
        }else{
            $system_id = $get_kagawad->id + 1;
        }


        Kagawad::create([
            'complete_name' => $request->complete_name,
            'sex' => $request->sex,
            'bday' => $request->bday,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => "Active",
            'system_id' => date("Ymd") . $system_id,
        ]);

        return response()->json();
    }

    public function edit_kagawad(Request $request){
        $kagawad = Kagawad::find($request->kag_id);
        $kagawad->complete_name = $request->complete_name;
        $kagawad->sex = $request->sex;
        $kagawad->bday = $request->bday;
        $kagawad->address = $request->address;
        $kagawad->phone = $request->phone;
        $kagawad->status = $request->status;
        $kagawad->save();
        return response()->json();

    }

    public function delete_kagawad(Request $request){
        $kagawad = Kagawad::find($request->kag_id);
        $kagawad->delete();
        return response()->json();
    }

    public function update_kagawad_profile(Request $request){
        $kagawad = Kagawad::find($request->kagawad_id);
        $kagawad->complete_name = $request->complete_name;
        $kagawad->sex = $request->sex;
        $kagawad->bday = $request->bday;
        $kagawad->address = $request->address;
        $kagawad->phone = $request->phone;
        $kagawad->save();

        return redirect()->back();
    }
}

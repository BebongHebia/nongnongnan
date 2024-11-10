<?php

namespace App\Http\Controllers;

use App\Models\KagawadIdPic;
use Illuminate\Http\Request;

class KagawadIdPicController extends Controller
{
    public function add_id_pic(Request $request){
        $profile_exists = KagawadIdPic::where('user_id', $request->kagawad_id)->count();

        if ($profile_exists){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $imagePath = $request->file('image')->store('images', 'public');

            $get_profile = KagawadIdPic::where('user_id', $request->kagawad_id)->get();

            foreach ($get_profile as $item_get_profile) {
                $picture = KagawadIdPic::find($item_get_profile->id);
                $picture->path = $imagePath;
                $picture->filename = $request->file('image')->getClientOriginalName();
                $picture->save();
            }

            return redirect()->back();
        }else{
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $imagePath = $request->file('image')->store('images', 'public');

            KagawadIdPic::create([
                'user_id' => $request->kagawad_id,
                'path' =>  $imagePath,
                'filename' => $request->file('image')->getClientOriginalName(),
            ]);

            return redirect()->back();
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kagawad;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function add_announcement(Request $request){
        Announcement::create([
            'added_by' => $request->added_by,
            'title' => $request->title,
            'details' => $request->details,
        ]);

        return response()->json();
    }

    public function edit_announcement(Request $request){
        $ann = Announcement::find($request->ann_id);
        $ann->title = $request->title;
        $ann->details = $request->details;
        $ann->save();
        return response()->json();

    }

    public function delete_announcement(Request $request){
        $ann = Announcement::find($request->ann_id);
        $ann->delete();
        return response()->json();
    }


}

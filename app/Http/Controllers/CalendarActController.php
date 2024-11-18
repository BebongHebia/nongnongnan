<?php

namespace App\Http\Controllers;

use App\Models\CalendarAct;
use Illuminate\Http\Request;

class CalendarActController extends Controller
{

    public function add_cal_act(Request $request){
        CalendarAct::create([
            'activity' => $request->activity,
            'date' => $request->date,
            'status' => 'Pending',
        ]);

        return response()->json();
    }

    public function edit_cal_act(Request $request){

        $cal_act = CalendarAct::find($request->cal_cat_id);
        $cal_act->activity = $request->activity;
        $cal_act->date = $request->date;
        $cal_act->status = $request->status;
        $cal_act->save();
        return response()->json();
    }

    public function delete_cal_act(Request $request){
        $cal_act = CalendarAct::find($request->cal_cat_id);
        $cal_act->delete();
        return response()->json();
    }

    public function getEvents()
{
    $events = CalendarAct::all()->map(function($event) {
        // Define color mappings for each status
        $colorMap = [
            'Done' => '#28a745',      // Green
            'Ongoing' => '#ffc107',   // Yellow
            'Pending' => '#ed0000',   // Red
            'Cancelled' => '#6c757d', // Gray
        ];

        // Use the color based on the status or a default if status is not in the map
        $color = $colorMap[$event->status] ?? '#007bff'; // Default color (blue)

        return [
            'id' => $event->id,
            'title' => $event->activity,
            'start' => $event->date,
            'backgroundColor' => $color,
            'borderColor' => $color,
            'allDay' => true,
        ];
    });

    return response()->json($events);
}


}

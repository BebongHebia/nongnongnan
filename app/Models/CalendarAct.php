<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarAct extends Model
{
    use HasFactory;

    protected $table = 'calendar_acts';

    protected $fillable = [

        'activity',
        'date',
        'status',

    ];
}

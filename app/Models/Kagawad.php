<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kagawad extends Model
{
    use HasFactory;

    protected $fillable = [
        'complete_name',
        'sex',
        'bday',
        'address',
        'phone',
        'status',
        'system_id',
    ];
}

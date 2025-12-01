<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelNote extends Model
{
    protected $table = 'travelnote';

    protected $fillable = [
        'user_id',
        'date',
        'location',
        'description',
    ];
}

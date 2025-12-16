<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    protected $table = 'pictures';

    protected $fillable = [
        'user_id',
        'file_path',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = [
        'name', 'uuid','phone','wep','tel','logo','email','Address_id', 'password',//'created_at',
    ];
}


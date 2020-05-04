<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    /** @var type $ description. */
    protected $fillable = [
        'id',
        'contere',
        'cite',
        'zip'
    ];
    public function school()
    {
        return $this->hasOne('App\Models\School','address_id','id');
    }
}

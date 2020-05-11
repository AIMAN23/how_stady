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
    ##############  address for school #######
    public function school()
    {
        return $this->hasOne('App\Models\School','address_id');
    }
    ##############  address for teache #######
    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher','address_id');
    }
    ##############  address for supervisor #######
    public function supervisor()
    {
        return $this->hasOne('App\Models\Supervisor','address_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
## مودل المشرف للمرحلة الدراسية
class Supervisor extends Model
{
    protected $fillable =[
        'id',
        'uuid',
        'name',
        'email',
        'email_verified_at',
        'mobile',
        'password',
        'school_id',
        'address_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function address()
    {
        return $this->belongsTo('App\Models\Address','address_id');
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School','school_id');
    }

    public function level()
    {
        return $this->hasMany('App\Models\Supervisor','supervisor_id');
    }
}

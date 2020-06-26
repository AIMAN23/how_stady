<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
## مودل المشرف للمرحلة الدراسية
class Supervisor extends Model
{
    protected $fillable =[
        'id','no','uuid','status',
        ## 
        'name','f_name','p_name','l_name',
        ## 
        'email','mobile',
        ## 
        'gender','nationality','birthdate',
        ##
        'email_verified_at','remember_token','password',
        ##foreign Key
        'image_id',
        'address_id',
        'school_id',
        // 'socialdetail_id',
        // 'healthdetail_id',
        ## detetime columns
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
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

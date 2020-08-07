<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
## مودل المشرف للمرحلة الدراسية
class Supervisor extends Authenticatable
{
    use memberAt;
    use Notifiable;
    protected $guard='supervisor';
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
        return $this->hasMany('App\Models\Level','supervisor_id');
    }
    public function img()
    {
        return $this->belongsTo('App\Models\Image','image_id','id','id');
    }



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

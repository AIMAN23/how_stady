<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthenticatableAdmin;
use Illuminate\Notifications\Notifiable;
## مودل وكيل المدرسة
class Agent extends AuthenticatableAdmin
{
    use Notifiable;
    protected $table = "agents";
    protected $fillable=[
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
    protected $hidden =[
            'password',
            'remember_token',
        ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = true;
    
    ##############   Start Relationes     ##############
     ############ Agent address
        public function address()
        {
            return $this->belongsTo('App\Models\Address','address_id');
        }
     ###########   Agent school
        public function school()
        {
            return $this->belongsTo('App\Models\School','school_id','id','id');
        }
     ###########  
    
    
    ##############   end Relationes     ##############
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthenticatableAdmin;
use Illuminate\Notifications\Notifiable;
## مودل المدير للمدرسة
class Manager extends AuthenticatableAdmin
{
    use Notifiable;
    protected $table = "managers";
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
            'email_verified_at',
            'password','created_at','updated_at'
        ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = true;
    
    ##############   Start Relationes     ##############
     ############ Manager address عنوان مدير المدرسة
        public function address()
        {
            return $this->belongsTo('App\Models\Address','address_id');
        }
     ###########   Manager school  المدرسة للمدير
        public function school()
        {
            return $this->belongsTo('App\Models\School','school_id');
        }
     ###########  
    
    
    ##############   end Relationes     ##############
}

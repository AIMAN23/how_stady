<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolAdmin extends Model
{
    protected $fillable = ['id','name','mobile','email','status','image_id','address_id','school_id',];
    protected $table = "school_admins";
    protected $hidden =['password','remember_token'];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = true;
    ##############   Start Relationes     ##############
        ############  address عنوان مسؤل النظام
            public function address()
            {
                return $this->belongsTo('App\Models\Address','address_id');
            }
        ###########   School  مدرسة مسؤل النظام
            public function school()
            {
                return $this->belongsTo('App\Models\School','school_id');
            }
        ###########   image صورة مسؤل نظام المدرسة
            public function image()
            {
                return $this->belongsTo('App\Models\Image','image_id');
            }
        ###########  
    
    
    ##############   end Relationes belongsTo    ##############
    ##############   Start Relationes has    ##############
        ############  registeres الطلاب الذي اظافهم المشرف للمدرسة
            public function registers()
            {
                return $this->hasMany('App\Models\StudentRegister','schooladmin_id');
            }
    ##############   end Relationes has    ##############

}

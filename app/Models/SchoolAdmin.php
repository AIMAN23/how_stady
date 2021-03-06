<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Support\Facades\Hash;
use App\Traits\memberAt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthenticatableAdmin;

## مودل مسئول النظام للمدرسة
class SchoolAdmin extends AuthenticatableAdmin
{
    use memberAt;
    use Notifiable;
    protected $guard='admin';
    protected $fillable = [
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
        'password',
        // 'socialdetail_id',
        // 'healthdetail_id',
        ## detetime columns
        'created_at',
        'updated_at',
    ];
    protected $table = "school_admins";
    protected $hidden =['password'];
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
            public function img()
            {
                return $this->belongsTo('App\Models\Image','image_id');
            }
        ###########  
    
    
    ##############   end Relationes belongsTo    ##############
    ##############   Start Relationes has    ##############
        ############  registeres الطلاب الذي اظافهم المشرف للمدرسة
            public function registers()
            {
                return $this->hasMany('App\Models\StudentRegister','school_admin_id');
            }
    ##############   end Relationes has    ##############

    //accessors
    // public function setGenderAttribute($value){
    //   return  $value =='M'? 1:2 ;
    // }
    // public function setPasswordAttribute($value){
    //   return  ;
      
    // }

    public function getGenderAttribute($value){
      return  $value == 1 ?'male' : 'female';
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

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
## مودل الطالب
class Student extends Authenticatable
{
    use Notifiable;
    protected $table = "students";
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
        // 'school_id',
        'socialdetail_id',
        'healthdetail_id',
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
     
    
    ##############   Start Relationes  belongsTo   ##############
        ############  address
            public function address()
            {
                return $this->belongsTo('App\Models\Address','address_id');
            }    
        ############ Student socialdetail 
        public function socialdetail()
        {
            return $this->belongsTo('App\Models\Socialdetail','socialdetail_id');
        }
        ############ Student healthdetail 
        public function healthdetail()
        {
            return $this->belongsTo('App\Models\Healthdetail','healthdetail_id');
        }


    ##############   end Relationes belongsTo    ##############
    ##############   Start Relationes  has      ##############
        ############  registeres السجلات لتسجيلا الطالب في كل مستوىة
            public function registers()
            {
                return $this->hasMany('App\Models\StudentRegister','student_id');
            }
       
        

    ##############   end Relationes has     ##############


    
}

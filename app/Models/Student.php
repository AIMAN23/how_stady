<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable =[ 'id' , 'uuid' , 'name' , 'birthdate' , 'gender' , 'nationality' , 'email', 'address_id' , 'socialdetail_id' , 'healthdetail_id' ];
    protected $hidden =['password','remember_token','created_at','updated_at'];
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

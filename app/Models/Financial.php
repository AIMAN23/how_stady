<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// مودل المسؤل المالي للمدرسة 
class Financial extends Model
{
    protected $table = "financials";
    protected $fillable=[
            'id',
            'uuid',
            'name',
            'email',
            'mobile',
            'school_id',
            'address_id',
        ];
    protected $hidden =[
            'email_verified_at',
            'password','created_at','updated_at'
        ];
    public $timestamps = true;
    
    ##############   Start Relationes     ##############
     ############ financial address
        public function address()
        {
            return $this->belongsTo('App\Models\Address','address_id');
        }
     ###########   financial school
        public function school()
        {
            return $this->belongsTo('App\Models\School','school_id','id','id');
        }
     ###########   ...
    
    
    ##############   end Relationes     ##############
}

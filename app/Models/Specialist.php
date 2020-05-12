<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// مودل إخصائي المدرسة
class Specialist extends Model 
{
    protected $table = "specialists";
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
     ############ specialist address
        public function address()
        {
            return $this->belongsTo('App\Models\Address','address_id');
        }
     ###########   specialist school
        public function school()
        {
            return $this->belongsTo('App\Models\School','school_id','id','id');
        }
     ###########   ...
    
    
    ##############   end Relationes     ##############
}

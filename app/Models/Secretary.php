<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
## مودل السكرتارية للمدرسة
class Secretary extends Model
{
    protected $table = "secretaries";
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
     ############ secretaries address
        public function address()
        {
            return $this->belongsTo('App\Models\Address','address_id');
        }
     ###########   secretaries school
        public function school()
        {
            return $this->belongsTo('App\Models\School','school_id','id','id');
        }
     ###########   ...
    
    
    ##############   end Relationes     ##############
}

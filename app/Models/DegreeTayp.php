<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DegreeTayp extends Model
{
    protected $fillable = ['id' , 'tayp' ,'belongs', 'school_id'   ];
    protected $table = "degree_tayps";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
        ############  school انواع الدرجات واسمائها للمدرسة
            public function school()
            {
                return $this->belongsTo('App\Models\School','school_id');
            }
        ############  Degree كل الدرجات لكل نوع
            public function degree()
            {
                return $this->hasMany('App\Models\Degree','degreetayp_id');
            }        

        ##############   end Relationes     ##############
    
}

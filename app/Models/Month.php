<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use memberAt;
    protected $fillable = ['id' , 'month' , 'school_id' ];
    protected $table = "months";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
     ##############   Start Relationes     ##############
        ############  school
            public function school()
            {
                return $this->belongsTo('App\Models\School','school_id');
            }
        ############  Degree
            public function degree()
            {
                return $this->hasMany('App\Models\Degree','month_id');
            }        

        ##############   end Relationes     ##############

    
}

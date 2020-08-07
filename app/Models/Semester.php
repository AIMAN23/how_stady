<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use memberAt;
    protected $fillable = ['id' , 'name' , 'school_id' ];
    protected $table = "semesters";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
        ############  school الفصول الدراسية لكل مدرسة
                public function school()
                {
                    return $this->belongsTo('App\Models\School','school_id');
                }
        ############ degrees درجات كل فصل دراسي
                public function degrees()
                {
                    return $this->hasMany('App\Models\Degree','semester_id');
                }

        ##############   end Relationes     ##############
}

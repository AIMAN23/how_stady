<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    #################### 
    protected $table = "levels";
    protected $fillable = [
        'id',
        'uuid',
        'status',
        'name',
        'code_in_school',
        'code',
        'description',
        'school_id',
        'supervisor_id',
        'created_at',
        'updated_at',
        ];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    #####################        
    ##############   Start Relationes  belongsTo   ##############
        ############ School level  مشرف كل مرحلة دراسية
            public function supervisor()
            {
                return $this->belongsTo('App\Models\Supervisor','supervisor_id');
            }
        ############ School level المراحل تبع كل مدرسة
            public function school()
            {
                // return $this->belongsToMany('App\Models\School','school_levels');
                return $this->belongsTo('App\Models\School','school_id');
            }
    ##############   end Relationes   belongsTo  ##############

    ##############   start Relationes has    ##############
        ############ Subjctes level المواد الدراسية لكل مرحلة
            public function subjctes()
            {
                return $this->hasMany('App\Models\Subjcte','level_id');
            }
        ############ classrooms الشعب الدراسية لكل مرحلة
            public function classrooms()
            {
                return $this->hasMany('App\Models\Classroom','level_id');
            }
        ############ lessons الحصص الدراسية لكل مستوى
            public function lessons()
            {
                return $this->hasMany('App\Models\Lesson','level_id');
            }
        ############ StudentRegister كل الطلاب المسجلين في المسوى
            public function registers()
            {
                return $this->hasMany('App\Models\StudentRegister','level_id');
            }
    ##############   end Relationes has    ##############
    

    
    public function langname(){

        return __('lang.Level.'.$this->name) ;
    }
}

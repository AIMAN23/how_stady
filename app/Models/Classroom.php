<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = "classrooms";
    protected $fillable=[
        'id',
        'uuid',
        'name',
        'code',
        'school_id',
        'level_id',
        'teacher_id',
        ];
    protected $hidden =['created_at','updated_at',
    // 'pivot'
];
    public $timestamps = true;
    
    ##############   Start Relationes  belongsTo   ##############
        ########### school classrooms one to many
            public function school()
            {
                return $this->belongsTo('App\Models\School','school_id','id','id');
            }
        ########### level classrooms one to many
            public function level()
            {
                return $this->belongsTo('App\Models\Level','level_id','id','id');
            }
        ########### Teacher supervisor classroom one to one
            public function supervisorTeacher()
            {
                return $this->belongsTo('App\Models\Teacher','teacher_id','id','id');
            }
    ##############   end Relationes  belongsTo   ##############
    // 
    ##############   Start Relationes has     ##############
        ############  registeres الطلاب المسجلين في الشعبة الدراسية
            public function registers()
            {
                return $this->hasMany('App\Models\StudentRegister','classroom_id');
            }
    ##############   end Relationes has     ##############


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    protected $fillable = [ 'id' ,'school_year' , 'status' ,  'img' , 'student_id', 'school_id' , 'level_id' , 'classroom_id' , 'schooladmin_id' ];
    protected $table = "student_registers";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
        ############ student بيانات الطالب المسجل
            public function student()
            {
                return $this->belongsTo('App\Models\Student','student_id');
            }    
        ############ school المدرسة الذي سجل فيها
            public function school()
            {
                return $this->belongsTo('App\Models\School','school_id');
            }    
        ############ RegisterStudent Level   المستوى الذي سجل فية الطالب
            public function level()
            {
                return $this->belongsTo('App\Models\Level','level_id');
            }    
        ############ RegisterStudent classroom_id الشعبة الدراسية للطالب المسجل
            public function classroom()
            {
                return $this->belongsTo('App\Models\Classroom','classroom_id');
            }
    
        ############  admin school  المستخدم الذي سجل الطالب في المدرسة
            public function schooladmin()
            {
                return $this->belongsTo('App\Models\SchoolAdmin','schooladmin_id');
            }
            
    ##############   end Relationes     ##############
    ##############   start Relationes has    ##############
        
        ############  Degree درجات الطالب
            public function Degrees()
            {
                return $this->hasMany('App\Models\Degree','student_register_id');
            }
        ############  attendance كل معلومات التحضير للطالب
            public function attendance()
            {
                return $this->hasMany('App\Models\StudentAttendance','student_register_id');
            }
    ##############   end Relationes has    ##############

}

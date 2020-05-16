<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $fillable = ['id' , 'attendance' , 'datetime' , 'student_register_id' , 'teacher_id' , 'student_report_id'];
    protected $table = "student_attendances";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
        ##############   Start Relationes     ##############
        ############  student بيانات الطالب 
                public function student()
                {
                    return $this->belongsTo('App\Models\Student','student_register_id');
                }
        ############  teacher بيانات المعلم الذي قام بتحضير
                public function teacher()
                {
                    return $this->belongsTo('App\Models\Teacher','teacher_id');
                }
        ############ Attendance report
                public function Report()
                {
                    return $this->belongsTo('App\Models\StudentReport','student_report_id');
                }

        ##############   end Relationes     ##############
}

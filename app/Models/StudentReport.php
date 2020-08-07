<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Database\Eloquent\Model;

class StudentReport extends Model
{
    use memberAt;
    protected $fillable =[ 'id' , 'autocomment' , 'comment' , 'status' , 'show_comment_at' ];
    protected $table = "student_reports";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes   has  ##############
        ############ Degree تقرير الدرجة
            public function Degree()
            {
                return $this->hasOne('App\Models\Degree','student_report_id');
            }
        ############  attendance تقرير التحضير
            public function attendance()
            {
                return $this->hasMany('App\Models\StudentAttendance','student_report_id');
            }
    
    ##############   end Relationes  has   ##############
}

<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    use memberAt;
    protected $fillable = [
        'id',
        'code',
        'no',
        'status',
        'name',
        'img',
        'school_year',
        'pareent_id',
        'student_id',
        'school_id',
        'level_id',
        'classroom_id',
        'school_admin_id',
        'created_at',
        'updated_at'
    ];
    protected $table = "student_registers";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
        ############ student بيانات الطالب الاساسية 
            public function student()
            {
                return $this->belongsTo('App\Models\Student','student_id');
            }    
        ############ student بيانات الطالب المسجل تتنتمي الى ولي الامر حسب الرقم للهاتف
            public function pareent()
            {
                return $this->belongsTo('App\Models\Pareent','pareent_id');
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
                return $this->belongsTo('App\Models\SchoolAdmin','school_admin_id');
            }
            
    ##############   end Relationes     ##############
    ##############   start Relationes has    ##############
        
        ############  Degree درجات الطالب
            public function degrees()
            {
                return $this->hasMany('App\Models\Degree','student_register_id');
            }
        ############  attendance كل معلومات التحضير للطالب
            public function attendance()
            {
                return $this->hasMany('App\Models\StudentAttendance','student_register_id');
            }
    ##############   end Relationes has    ##############



    ##############   start functions set value for this attributes    ##############

    /**
     * تعمل هذه الدالة عند تسجيل الطلاب او اظافة قيمة جديدة لحقل الكود للطالب حيث تقوم بتحويل الحروف الصغيرة للكود الى كبيرة قبل الحفظ
     *
     * @param mixed $value // تستقبل القيمة السابقة للحقل الذي سيتم تحويلها
     * @return void // لاترجع شيء
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }

    ##############   end functions set value for this attributes    ##############

}

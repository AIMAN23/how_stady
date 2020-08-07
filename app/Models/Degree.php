<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use memberAt;
    protected $fillable = ['id', 'degree' , 'student_register_id' , 'month_id' , 'taypdegree_id' , 'subjcte_id' , 'semester_id' , 'student_report_id' ];
    protected $table = "degrees";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
        ############  Student
            public function student()
            {
                return $this->belongsTo('App\Models\Student','student_register_id');
            }
        ############  Month
            public function month()
            {
                return $this->belongsTo('App\Models\Month','month_id');
            }
        ############  Taypdegree
            public function taypDegree()
            {
                return $this->belongsTo('App\Models\DegreeTayp','degreetayp_id');
            }
        ############  Subjcte
            public function subjcte()
            {
                return $this->belongsTo('App\Models\Subjcte','subjcte_id');
            }
        ############  Semester
            public function semester()
            {
                return $this->belongsTo('App\Models\Semester','semester_id');
            }    
        ############  Report
                public function Report()
                {
                    return $this->belongsTo('App\Models\StudentReport','student_report_id');
                }    

        ##############   end Relationes     ##############
}

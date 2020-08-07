<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Database\Eloquent\Model;

class TeacherCommend extends Model
{
    use memberAt;
    protected $fillable = ['id','comment','tag','vote','teacher_id'];
    protected $table = "teacher_commends";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
        ############ TeacherCommend teacher المعلم صاحب التعليق
                public function teacher()
                {
                    return $this->belongsTo('App\Models\Teacher','teacher_id');
                }
        

        ##############   end Relationes     ##############
}

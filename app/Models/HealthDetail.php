<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthDetail extends Model
{
    protected $fillable = [
        'id',
        'hearing' , //السمع
        'eyesight',//البصر
        'pronunciation' ,//النطق
        'has_other',//هل يعاني من اعاقة اخرى 
        'other' // مرض اخر
    ];
    protected $table = "health_details";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes  has      ##############
        ############ student التفاصيل الصحية للطالب
            public function student()
            {
                return $this->hasOne('App\Models\Student','healthdetail_id');
            }

    ##############   end Relationes has     ##############
}

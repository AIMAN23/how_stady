<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialDetail extends Model
{
    protected $fillable = ['id', 'order_in_family' , 'educational_father' ,'educational_mother', 'live_with'];
    protected $table = "social_details";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes  has      ##############
        ############ student التفاصيل الاجتماعية للطالب
            public function student()
            {
                return $this->hasOne('App\Models\Student','socialdetail_id');
            }
    ##############   end Relationes has     ##############
}

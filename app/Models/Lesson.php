<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use memberAt;
    protected $fillable = ['id' , 'lesson' , 'start_time' , 'end_time', 'level_id' ];
    protected $table = "lessons";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
        ############ 
            public function level()
            {
                return $this->belongsTo('App\Models\Level','level_id');
            }

    ##############   end Relationes     ##############
}

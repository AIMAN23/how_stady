<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    #################### 
    protected $table = "classrooms";
    protected $fillable = [
        'id',
        'name',
        'description',
        'school_id',
        'supervisor_id',
        'created_at',
        'updated_at',
        ];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    #####################        
    ##############   Start Relationes     ##############
    public function supervisor()
    {
        return $this->belongsTo('App\Models\Supervisor','supervisor_id');
    }
        ############ School level
    public function school()
    {
        return $this->belongsTo('App\Models\School','school_id');
    }
        ############ Subjctes level
    public function subjctes()
    {
        return $this->hasMany('App\Models\Subjcte','level_id');
    }
        ############ classrooms
    public function level()
    {
        return $this->hasMany('App\Models\Classroom','level_id');
    }
    ##############   end Relationes     ##############

    
}

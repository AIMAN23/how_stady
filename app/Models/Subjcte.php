<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjcte extends Model
{
    protected $fillable =[
        'id',
        'name',
        'description',
        'school_id',
        'level_id',
        'teacher_id',
    ];

    ############ Subjctes to school
    public function school()
    {
        return $this->belongsTo('App\Models\School','school_id');
    }
    ############ Subjctes level
    public function level()
    {
        return $this->belongsTo('App\Models\Level','level_id');
    }
    ############ Subjcte teacher
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher','teacher_id');
    }
    ############ Degrees  كل درجات المادة
    public function degrees()
    {
        return $this->belongsTo('App\Models\Degree','subjcte_id');
    }
    
    public function SubjcteAttrabuts(){
        return $this->attributesToArray();
    }
    
}

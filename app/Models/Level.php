<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    /** @var type $ description. */
    protected $fillable = [
        'id',
        'name',
        'description',
        'school_id',
        'supervisor_id',
        'created_at',
        'updated_at',
        ];
    public function supervisor()
    {
        return $this->belongsTo('App\Models\Supervisor','supervisor_id');
    }
    
    public function school()
    {
        return $this->belongsTo('App\Models\School','school_id');
    }
    ############ Subjctes level
    public function subjctes()
    {
        return $this->hasMany('App\Models\Subjcte','level_id');
    }


    
}

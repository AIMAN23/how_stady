<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    //
     
    protected $fillable = [
        'id','name','uuid','phone','wep','tell','logo','email',
        'address_id',
        'password',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @var type $guard  login tayp School Admin. */
    protected $guard ='admin';
    
    ############ address to school
    public function address()
    {
        return $this->belongsTo('App\Models\Address','address_id');
    }
    ############ levels in school
    public function levels()
    {
        return $this->hasMany('App\Models\Level','school_id');
    }
    ############ Supervisors in school
    public function Supervisors()
    {
        return $this->hasMany('App\Models\Supervisor','school_id');
    }
    ############ subjctes in school
    public function subjctes()
    {
        return $this->hasMany('App\Models\Subjcte','school_id');
    }
    ############ teachers in school
    public function teachers()
    {
        //return $this->belongsToMany('App\Models\Teacher','school_teacher','school_id','teacher_id','id','id');
    }
    ############ classrooms in school 
    public function classrooms()
    {
        return $this->hasMany('App\Models\Classroom','school_id','id');
    }
    ############ Specialist in school
    public function specialist()
    {
        return $this->hasOne('App\Models\Specialist','school_id');
    }
    ############ Secretary in school
    public function secretary()
    {
        return $this->hasOne('App\Models\Secretary','school_id');
    }
    ############ Financial in school
    public function financial()
    {
        return $this->hasOne('App\Models\Financial','school_id');
    }
    ############ Agent in school
    public function agent()
    {
        return $this->hasOne('App\Models\Agent','school_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'id',
        'uuid',
        'name',
        'email',
        'email_verified_at',
        'mobile',
        'password',
        'address_id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function address()
    {
        return $this->belongsTo('App\Models\Address','address_id');
    }
    ############ Subjctes teacher
    public function subjctes()
    {
        return $this->hasMany('App\Models\Subjcte','teacher_id');
    }
    ############ schools for teacher
    public function schools()
    {
        // session()->put('school_id','school_id');
        //return $this->belongsToMany('App\Models\School','school_teacher','teacher_id','school_id','id','id');
    }
    ########### Teacher supervisor classroom one to one
    public function classroom()
    {
        return $this->hasOne('App\Models\Classroom','teacher_id','id');
    }
    ############  attendance كل  التحضير الذي اظافة المعلم لطلابة
    public function attendance()
    {
        return $this->hasMany('App\Models\StudentAttendance','teacher_id');
    }
    ############  attendance كل  التعليقات الذي اظافة المعلم لطلابة
    public function commends()
    {
        return $this->hasMany('App\Models\TeacherCommend','teacher_id');
    }
}

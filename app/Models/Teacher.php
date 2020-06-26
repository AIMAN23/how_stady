<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
## مودل المعلم
class Teacher extends Model
{
    //
    protected $fillable = [
        'id','no','uuid','status',
        ## 
        'name','f_name','p_name','l_name',
        ## 
        'email','mobile',
        ## 
        'gender','nationality','birthdate',
        ##
        'email_verified_at','remember_token','password',
        ##foreign Key
        'image_id',
        'address_id',
        // 'school_id',
        // 'socialdetail_id',
        // 'healthdetail_id',
        ## detetime columns
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
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

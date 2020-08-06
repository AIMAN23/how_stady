<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    ##
     
    protected $fillable = [
        'id',
        'uuid',
        'no',
        'status',
        'name',
        'bransh',
        'email',
        'wep',
        'tel',
        'fax',
        'logo',
        // id العنوان
        'address_id',
        'password',
        'created_at',
        'updated_at',
        // كلمت السر
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guard ='admin';
    ##############   Start Relationes  belongsTo   ##############
        ############ address to school عنوان كل مدرسة
        public function address()
        {
            return $this->belongsTo('App\Models\Address','address_id');
        }
        ############ teachers in school المدرسين لكل مدرسة
        public function teachers()
        {
            return $this->belongsToMany('App\Models\Teacher','schools_teachers', 'school_id' ,'teacher_id','id','id');
        }
    ##############   end Relationes belongsTo    ##############
    ##############   Start Relationes  has      ##############
        ############ levels in school المراحل لكل مدرسة
        public function levels()
        {
            // return $this->belongsToMany('App\Models\Level','school_levels');
            return $this->hasMany('App\Models\Level','school_id');
        }
        ############ Supervisors in school مشرفين المراحل لكل مدرسة
        public function supervisors()
        {
            return $this->hasMany('App\Models\Supervisor','school_id');
        }
        ############ subjctes in school المواد الدراسية لكل مدرسة
        public function subjctes()
        {
            return $this->hasMany('App\Models\Subjcte','school_id');
        }
        ############ classrooms in school  الفصول الدراسية لكل مدرسة
        public function classrooms()
        {
            return $this->hasMany('App\Models\Classroom','school_id','id');
        }
        ############ Specialist in school اخصائي كل مدرسة
        public function specialist()
        {
            return $this->hasOne('App\Models\Specialist','school_id');
        }
        ############ Secretary in school سكرتاريا كل مدرسة
        public function secretary()
        {
            return $this->hasOne('App\Models\Secretary','school_id');
        }
        ############ Financial in school المسؤل المالي لكل مدرسة
        public function financial()
        {
            return $this->hasOne('App\Models\Financial','school_id');
        }
        ############ Agent in school وكيل كل مدرسة
        public function agent()
        {
            return $this->hasOne('App\Models\Agent','school_id');
        }
        ############ Manager in school مدير كل مدرسة
        public function manager()
        {
            return $this->hasOne('App\Models\Manager','school_id');
        }
        ############ Month in school الشهور الدراسية لكل مدرسة
        public function months()
        {
            return $this->hasMany('App\Models\Month','school_id');
        }
        ############ degreeTayps in school انواع الدرجات لكل مدرسة
        public function degreeTayps()
        {
            return $this->hasMany('App\Models\DegreeTayp','school_id');
        }
        ############ Semester in school اسماء الفصول الدراسية لكل مدرسة وعددها  الطبيعي 2
        public function semesters()
        {
            return $this->hasMany('App\Models\Semester','school_id');
        }
        ############ SchoolAdmin in school مسئول النظام لكل مدرسة
        public function admins()
        {
            return $this->hasMany('App\Models\SchoolAdmin','school_id');
        }
        ############ StudentRegister الطلاب المسجلين في المدرسة
        public function registers()
        {
            return $this->hasMany('App\Models\StudentRegister','school_id');
        }
        
    ##############   end Relationes has     ##############
    /**
     * Scope a query to only include 
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function Levelnotsuper()
    {
        return $this->levels()->where('status',0)->orwhere('supervisor_id',0);
    }
}


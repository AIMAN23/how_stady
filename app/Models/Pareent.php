<?php

namespace App\Models;

// use DateTime;
use App\Traits\memberAt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pareent extends Authenticatable
{
    use memberAt;
    use Notifiable;
    protected $guard='pareent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    ############  address
    public function address()
    {
        return $this->belongsTo('App\Models\Address','address_id');
    }
    ###########
    ###########  
    public function img()
    {
        return $this->belongsTo('App\Models\Image', 'image_id', 'id', 'id');
    }
    ########### 
    ############ student بيانات الطالب المسجل تتنتمي الى ولي الامر حسب الرقم للهاتف
    public function studentRegister()
    {
        return $this->hasMany('App\Models\StudentRegister','pareent_id');
    }
    #######################################
    public function level(){
        return $this->hasManyThrough('App\Models\Classroom', 'App\Models\StudentRegister','classroom_id');
    }



}

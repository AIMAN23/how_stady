<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    ## مودل الصور
    protected $fillable = [
        'id',
        'no',
        'status',
        'img',
        'created_at',
        'updated_at',
    ];
    protected $table = "images";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
     ############ Image School Admin صورة سؤل  النظام
        public function admin()
        {
            return $this->hasOne('App\Models\SchoolAdmin','image_id');
        }  
        public function manager()
        {
            return $this->hasOne('App\Models\Manager','image_id');
        }  
        public function specialist()
        {
            return $this->hasOne('App\Models\Specialist','image_id');
        }  
        public function secretary()
        {
            return $this->hasOne('App\Models\Secretary','image_id');
        }  
        public function financial()
        {
            return $this->hasOne('App\Models\Financial','image_id');
        }  
        public function teacher()
        {
            return $this->hasOne('App\Models\Teacher','image_id');
        }  
        public function pareent()
        {
            return $this->hasOne('App\Models\Pareent','image_id');
        }  
        public function student()
        {
            return $this->hasOne('App\Models\Student','image_id');
        }  
        public function supervisor()
        {
            return $this->hasOne('App\Models\Supervisor','image_id' ,'id');
        }  
        public function agent()
        {
            return $this->hasOne('App\Models\Agent','image_id' ,'id');
        }  
    
    ##############   end Relationes     ##############

}

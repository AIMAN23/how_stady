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

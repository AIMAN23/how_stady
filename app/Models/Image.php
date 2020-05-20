<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    ## مودل الصور
    protected $fillable = ['id','img'];
    protected $table = "images";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    ##############   Start Relationes     ##############
     ############ Image School Admin صورة سؤل  النظام
        public function admin()
        {
            return $this->hasOne('App\Models\SchoolAdmin','image_id');
        }  
    
    ##############   end Relationes     ##############

}

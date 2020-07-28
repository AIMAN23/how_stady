<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    ## مودل الملفات
    protected $fillable = [
        ##
        'id',
        'no',
        'status',
        ##
        'filename',
        'path',
        'description',
        ##
        'school_id',
        'school_admin_id',
        ##
        'created_at',
        'updated_at',
    ];
    protected $table = "files";
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;


    //accessors
    public function getPathAttribute($val){

        return Storage::url($val) ;// ? 'male' : 'female';
    }
}

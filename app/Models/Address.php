<?php

namespace App\Models;

use App\Traits\memberAt;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use memberAt;
    protected $table = "addresses";
    protected $fillable = [
        'id',
        'country',
        'cite',
        'street',
        'zip',
    ];
   
   
    ##############  address for school #######
    public function school()
    {
        return $this->hasOne('App\Models\School','address_id');
    }
    ##############  address for teache #######
    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher','address_id');
    }
    ##############  address for supervisor #######
    public function supervisor()
    {
        return $this->hasOne('App\Models\Supervisor','address_id');
    }
    ##############  address for Specialist #######
    public function specialist()
    {
        return $this->hasOne('App\Models\Specialist','address_id');
    }
    ##############  address for Secretary #######
    public function secretary()
    {
        return $this->hasOne('App\Models\Secretary','address_id');
    }
    ##############  address for Financial #######
    public function financial()
    {
        return $this->hasOne('App\Models\Financial','address_id');
    }
    ##############  address for Agent #######
    public function agent()
    {
        return $this->hasOne('App\Models\Agent','address_id');
    }
    ##############  address for Manager #######
    public function manager()
    {
        return $this->hasOne('App\Models\Manager','address_id');
    }
    ##############  address for Manager #######
    public function admin()
    {
        return $this->hasOne('App\Models\SchoolAdmin','address_id');
    }
    ##############  address for Student #######
    public function student()
    {
        return $this->hasOne('App\Models\Student','address_id');
    }
    ##############  address for Pareent #######
    public function pareent()
    {
        return $this->hasOne('App\Models\Pareent','address_id');
    }
}

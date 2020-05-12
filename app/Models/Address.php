<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = [
        'id',
        'contere',
        'cite',
        'zip'
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
}

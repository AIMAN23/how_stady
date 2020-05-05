<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    //
     
    protected $fillable = [
        'id','name','uuid','phone','wep','tell','logo','email',
        'address_id',
        'password',
        // 'created_at',
        // 'updated_at',
    ];
    protected $hidden = [
        'password',
        //  'remember_token',
    ];

    /** @var type $guard  login tayp School Admin. */
    protected $guard ='admin';
    
    public function address()
    {
        return $this->belongsTo('App\Models\Address','address_id','id');
    }
    
}


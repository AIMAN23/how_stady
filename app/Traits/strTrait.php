<?php

namespace App\Traits;
use Illuminate\Support\Str;

Trait  strTrait
{
    function uuid()
    {
        return Str::uuid();
    }
    function no()
    {
        $Str=new Str;
        $st=strtolower($Str->random(4));
        return $st  .'-'.  date('U');
    }
    
    /** */
    function node()
    {
        $Str=new Str;
        return $Str->uuid()->getFieldsHex()['node'];
    }
    /** */
    function timeLow()
    {
        $Str=new Str;
        return $Str->uuid()->getFieldsHex()['time_low'].$Str->random(2);
    }

    /** */
    function nodeS()
    {
        $Str=new Str;
        return intval(
            $Str->uuid()->getFieldsHex()['node'],16)
            .
            $Str->random(2);
    }

    /** */
    function timeLowS()
    {
        $Str=new Str;
        $st=strtolower(
            $Str->random(2)
        );
        return date('z')
        .
        $st
        .
        intval(
            $Str->uuid()->getFieldsHex()['time_low'],16
        );
    }
    
}

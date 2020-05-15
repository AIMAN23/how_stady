<?php

namespace App\Traits;

Trait  dataTrait
{
    protected $DegreeTayp = array(
        1=>'شفوي',
        2=>'واجبات',
        3=>'مواظبة',
        4=>'تحريري',
        5=>'الفصل الاول',
        6=>'الفصل الثاني',
    );
    

    protected $Semester  = array(
        1=>'الفصل الاول',
        2=>'الفصل الثاني',
    );

    protected $Month  = array(
        1=>'الشهر الاول',
        2=>'الشهر الثاني',
        3=>'الشهر الثالث',
    );
    function testarry($Tayp=1, $Semester=2, $Month=1)
    {
        return [
            $this->DegreeTayp,
            $this->Semester,
            $this->Month,
        ];
    }
    function degree($tayp=0)
    {
        if ($tayp > 6 | $tayp < 1) {
            return $this->DegreeTayp;
        } else {
            return $this->DegreeTayp[$tayp];
        }
    }
    function semester($secmester=0)
    {
        if (!$secmester > 2 | $secmester < 1) {
            return $this->Semester;
        } else {
            return $this->Semester[$secmester];
        }
    }
    function month($month=0)
    {
        if (!$month > 3 | $month < 1) {
            return $this->Month;
        } else {
            return $this->Month[$month];
        }
    }
        
    


}

<?php

namespace App\Traits;

use DateTime;

Trait  memberAt
{
    // protected $DegreeTayp = array(
        //     1=>'شفوي',
        //     2=>'واجبات',
        //     3=>'مواظبة',
        //     4=>'تحريري',
        //     5=>'الفصل الاول',
        //     6=>'الفصل الثاني',
        // );
        

        // protected $Semester  = array(
        //     1=>'الفصل الاول',
        //     2=>'الفصل الثاني',
        // );

        // protected $Month  = array(
        //     1=>'الشهر الاول',
        //     2=>'الشهر الثاني',
        //     3=>'الشهر الثالث',
        // );
    
    function Member($date_at= null)
    {
        if (is_null($date_at)) {
            # code...
            $date_at='now';
        }
        if(is_integer($date_at)){
            $pc=$date_at;
        }else {
            # code...
            $DTime=new DateTime($date_at);
            $pc=$DTime->getTimestamp();
        }
        
        
        
        $format= time() - $pc  ;
        $odd=$this->formatTime($format,$date_at);
        return  $odd;
    }
    function formatTime($secs , $data)
    {
         $timeFormats = [
            [0,__('lang.time.now')],
            
            [1,__('lang.time.1 sec')],
            [2,__('lang.time.secs'), 1],
            
            [60,__('lang.time.1 min')],
            [120,__('lang.time.mins'), 60],
            
            [3600,__('lang.time.1 hr')],
            [7200,__('lang.time.hrs'), 3600],
            
            [86400,__('lang.time.1 day')],
            [86400*2,__('lang.time.to days')],
            [86400*3,__('lang.time.days'),86400],
            
            [604800,__('lang.time.last week')],
            [604800*2,__('lang.time.to weeks')],
            [604800*3,__('lang.time.weeks'),604800],
            
            [2592000,__('lang.time.last month')],
            [2592000*2,__('lang.time.to months')],
            // [2592000*3,__('lang.time.months'),2592000],
        ];
        if($secs >= 2592000*3 ){
            return $data.'' ;
        }

        foreach ($timeFormats as $index => $format) {
            
            if ($secs >= $format[0]) {
                if ((isset($timeFormats[$index + 1]) && $secs < $timeFormats[$index + 1][0])
                    || $index == \count($timeFormats) - 1
                ) {
                    if (2 == \count($format)) {
                        return $format[1];
                    }
                    $lang=app()->getLocale();
                    if($lang=='ar'){
                        
                        return $format[1].' '.floor($secs / $format[2]);
                    }
                    return floor($secs / $format[2]).' '.$format[1];
                }
            }
        }
    }
        
    


}

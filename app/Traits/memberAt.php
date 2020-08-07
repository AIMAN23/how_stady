<?php

namespace App\Traits;

use DateTime;

Trait  memberAt
{
    // protected $c_at =$this->created_at;
    // protected $u_at=$this->updated_at;
    function userguard(){
        return $this->guard;
     }
    function created_ago(string $created_at=null)
    {
        $date=($created_at == null)?  $this->created_at : $created_at ;
        return 'تم الاضافة منذ '. $this->Member($date);
    }
    
    function updated_ago(string $updated_at =null)
    {
        $date=($updated_at == null)? $this->updated_at : $updated_at ;
        return 'تم التحديث منذ '. $this->Member($date);
    }
   
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
    /**
     * Undocumented function
     *
     * @param string $date_at
     * @return string|array|null|int|void
     */
    function Member(string $date_at= null)
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
    /**
     * تقوم هاذه العملية بـ:اعادة الزمن منذ متى كان
     *
     * @param int $secs 
     * $secs= time() - Timestamp for ago date
     * $secs  هي الوقت الحالي ناقص الوقت السابق او المراد معرفة منذ متى كان
     * @param string $data التاريخ الاصلي
     */
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
                    app()->setLocale('ar');
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

<?php

namespace App\Http\Middleware\Status;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;


class CheckStatus 
{
    protected $guard;
    protected $status;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->guard = Auth::user()->guard;
        $this->status = Auth::user()->status;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->session()->put('userguard',Auth::user()->userguard());
        // 
        if ($this->guard=='student')
            {  return response('');  }
            // =======================================
        if ($this->guard=='pareent')
            {  return response('');  }
            // =======================================
        if ($this->guard=='admin' and $this->checkAdminSetting() !='') 
            {  return redirect()->route($this->checkAdminSetting());  }
            // =======================================
        if ($this->guard=='teacher')
            {  return response('');  }
            // =======================================
        if ($this->guard=='supervisor')
            {  return response('');  }
            // =======================================
        if ($this->guard=='secretary')
            {  return response('');  }
            // =======================================
        if ($this->guard=='financial')
            {  return response('');  }
            // =======================================
        if ($this->guard=='specialist')
            {  return response('');  }
            // =======================================
        if ($this->guard=='agent')
            {  return response('');  }
            // =======================================
        if ($this->guard=='manager')
            {  return response('');  }
            // =======================================
        // 
        return $next($request);
    }

    /**
     * التحقق من اكمال بيانات الطالب
     *
     */
    public function checkStudentSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات ولي الامر 
     *
     */
    public function checkPareentSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات المعلم
     *
     */
    public function checkTeacherSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات المشرف للمرحلة 
     *
     */
    public function checkSupervisorSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات السكرتاري للمدرسة
     *
     */
    public function checkSecretarySetting(){
        
    }
    /**
     * التحقق من اكمال بيانات المسؤل المالي للمدرسة
     *
     */
    public function checkFinancialSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات الاخصائي للمدرسة
     *
     */
    public function checkSpecialistSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات مسؤل النظام للمدرسة
     *
     */
    public function checkAdminSetting(){

        if ($this->status == 0) {
            // اعداد البيانات الشخصية لمسؤل النظام
            // return 'admin.setting.step_1';
            return ('admin.option.setting.step_1');
        }

        if ($this->status == 1) {
            // return 'admin.setting.step_1';
            return ('admin.option.setting.step_2');
        }
        return '';
        
    }
    /**
     * التحقق من اكمال بيانات الوكيل للمدرسة
     *
     */
    public function checkAgentSetting(){
        if ($this->status == 1) {
            return view('agent.setting.step_1');
            // return redirect()->route('agent.option.setting.step_3');
        }
    }
    /**
     * التحقق من اكمال بيانات المدير للمدرسة
     *
     */
    public function checkManagerSetting(){
        
    }
}

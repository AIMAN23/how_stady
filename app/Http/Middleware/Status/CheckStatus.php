<?php

namespace App\Http\Middleware\Status;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckStatus
{

    protected $user;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->user = Auth::user();
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
        // 
        if (Auth::check('student'))     {   $this->checkStudentSetting();      }
        if (Auth::check('pareent'))     {   $this->checkPareentSetting();      }
        if (Auth::check('teacher'))     {   $this->checkTeacherSetting();      }
        if (Auth::check('supervisor'))  {   $this->checkSupervisorSetting();   }
        if (Auth::check('secretary'))   {   $this->checkSecretarySetting();    }
        if (Auth::check('financial'))   {   $this->checkFinancialSetting();    }
        if (Auth::check('specialist'))  {   $this->checkSpecialistSetting();   }
        if (Auth::check('admin'))       {   $this->checkAdminSetting();        }
        if (Auth::check('agent'))       {   $this->checkAgentSetting();        }
        if (Auth::check('manager'))     {   $this->checkManagerSetting();      }
        // 
        return $next($request);
    }

    /**
     * التحقق من اكمال بيانات الطالب
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkStudentSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات ولي الامر 
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkPareentSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات المعلم
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkTeacherSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات المشرف للمرحلة 
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkSupervisorSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات السكرتاري للمدرسة
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkSecretarySetting(){
        
    }
    /**
     * التحقق من اكمال بيانات المسؤل المالي للمدرسة
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkFinancialSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات الاخصائي للمدرسة
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkSpecialistSetting(){
        
    }
    /**
     * التحقق من اكمال بيانات مسؤل النظام للمدرسة
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkAdminSetting(){
        if (Auth::check('admin') and Auth::user()->status == 0) {
            if(Auth::user()->status == 0 ){
                // اعداد البيانات الشخصية لمسؤل النظام
                // return response(view('admin.setting.step_1'));
                return redirect()->route('admin.option.setting.step_1');
            }
        }
        if (Auth::check('admin') and Auth::user()->status == 1) {
            // return response(view('admin.setting.step_1'));
            return redirect()->route('admin.option.setting.step_2');
        }
        
    }
    /**
     * التحقق من اكمال بيانات الوكيل للمدرسة
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkAgentSetting(){
        if (Auth::check('agent') and Auth::user()->status == 1) {
            // return response(view('agent.setting.step_1'));
            return redirect()->route('agent.option.setting.step_3');
        }
    }
    /**
     * التحقق من اكمال بيانات المدير للمدرسة
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function checkManagerSetting(){
        
    }
}

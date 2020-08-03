<?php

namespace App\Http\Controllers\controllers\login;

use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SwitchController extends Controller
{
    /**
     * all guards[]
     */
    protected $allGuard = null;

    public function __construct()
    {
        $guards=array();
        foreach (config('auth.guards') as $key => $value) {
            $guards[]=$key;
        }
       $this->allGuard = $guards;
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function swhitchLogin(Request $request){
        // $request->validate();
    $request->validate([
        'tayp-login'=>'required|string|max:255',
    ]);
        // التئكد من عدم تسجيل دخول مستخدم اخر
        $check=$this->checkLogin($request);
        // $request->
        //         session()->has('datalogin.taypuser') ?
        //          $request->session()->get('datalogin.taypuser') 
        //         :null;
       
        if(!empty($check) )
        {
            return redirect()->route($check.'.login');
        }
        else 
        {
            // او يتم التالي
            # code...
            session()->put('userguard',$request['tayp-login']);
            session()->put('datalogin',[
                'taypuser' => $request['tayp-login'] ,
                // 'backurl'  => route('v.switch.login') ,
                // 'oldurl'   => session('_previous.url') ,//session()->get('url') ,
                ]);
            return redirect()->route($request['tayp-login'].'.login');
        }
        
    }


    public function checkLogin(Request $request){
       $s= School::all();
        $guardname='';
      
        foreach ($this->allGuard as  $guard) {
            # code...
            // $request->route();
            if(auth($guard)->check()){
                $guardname= (string) $guard;
            }
        }//end foreach 

        return  $guardname;

    }// end checkLogin



}//end class

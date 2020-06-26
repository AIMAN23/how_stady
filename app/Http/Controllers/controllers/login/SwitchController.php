<?php

namespace App\Http\Controllers\controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SwitchController extends Controller
{
    public function swhitchLogin(Request $request){
        session()->put('datalogin',[
            'taypuser' => $request['tayp-login'] ,
            // 'backurl'  => route('v.switch.login') ,
            // 'oldurl'   => session('_previous.url') ,//session()->get('url') ,
            ]);
            return redirect()->route($request['tayp-login'].'.login');
        if ($request['tayp-login'] == 'admin') {
            # code...
            //  return redirect()->back()->with('backUrl' ,route('v.switch.login'));
        //    session()->put('datalogin',['id' => 'admin','backUrl' => route('v.switch.login')]);
            // return redirect()->route('showloginSchool');
            return $request;
        }
        elseif ($request['tayp-login'] == 'teacher') {
            # code...
        //    session()->put('datalogin',['id' => 'teacher','backUrl' => route('v.switch.login')]);
            // return redirect()->back()->withErrors(['id' => 'admin','backUrl' => route('v.switch.login')]);
            // return route('showloginSchool');
            return $request;
        }
        elseif ($request['tayp-login'] == 'student') {
            # code...
            // session()->put('datalogin',['id' => 'student','backUrl' => route('school.address')]);
            // return redirect()->route('login', ['id' => 'student','backUrl' => route('v.switch.login')]);
            return $request;
        }else {
            # code...
            // return redirect()->back()->withErrors(['error'=> __('lang.select the tayp user')]);
            return $request;
        }
    }
}

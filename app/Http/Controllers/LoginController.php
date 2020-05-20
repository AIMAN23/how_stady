<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\School;
use Illuminate\Http\Request;

// use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    ######################## cobe Auth\loginController hare
    /** */
    use AuthenticatesUsers;

    /** */
    protected $redirectTo = RouteServiceProvider::ADMIN;
    
    /** */    
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /** */
    public function showLoginForm()
    {
        return view('Authusers.loginSchool');
    }
    
    /** */
    public function username()
    {

        $value = request()->input('usercode');
    	$field = filter_var( $value , FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
	    request()->merge([$field => $value]);
	    return $field;
    }

    /** */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /** */
    protected function loggedOut(Request $request)
    {
        return redirect('/loginSchool');
    }
    ###############################
    
    /*######### old code hare #################
        

        // public function __construct()
        // {
        //     $this->middleware('guest:admin')->except('logout');
        // }
        public function redireclogin()
        {
            if (session()->has('schoolid.id')) {
                return true;
            }
            return  false;
        }

        public function showLoginForm()
        {
            if ($this->redireclogin()) {
                return redirect('/nn');
            }
            return view('Authusers.loginSchool');
        }

        public function loginSchool(Request $request)
        {
            
            $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required|min:8'
            ]);
            // auth('school')->attempt(request(['email', 'password']))
            // $auth=Auth::guard('school');
            // $school =School::where('email',$request->email)->get();
            
            // $school =School::where('email',$request->email)->find();

            if (Auth::guard('admin')->attempt(['email'=> $request->email ,'password'=> $request->password])  ) {
                // session()->put('schoolid',$school['uuid']);
                $school =Auth::guard('admin')->user();
                session()->put('schoolid',$school);
                return redirect()->intended('Gapp');
            }
            
            return back()->withErrors([
                'message'=>'Email or password not find'
            ]);
            
            // if (! auth('school')->attempt(request(['email', 'password']))) {
                //     return back()->withErrors([
                    //         'message'=>'Email or password not find'
                    //     ]);
                    // }
                }
                
                
        public function logoutSchool()
        {
            Auth::guard('admin')->logout();
            // auth('admin')->logout();
            return redirect('/');
        }
    */###############################
}
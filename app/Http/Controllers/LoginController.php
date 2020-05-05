<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    //
    public function loginSchool(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        // auth('school')->attempt(request(['email', 'password']))
        // $auth=Auth::guard('school');
        if (Auth::guard('admin')->attempt(['email'=> $request->email ,'password'=> $request->password])  ) {
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
}

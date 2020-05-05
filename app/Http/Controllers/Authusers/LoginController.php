<?php

namespace App\Http\Controllers\Authusers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLoginSchool()
    {
        return view('Authusers.loginSchool');
    }

    public function loginSchool(Request $request)
    {
        // auth('school')->attempt(request(['email', 'password']))
        $auth=Auth::guard('admin');
        if (!$auth->attempt(['email' => $request->email, 'password' => $request->password])   ) {
            return back()->withErrors([
                'message'=>'Email or password not find'
            ]);
        }
        return redirect('/new');
    }
}

<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

/**
 * 
 * طبقة التأكد من تسجل الدخول للمستخدمين
 * لو لم يكن مسجل الدخول يقوم بتحويلة
 * على صفحة تسجيل الدخول
 * الخاصة بة او العامة
 * تلقائيا
 * 
 *  */ 


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        $routname = ($request->session()->has('datalogin.taypuser'))
         ? $request->session()->get('datalogin.taypuser').'.login' :'returnlogin' ;
        
        //  return route($routname);
         return route('welcome');
    }

}

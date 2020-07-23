<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\AuthenticationException;
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
    // /**
    //  * Get the path the user should be redirected to when they are not authenticated.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return string|null
    //  */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         $routname = ($request->session()->has('datalogin.taypuser'))
    //      ? $request->session()->get('datalogin.taypuser').'.login' :'returnlogin' ;
        
    //         return route($routname);
    //     }

    //     //  return route('welcome');
    // }






<<<<<<< HEAD
    // نوع المستخدم  اضافة جديدة
=======

>>>>>>> a4966c1c108e6e2a2df73ddc4269a05547033c69
    protected $guards;
    // ========================================
    // 
        /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
<<<<<<< HEAD
        // تسجيل النوع في حالة لم يكن متصل
        $this->guards = $guards;
        // 
=======
        $this->guards = $guards;
>>>>>>> a4966c1c108e6e2a2df73ddc4269a05547033c69
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        );
    }
    
    // #########################

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $guards = $this->guards;
        if (empty($guards)) {
            $guards = [null];
            return null;
        }
        
        if (! $request->expectsJson()) {
            if (is_array($guards)) {
                # code...
                foreach ($guards as $guard) {
                    // if ($this->auth->guard($guard)->check()) {
                    return route($guard.'.login');
                    // }
                }
            }
        }


        return route($guards.'.home');   

    }
    // ===============================================

}

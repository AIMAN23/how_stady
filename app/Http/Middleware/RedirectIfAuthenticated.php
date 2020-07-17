<?php

namespace App\Http\Middleware;

use Closure;  
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check($guard)) {
            if ($guard=='admin') {
                return redirect(RouteServiceProvider::ADMIN);
            }
            if ($guard=='wep') 
            {
                return redirect(RouteServiceProvider::HOME);
            }
            if ($guard=='super') 
            {
                return redirect(RouteServiceProvider::supervisor);
            }
            if($guard== null){
                // return redirect()->route('/home');
                return 'NOLL Guards';
            }

        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
// new
use Closure;
use App\Http\Controllers\SchoolAdminController;// 
use App\Models\SchoolAdmin;

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
        
        if (! $request->expectsJson()) {
            if (Auth::guest('admin')) {
                return route('admin.login');
            }
            if (Auth::guest('agent')) {
                return route('agent.login');
            }
            if (Auth::guest('web')) {
                return route('/web');
            }
            if (Auth::guest('super')) {
                return route('supervisor.login');
            }
            
            // new 
            return route('welcome');
        }
    }



    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Closure  $next
    //  * @param  string[]  ...$guards
    //  * @return mixed
    //  *
    //  * @throws \Illuminate\Auth\AuthenticationException
    //  */
    // public function handle($request, Closure $next, ...$guards)
    // {
    //     $this->authenticate($request, $guards);
    //     // new code
    //     if (Auth::check('admin')) {
    //         $this->adminsession();
    //     }
    //     // 
    //     return $next($request);
    // }
    // // new code
    // public function adminsession()
    // {
    //     // return Auth::user()->getAuthPassword();
    //     if (Auth::check('admin')) {
    //         if (!session()->has('school')) {
    //             $user=SchoolAdmin::find(Auth::id());
    //             $school = $user->school()->first();
    //             session()->put('school', $school);
    //         }
    //         if (!session()->has(['lhh', 'lbb', 'levels',])) {
    //             SchoolAdminController::sessput($school->id);
    //         }
    //     }
        
    // }
    // // 



    // // protected function redirectTo($request)
    // // {
    // //     if (! $request->expectsJson()) {
    // //         // return route('login');
    // //         if (Auth::guest('guest:admin') ) {
    // //             return route('register');
    // //             # code...
    // //         }
    // //         return route('switch.login');
    // //     }
    // // }
}

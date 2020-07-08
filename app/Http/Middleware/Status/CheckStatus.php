<?php

namespace App\Http\Middleware\Status;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check('admin') and Auth::user()->status == 1) {
            // return response(view('admin\setting\step_1'));
            return redirect()->route('admin.option.setting.step_1');
        }
        if (Auth::check('admin') and Auth::user()->status == 1) {
            // return response(view('admin\setting\step_1'));
            return redirect()->route('admin.option.setting.step_2');
        }
        if (Auth::check('agent') and Auth::user()->status == 1) {
            // return response(view('agent\setting\step_1'));
            return redirect()->route('agent.option.setting.step_3');
        }
        return $next($request);
    }
}

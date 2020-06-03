<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
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
        if (Auth::guard('account')->check()  ) {
           /// return redirect()->route('admin.index');
           return $next($request); 
        }
        else
        {
        return redirect()->route('admin.getlogin');
        }
    }
}
//
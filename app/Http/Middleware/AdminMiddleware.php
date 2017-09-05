<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
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
        //dd($request->ip());
        if (!Auth::user()) {
            return redirect()->route('admin_login');
        } elseif (Auth::user()->role->name !== "Administrator") {
            return redirect()->route('admin_login');
        }  

        return $next($request);
    }
}

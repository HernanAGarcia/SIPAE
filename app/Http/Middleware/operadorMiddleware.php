<?php

namespace SIPAE\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class operadorMiddleware
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
        if (Auth::check()) {
            if(Auth::user()->role!='operador'){
                return redirect('/');
            }
         }

         return $next($request);
        
    }
}

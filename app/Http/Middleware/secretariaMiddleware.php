<?php

namespace SIPAE\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class secretariaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
         if (Auth::check()) {
            if(Auth::user()->role!='secretaria'){
                return redirect('/');
            }
         }

         return $next($request);
    }
}

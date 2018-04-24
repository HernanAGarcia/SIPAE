<?php

namespace SIPAE\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class institucionMiddleware
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
            return redirect('Secretaria');
        }

        return $next($request);
    }
}

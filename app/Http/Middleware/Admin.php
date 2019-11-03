<?php

namespace app\Http\Middleware;

use Closure;

class Admin
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

        if (Auth()->check() && $request->User()->role === 1) {

            return $next($request);


        }
        return redirect()->back();
    }
}

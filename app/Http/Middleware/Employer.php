<?php

namespace App\Http\Middleware;

use Closure;

class Employer
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

        if (Auth()->check() && $request->User()->role == 4 || $request->User()->role == 3 || $request->User()->role == 2 ) {

            return $next($request);


        }
        return redirect()->back();
    }
}

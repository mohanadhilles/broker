<?php

namespace app\Http\Middleware;

use Closure;

class HouseWroker
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

        if (Auth()->check() && $request->User()->role == 2) {

            return $next($request);
        }
        return redirect()->back();
    }
}

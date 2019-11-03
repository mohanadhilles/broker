<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Localization
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
        if (\Illuminate\Support\Facades\Session::has('locale')){
            App::setLocale(\Illuminate\Support\Facades\Session::get('locale'));
        }
        return $next($request);
    }
}

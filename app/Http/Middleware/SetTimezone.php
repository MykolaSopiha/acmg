<?php

namespace App\Http\Middleware;

use Closure;

class SetTimezone
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
        if (auth()->user()) {
            date_default_timezone_set(auth()->user()->timezone);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetLocale
{
    /**
     * Allowed languages
     * @var array
     */
    protected $languages = ['en', 'ru', 'ua', 'kz'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()) {
            if (!is_null(Auth::user()->country->code) && in_array(strtolower(Auth::user()->country->code), $this->languages)) {
                $locale = strtolower(Auth::user()->country->code);
                $locale = ($locale == 'ua' || $locale == 'kz' || $locale == 'by') ? 'ru' : $locale;
                App::setLocale($locale);
            }
        }
        return $next($request);
    }
}

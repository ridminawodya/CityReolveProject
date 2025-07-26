<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if 'locale' is set in the session and if it's an available locale
        if (Session::has('locale') && array_key_exists(Session::get('locale'), config('app.available_locales'))) {
            App::setLocale(Session::get('locale'));
        } else {
            // Optionally, try to set locale based on browser preference if no session locale is set
            // $browserLang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            // if (array_key_exists($browserLang, config('app.available_locales'))) {
            //     App::setLocale($browserLang);
            //     Session::put('locale', $browserLang); // Store for future requests
            // } else {
                App::setLocale(config('app.fallback_locale')); // Fallback to default
            // }
        }

        return $next($request);
    }
}
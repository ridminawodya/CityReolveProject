<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Check if the user is authenticated.
            if (Auth::guard($guard)->check()) {
                // If they are, redirect them to the home page (which is the dashboard).
                // Do NOT add role-based logic here to avoid a redirect loop.
                return redirect(AppServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role = null): Response
    {
        // 1. Check if the user is authenticated. If not, redirect to login.
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // 2. Handle the specific case where 'citizen' and 'user' roles are allowed for the 'citizen' route.
        // This is a more robust way to handle multiple roles for a single route.
        if ($role === 'citizen') {
            if ($user->role === 'citizen' || $user->role === 'user') {
                return $next($request);
            }
        }

        // 3. For all other roles, perform a strict check.
        // This handles cases like 'role:admin'.
        if ($user->role === $role) {
            return $next($request);
        }

        // 4. If none of the above conditions are met, the user is not authorized.
        abort(403, 'Unauthorized action.');
    }
}

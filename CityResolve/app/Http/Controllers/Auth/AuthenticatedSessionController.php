<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user.
        $request->authenticate();

        // Regenerate the session to prevent session fixation attacks.
        $request->session()->regenerate();

        // Get the authenticated user.
        $user = Auth::user();

        // Now, we'll check the user's role immediately after authentication.
        if ($user->role === 'admin') {
            // Redirect admin users to their specific dashboard.
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        if ($user->role === 'citizen'|| $user->role === 'user') {
            // Redirect citizen users to their specific dashboard.
            return redirect()->intended(route('citizen.dashboard', absolute: false));
        }

        // For any other roles or if no role is found,
        // redirect to a general, safe dashboard route.
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        // Check if the user is authenticated.
        if (Auth::check()) {
            $user = Auth::user();

            // The original error was using hasRole as a property ($user->hasRole)
            // It should be a method with the role name as a parameter ($user->hasRole('role-name'))
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'citizen' || $user->role === 'user') {
                return redirect()->route('citizen.dashboard');
            }
        }
        
        // If the user is authenticated but has no recognized role, or if they are not authenticated,
        // we'll redirect them to the home page. The 'auth' middleware should prevent unauthenticated
        // users from reaching this point, but this is a safe fallback.
        return redirect('/');
    }
}

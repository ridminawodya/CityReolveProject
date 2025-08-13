<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Don't forget to import the User model
use App\Models\Department; // Don't forget to import the Department model

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch the users and departments and pass them to the view
        $users = User::all();
        $departments = Department::all();
        return view('admin.dashboard', compact('users', 'departments'));
    }

    /**
     * Redirect users to the appropriate dashboard based on their user type.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
     */
    public function redirectToDashboard()
    {
        if (Auth::user()->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        // Return the regular dashboard view directly instead of redirecting.
        return view('/');
    }
}

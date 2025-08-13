<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch a count of all users
        $totalUsers = User::count();

        // Fetch a count of active and inactive users
        $activeUsers = User::where('status', 'active')->count();
        $inactiveUsers = User::where('status', 'inactive')->count();

        // Fetch a count of all departments
        $totalDepartments = Department::count();

        // Fetch new users for the week and month
        $newUsersThisWeek = User::where('created_at', '>=', now()->startOfWeek())->count();
        $newUsersThisMonth = User::where('created_at', '>=', now()->startOfMonth())->count();

        // Fetch the 5 most recent users for the table
        $recentUsers = User::with('department')
            ->latest()
            ->take(5)
            ->get();

        // Get the current date for the header
        $currentDate = now()->format('M d, Y');

        // Pass all the data to the dashboard view
        return view('dashboard', compact(
            'totalUsers',
            'activeUsers',
            'inactiveUsers',
            'totalDepartments',
            'newUsersThisWeek',
            'newUsersThisMonth',
            'recentUsers',
            'currentDate'
        ));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Complaint;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Your existing data
        $users = User::all();
        $departments = Department::all();
        
        // Calculate statistics
        $totalUsers = User::count();
        $totalDepartments = Department::count();
        $newUsersThisWeek = User::where('created_at', '>=', Carbon::now()->subWeek())->count();
        
        // Add complaint statistics
        $totalComplaints = Complaint::count();
        $pendingComplaints = Complaint::where('status', 'pending')->count();
        $resolvedThisWeek = Complaint::where('status', 'resolved')
                                   ->where('updated_at', '>=', Carbon::now()->subWeek())
                                   ->count();
        
        // Get recent users for the table
        $recentUsers = User::latest()->take(5)->get();
        
        // Get recent complaints for dashboard (optional)
        $recentComplaints = Complaint::latest()->take(5)->get();
        
        $currentDate = Carbon::now()->format('F j, Y');

        return view('admin.dashboard', compact(
            'users',
            'departments',
            'totalUsers',
            'totalDepartments', 
            'newUsersThisWeek',
            'totalComplaints',
            'pendingComplaints',
            'resolvedThisWeek',
            'recentUsers',
            'recentComplaints',
            'currentDate'
        ));
    }
}
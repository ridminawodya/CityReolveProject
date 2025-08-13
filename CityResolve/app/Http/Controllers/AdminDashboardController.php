<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class AdminDashboardController extends Controller
{
    public function index()
{
    return view('admin.dashboard', [
        'users' => User::all(),
        'departments' => Department::all(), // If you have this model
    ]);
}
}

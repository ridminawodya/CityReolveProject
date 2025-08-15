<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('users')->latest()->paginate(10);
        return view('admin.departments.index', compact('departments'));
    }
    
    public function create()
    {
        return view('admin.departments.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'description' => 'nullable|string|max:500'
        ]);
        
        Department::create($validated);
        
        return redirect()->route('admin.departments.index')
                        ->with('success', 'Department created successfully!');
    }
    
    public function show(Department $department)
    {
        $department->load(['users' => function($query) {
            $query->latest();
        }]);
        
        return view('admin.departments.show', compact('department'));
    }
    
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }
    
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('departments', 'name')->ignore($department->id)],
            'description' => 'nullable|string|max:500'
        ]);
        
        $department->update($validated);
        
        return redirect()->route('admin.departments.index')
                        ->with('success', 'Department updated successfully!');
    }
    
    public function destroy(Department $department)
    {
        // Check if department has users
        if ($department->users()->count() > 0) {
            return redirect()->route('admin.departments.index')
                           ->with('error', 'Cannot delete department with assigned users!');
        }
        
        $department->delete();
        
        return redirect()->route('admin.departments.index')
                        ->with('success', 'Department deleted successfully!');
    }
}
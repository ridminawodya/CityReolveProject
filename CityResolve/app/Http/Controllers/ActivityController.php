<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of activities.
     */
    public function index()
    {
        // Get activities with pagination (15 items per page)
        $activities = Activity::latest()
            ->with('user') // Assuming you have a user relationship
            ->paginate(15);

        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new activity (if needed).
     */
    public function create()
    {
        // Typically activities are created automatically, not through forms
        abort(404);
    }

    /**
     * Store a newly created activity (usually handled automatically).
     */
    public function store(Request $request)
    {
        // Activities are usually created through system events, not forms
        abort(404);
    }

    /**
     * Display the specified activity.
     */
    public function show(Activity $activity)
    {
        return view('admin.activities.show', compact('activity'));
    }

    /**
     * Remove the specified activity from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        
        return redirect()
            ->route('admin.activities.index')
            ->with('success', 'Activity log deleted successfully');
    }

    /**
     * Clear all activity logs.
     */
    public function clearAll()
    {
        Activity::truncate();
        
        return redirect()
            ->route('admin.activities.index')
            ->with('success', 'All activity logs have been cleared');
    }
}
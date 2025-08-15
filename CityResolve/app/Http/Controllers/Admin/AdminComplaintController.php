<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminComplaintController extends Controller
{
    /**
     * Display a listing of complaints for admin
     */
    public function index(Request $request)
    {
        $query = Complaint::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $complaints = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * Display the specified complaint
     */
    public function show(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    /**
     * Update complaint status and admin notes
     */
    public function updateStatus(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved,closed',
            'admin_notes' => 'nullable|string'
        ]);

        $complaint->update($validated);

        return redirect()->back()->with('success', 'Complaint status updated successfully!');
    }

    /**
     * Delete complaint
     */
    public function destroy(Complaint $complaint)
    {
        // Delete photo if exists
        if ($complaint->photo) {
            Storage::disk('public')->delete($complaint->photo);
        }

        $complaint->delete();

        return redirect()->route('admin.complaints.index')->with('success', 'Complaint deleted successfully!');
    }

    /**
     * Get complaint statistics for dashboard
     */
    public function getStats()
    {
        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'in_progress' => Complaint::where('status', 'in_progress')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
            'closed' => Complaint::where('status', 'closed')->count(),
            'recent' => Complaint::where('created_at', '>=', now()->subDays(7))->count()
        ];

        return $stats;
    }

    /**
     * Export complaints to CSV
     */
    public function export(Request $request)
    {
        $query = Complaint::query();

        // Apply same filters as index
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $complaints = $query->orderBy('created_at', 'desc')->get();

        $csvData = "ID,Name,Email,Contact,Category,Location,Status,Description,Submitted Date,Last Updated\n";

        foreach ($complaints as $complaint) {
            $csvData .= sprintf(
                "%s,%s,%s,%s,%s,%s,%s,\"%s\",%s,%s\n",
                $complaint->id,
                $complaint->full_name,
                $complaint->email,
                $complaint->contact_no,
                ucwords(str_replace('-', ' ', $complaint->category)),
                $complaint->location,
                ucwords(str_replace('_', ' ', $complaint->status)),
                str_replace('"', '""', $complaint->description), // Escape quotes in description
                $complaint->created_at->format('Y-m-d H:i:s'),
                $complaint->updated_at->format('Y-m-d H:i:s')
            );
        }

        $filename = 'complaints_export_' . date('Y-m-d_H-i-s') . '.csv';

        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    /**
     * Bulk update status for multiple complaints
     */
    public function bulkUpdateStatus(Request $request)
    {
        $validated = $request->validate([
            'complaint_ids' => 'required|array',
            'complaint_ids.*' => 'exists:complaints,id',
            'status' => 'required|in:pending,in_progress,resolved,closed',
            'admin_notes' => 'nullable|string'
        ]);

        $updatedCount = Complaint::whereIn('id', $validated['complaint_ids'])
            ->update([
                'status' => $validated['status'],
                'admin_notes' => $validated['admin_notes'] ?? null,
                'updated_at' => now()
            ]);

        return redirect()->back()->with('success', "Successfully updated {$updatedCount} complaints.");
    }
}
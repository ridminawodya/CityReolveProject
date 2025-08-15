<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    /**
     * Store a newly created complaint (public form submission)
     */
    public function store(Request $request)
    {
        try {
            // 1. Validate the incoming request data
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'contact_no' => 'required|string|max:20',
                'category' => 'required|string|max:255',
                'description' => 'required|string',
                'location' => 'required|string|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB max
            ]);

            // 2. Handle the photo upload
            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('complaints_photos', 'public');
                $validatedData['photo'] = $imagePath;
            }

            // 3. Set default status
            $validatedData['status'] = 'pending';

            // 4. Create a new Complaint instance and save it to the database
            $complaint = Complaint::create($validatedData);

            // 5. Return a JSON response for AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true, 
                    'message' => 'Complaint submitted successfully! Your complaint ID is #' . $complaint->id,
                    'complaint_id' => $complaint->id
                ]);
            }

            // 6. For regular form submission, redirect with success message
            return redirect()->route('home')->with('success', 'Complaint submitted successfully! Your complaint ID is #' . $complaint->id);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please check the form and try again.',
                    'errors' => $e->errors()
                ], 422);
            }
            
            return redirect()->back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            // Handle any other errors
            \Log::error('Complaint submission error: ' . $e->getMessage());
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while submitting your complaint. Please try again.'
                ], 500);
            }
            
            return redirect()->back()->with('error', 'An error occurred. Please try again.')->withInput();
        }
    }

    /**
     * Get complaint status for tracking (public API)
     * Updated to return more detailed information
     */
    public function getComplaintStatus($id)
    {
        $complaint = Complaint::find($id);
        
        if (!$complaint) {
            return response()->json([
                'success' => false,
                'error' => 'Complaint not found. Please check your Complaint ID and try again.'
            ], 404);
        }

        // Define status mappings for better display
        $statusLabels = [
            'pending' => 'Pending Review',
            'in_progress' => 'In Progress', 
            'resolved' => 'Resolved',
            'closed' => 'Closed'
        ];

        return response()->json([
            'success' => true,
            'id' => $complaint->id,
            'status' => $complaint->status,
            'status_label' => $statusLabels[$complaint->status] ?? ucfirst($complaint->status),
            'category' => $complaint->category,
            'description' => $complaint->description,
            'location' => $complaint->location,
            'first_name' => $complaint->first_name,
            'last_name' => $complaint->last_name,
            'email' => $complaint->email,
            'contact_no' => $complaint->contact_no,
            'admin_notes' => $complaint->admin_notes ?? null,
            'created_at' => $complaint->created_at->format('F j, Y g:i A'),
            'updated_at' => $complaint->updated_at->format('F j, Y g:i A'),
        ]);
    }

    /**
     * Additional method for POST requests to track complaints
     * This allows both GET and POST tracking
     */
    public function trackComplaint(Request $request)
    {
        $request->validate([
            'complaint_id' => 'required|string|max:255'
        ]);

        $complaintId = trim($request->input('complaint_id'));
        
        // Try to find the complaint by ID
        $complaint = Complaint::find($complaintId);
        
        if (!$complaint) {
            return response()->json([
                'success' => false,
                'message' => 'Complaint not found. Please check your Complaint ID and try again.'
            ], 404);
        }

        // Define status mappings
        $statusLabels = [
            'pending' => 'Pending Review',
            'in_progress' => 'In Progress', 
            'resolved' => 'Resolved',
            'closed' => 'Closed'
        ];

        return response()->json([
            'success' => true,
            'complaint' => [
                'id' => $complaint->id,
                'status' => $complaint->status,
                'status_label' => $statusLabels[$complaint->status] ?? ucfirst($complaint->status),
                'category' => $complaint->category,
                'description' => $complaint->description,
                'location' => $complaint->location,
                'first_name' => $complaint->first_name,
                'last_name' => $complaint->last_name,
                'email' => $complaint->email,
                'contact_no' => $complaint->contact_no,
                'admin_notes' => $complaint->admin_notes ?? null,
                'submitted_date' => $complaint->created_at->format('F j, Y g:i A'),
                'last_updated' => $complaint->updated_at->format('F j, Y g:i A'),
                'photo' => $complaint->photo ? asset('storage/' . $complaint->photo) : null,
            ]
        ]);
    }
}
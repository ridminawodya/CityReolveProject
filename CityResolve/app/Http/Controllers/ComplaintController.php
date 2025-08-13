<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'contact_no' => 'required|string|max:20',
        'category' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'nullable|string|max:255',
        'photo' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('complaints', 'public');
        $validated['photo'] = $photoPath;
    }

    $complaint = Complaint::create($validated);

    return redirect()->route('complaints.show', $complaint->id)->with('success', 'Complaint submitted successfully!');
}
}

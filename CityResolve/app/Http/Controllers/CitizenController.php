<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Profile; // Import the new Profile model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App; // Import the App facade for PDF generation

class CitizenController extends Controller
{
    /**
     * Display the citizen dashboard with user data and payments.
     */
    public function index()
    {
        // Fetch the authenticated user's latest data, eager loading the profile
        $user = Auth::user()->load('profile');

        // Fetch the actual total tax contributions from the 'payments' table
        $totalContributions = Payment::where('user_id', $user->id)
                                     ->where('status', 'paid')
                                     ->sum('amount');

        // Fetch the user's department name
        $departmentName = 'Public Works'; // This should likely be fetched dynamically

        // Fetch a list of the user's payments from the database
        $payments = Payment::where('user_id', $user->id)
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('citizen.dashboard', compact('user', 'totalContributions', 'departmentName', 'payments'));
    }

    /**
     * Display the form to edit the citizen's profile.
     */
    public function editProfile()
    {
        // Eager load the profile to ensure it's available in the view
        $user = Auth::user()->load('profile');
        return view('citizen.profile.edit', compact('user'));
    }

    /**
     * Update the citizen's profile in the database.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the profile data separately from the user data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        // Update the user's name and email
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Find or create the profile and update the address and phone
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
            ]
        );

        return Redirect::route('citizen.dashboard')->with('success', 'Profile updated successfully.');
    }
    
    /**
     * Display the form for making a new payment.
     */
    public function createPayment()
    {
        return view('citizen.payments.create');
    }

    /**
     * Handle the form submission and store the new payment in the database.
     */
    public function storePayment(Request $request)
    {
        // 1. Validate the incoming request data.
        $validatedData = $request->validate([
            'tax_type' => 'required|string',
            'tax_year' => 'required|integer',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|string',
            'email' => 'required|email',
            // Add other validation rules here based on the selected payment method (e.g., card details)
            'card_name' => 'required_if:payment_method,credit_card|string',
            'card_number' => 'required_if:payment_method,credit_card|string',
            'expiry_date' => 'required_if:payment_method,credit_card|string',
            'cvv' => 'required_if:payment_method,credit_card|string',
            'bank_name' => 'required_if:payment_method,bank_transfer|string',
            'account_type' => 'required_if:payment_method,bank_transfer|string',
            'routing_number' => 'required_if:payment_method,bank_transfer|string',
            'account_number' => 'required_if:payment_method,bank_transfer|string',
            'paypal_email' => 'required_if:payment_method,paypal|email',
        ]);
        
        // 2. Process the payment with a payment gateway.
        // For this example, we'll assume it's successful.

        // 3. Create a new payment record in the database.
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'tax_type' => $validatedData['tax_type'],
            'tax_year' => $validatedData['tax_year'],
            'amount' => $validatedData['amount'],
            'payment_method' => $validatedData['payment_method'],
            'status' => 'paid',
            'reference_number' => 'TXN-' . now()->timestamp . '-' . auth()->id(), // Generate a unique reference
        ]);
        
        // 4. Redirect the user to the new payment success page, passing the payment ID.
        return redirect()->route('citizen.payments.success', $payment->id);
    }

    /**
     * Show the payment success page.
     * The payment is automatically retrieved by Laravel using route model binding.
     */
    public function successPayment(Payment $payment)
    {
        // Security check: ensure the payment belongs to the authenticated user.
        if (Auth::id() !== $payment->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('citizen.payments.success', compact('payment'));
    }

    /**
     * Download the PDF receipt for a specific payment.
     * The payment is automatically retrieved by Laravel using route model binding.
     */
    public function downloadReceipt($paymentId)
{
    // 1. Find the payment that belongs to the authenticated user.
    $payment = Payment::where('id', $paymentId)
                      ->where('user_id', Auth::id())
                      ->first();

    // 2. If no payment is found, the user is not authorized to view it.
    if (!$payment) {
        abort(403, 'Unauthorized action.');
    }

    // 3. Generate the PDF from the Blade view.
    // This assumes you have installed and configured a PDF library like dompdf.
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('pdfs.receipt', compact('payment'));
    
    // 4. Return the PDF as a downloadable file with a specific name.
    return $pdf->download('tax-receipt-' . $payment->reference_number . '.pdf');
}
}

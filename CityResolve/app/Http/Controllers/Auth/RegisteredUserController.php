<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'phone' => ['required', 'string', 'max:20'],
            'user_type' => ['required', 'string', Rule::in(['citizen', 'business', 'organization'])],
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)], // Assuming username is unique
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:10'],
            'terms' => ['accepted'], // Ensures the checkbox is check
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name, // Save new field
            'last_name' => $request->last_name,   // Save new field
            'phone' => $request->phone,           // Save new field
            'user_type' => $request->user_type,   // Save new field
            'username' => $request->username,     // Save new field (if separate)
            'address' => $request->address,       // Save new field
            'city' => $request->city,             // Save new field
            'postal_code' => $request->postal_code, // Save new field
            'terms' => $request->boolean('terms'), // Save checkbox value
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}

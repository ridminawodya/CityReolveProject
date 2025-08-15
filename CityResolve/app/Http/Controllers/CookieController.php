<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    // The index method, which handles displaying the homepage
    public function index(Request $request)
    {
        // Check if the 'policy_accepted' cookie exists in the request
        $hasAccepted = $request->cookie('policy_accepted') !== null;

        // Pass the $hasAccepted variable to the home view
        return view('home', ['hasAccepted' => $hasAccepted]);
    }

    // The method to handle the form submission for accepting the cookie policy
    public function accept(Request $request)
    {
        // Create a new response instance
        $response = new Response();

        // Add a 'policy_accepted' cookie to the response.
        // It will be valid for one year (525600 minutes).
        $response->withCookie(cookie('policy_accepted', true, 525600));

        // Redirect the user back to the homepage
        return redirect('/')->withCookie(cookie('policy_accepted', true, 525600));
    }
}

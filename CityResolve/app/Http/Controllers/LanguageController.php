<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        $locale = $request->input('locale');

        // Ensure the selected locale is one of the supported ones
        // 'app.supported_locales' should be defined in config/app.php
        if (in_array($locale, array_keys(config('app.supported_locales')))) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return redirect()->back(); // Redirect back to the previous page
    }
}
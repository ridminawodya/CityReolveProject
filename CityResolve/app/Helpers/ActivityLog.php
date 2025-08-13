<?php

namespace App\Helpers;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityLog
{
    public static function add(string $description, array $properties = [])
    {
        Activity::create([
            'user_id' => Auth::id(),
            'description' => $description,
            'properties' => $properties,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);
    }
}
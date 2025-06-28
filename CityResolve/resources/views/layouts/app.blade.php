<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'CityResolve') }}</title>

    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    @vite(['resources/css/app.css']) {{-- This will include Bootstrap CSS --}}
</head>
<body>
    <div id="app">
        {{-- This is where the content of individual pages will be injected --}}
        @yield('content')
    </div>

    @vite(['resources/js/app.js']) {{-- This will include Bootstrap JS --}}
</body>
</html>
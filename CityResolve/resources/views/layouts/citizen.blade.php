<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Citizen Dashboard</title> {{-- Changed the title to reflect the citizen's perspective --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden mt-8">
        {{-- The sidebar for the citizen panel --}}
        <aside class="w-full md:w-64 bg-gradient-to-br from-blue-600 to-blue-800 text-white p-4 flex flex-col items-center">
            <h2 class="text-3xl font-bold mb-6 text-center">Citizen Panel</h2>
            <nav class="w-full">
                <a href="{{ route('citizen.dashboard') }}" class="block p-3 rounded-lg text-lg font-medium hover:bg-blue-500 transition-colors duration-200 ease-in-out">
                    Dashboard
                </a>
                <a href="{{ route('citizen.profile.edit') }}" class="block p-3 rounded-lg text-lg font-medium hover:bg-blue-500 transition-colors duration-200 ease-in-out">
                    My Profile
                </a>
                <a href="{{ route('citizen.payments.create') }}" class="block p-3 rounded-lg text-lg font-medium hover:bg-blue-500 transition-colors duration-200 ease-in-out">
                    Tax Payments
                </a>
            </nav>
        </aside>

        {{-- The main content area where child views will be rendered --}}
        <main class="flex-1 p-6 md:p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>

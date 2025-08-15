<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden">
        <aside class="w-full md:w-64 bg-gradient-to-br from-green-700 to-green-900 text-white p-4">
            <nav>
                <a href="{{ route('dashboard') }}" class="block p-3 hover:bg-green-600">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="block p-3 hover:bg-green-600">User Management</a>
                <a href="{{ route('admin.departments.index') }}" class="block p-3 hover:bg-green-600">Department Management</a>
                <a href="{{ route('admin.fund-taxes.index') }}" class="block p-3 hover:bg-green-600">Fund Allocations</a>
            </nav>
        </aside>

        <main class="flex-1 p-6 md:p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
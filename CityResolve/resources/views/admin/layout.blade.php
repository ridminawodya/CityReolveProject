<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .sidebar {
            width: 250px;
            background-color: #1f2937;
            color: white;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .sidebar-link {
            display: block;
            padding: 12px 20px;
            color: #d1d5db;
            text-decoration: none;
            border-bottom: 1px solid #374151;
            transition: background-color 0.3s;
        }
        
        .sidebar-link:hover {
            background-color: #374151;
            color: white;
        }
        
        .sidebar-link.active {
            background-color: #3b82f6;
            color: white;
        }
        
        .sidebar-header {
            padding: 20px;
            background-color: #111827;
            border-bottom: 1px solid #374151;
        }
        
        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
        }
        
        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }
        
        .btn-success {
            background-color: #10b981;
            color: white;
        }
        
        .btn-danger {
            background-color: #ef4444;
            color: white;
        }
        
        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .table th {
            background-color: #f9fafb;
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 16px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 4px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        
        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }
        
        .search-form {
            margin-bottom: 20px;
        }
        
        .search-input {
            display: inline-block;
            width: 300px;
            margin-right: 10px;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="sidebar">
        <div class="sidebar-header">
            <h2 class="text-xl font-bold">Admin Panel</h2>
        </div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                User Management
            </a>
            <a href="{{ route('admin.departments.index') }}" class="sidebar-link {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}">
                Department Management
            </a>
            <a href="{{ route('admin.fund-taxes.index') }}" class="sidebar-link {{ request()->routeIs('admin.fund-taxes.*') ? 'active' : '' }}">
                Fund & Tax Management
            </a>
        </nav>
    </div>

    <div class="main-content">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>


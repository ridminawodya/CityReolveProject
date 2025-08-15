<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html, body {
            height: 100%;
            font-family: 'figtree', sans-serif;
            background-color: #f1f5f9;
        }

        /* Fixed Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #ffffff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
            z-index: 1000;
            overflow-y: auto;
        }
        
        .sidebar-header {
            text-align: center;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        .sidebar-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
        }

        .sidebar-header p {
            font-size: 0.875rem;
            color: #4a5568;
            margin: 0;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li {
            margin: 0;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            color: #4a5568;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
            background: none;
        }

        .sidebar-nav a:hover {
            background-color: #e2e8f0;
            color: #10b981;
        }

        .sidebar-nav a.active {
            color: white;
            background-color: #10b981;
            box-shadow: inset 5px 0 0 #059669;
        }
        
        .sidebar-nav a.active .menu-icon {
            color: white;
        }

        .menu-icon {
            font-size: 1.2rem;
            width: 20px;
            text-align: center;
            color: #a0aec0;
        }

        .sidebar-nav a:hover .menu-icon {
            color: #10b981;
        }

        .sidebar-nav a.active:hover .menu-icon {
            color: white;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            padding: 30px;
            background-color: #f1f5f9;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-menu-btn {
                display: block;
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 1001;
                background: #10b981;
                color: white;
                border: none;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
            }
        }

        .mobile-menu-btn {
            display: none;
        }

        /* Ensure no conflicts with page content */
        .main-content * {
            position: relative;
        }
    </style>
    
    <!-- Additional styles from individual pages -->
    @stack('styles')
</head>
<body>
    <!-- Mobile menu button -->
    <button class="mobile-menu-btn" onclick="toggleMobileSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Fixed Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h1>Admin Portal</h1>
            <p>Management Dashboard</p>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-chart-line menu-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="fas fa-users menu-icon"></i>
                        <span>User Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.departments.index') }}" class="{{ request()->routeIs('admin.departments.*') ? 'active' : '' }}">
                        <i class="fas fa-building menu-icon"></i>
                        <span>Department Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.fund-taxes.index') }}" class="{{ request()->routeIs('admin.fund-taxes.*') ? 'active' : '' }}">
                        <i class="fas fa-dollar-sign menu-icon"></i>
                        <span>Tax Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.complaints.index') }}" class="{{ request()->routeIs('admin.complaints.*') ? 'active' : '' }}">
                        <i class="fas fa-exclamation-circle menu-icon"></i>
                        <span>Complaint Management</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- JavaScript -->
    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('mobile-open');
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnMenuBtn = menuBtn.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnMenuBtn && window.innerWidth <= 768) {
                sidebar.classList.remove('mobile-open');
            }
        });
    </script>
    
    <!-- Additional scripts from individual pages -->
    @stack('scripts')
</body>
</html>
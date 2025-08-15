<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --primary-dark: linear-gradient(135deg, #059669 0%, #047857 100%);
            --secondary: linear-gradient(135deg, #34d399 0%, #10b981 100%);
            --success: linear-gradient(135deg, #6ee7b7 0%, #34d399 100%);
            --warning: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            --danger: linear-gradient(135deg, #f87171 0%, #ef4444 100%);
            --info: linear-gradient(135deg, #a7f3d0 0%, #6ee7b7 100%);
            --dark: #1a202c;
            --darker: #161b22;
            --light: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 50%, #dcfce7 100%);
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        .bg-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) { width: 80px; height: 80px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 120px; height: 120px; left: 20%; animation-delay: 2s; }
        .particle:nth-child(3) { width: 60px; height: 60px; left: 60%; animation-delay: 4s; }
        .particle:nth-child(4) { width: 100px; height: 100px; left: 80%; animation-delay: 1s; }
        .particle:nth-child(5) { width: 40px; height: 40px; left: 90%; animation-delay: 3s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-100px) rotate(180deg); opacity: 0.3; }
        }

        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(16, 185, 129, 0.1);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary);
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
            font-weight: 800;
            box-shadow: var(--shadow-lg);
        }

        .sidebar h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .sidebar-subtitle {
            color: var(--gray-500);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .sidebar-nav {
            flex-grow: 1;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-section-title {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
            padding-left: 1rem;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            padding: 0.875rem 1rem;
            margin-bottom: 0.5rem;
            color: var(--gray-600);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .nav-item:hover::before,
        .nav-item.active::before {
            left: 0;
        }

        .nav-item:hover,
        .nav-item.active {
            color: white;
            transform: translateX(5px);
        }

        .nav-icon {
            font-size: 1.25rem;
            margin-right: 0.875rem;
            width: 20px;
            text-align: center;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--secondary);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-weight: 600;
        }

        .main-content {
            flex-grow: 1;
            padding: 2rem;
            overflow-y: auto;
            background: rgba(255, 255, 255, 0.05);
        }

        .header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.1);
        }

        .header-content h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
            background: var(--primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-content p {
            color: var(--gray-500);
            font-weight: 500;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: var(--shadow);
        }
        
        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.125rem;
        }

        .user-details h4 {
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.125rem;
        }

        .user-details span {
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(16, 185, 129, 0.1);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
            transition: all 0.4s ease;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary);
        }
        
        .stat-card:nth-child(2)::before { background: linear-gradient(135deg, #34d399 0%, #10b981 100%); }
        .stat-card:nth-child(3)::before { background: linear-gradient(135deg, #6ee7b7 0%, #34d399 100%); }
        .stat-card:nth-child(4)::before { background: linear-gradient(135deg, #a7f3d0 0%, #6ee7b7 100%); }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-2xl);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }
        
        .stat-card:nth-child(1) .stat-icon { background: var(--primary); }
        .stat-card:nth-child(2) .stat-icon { background: linear-gradient(135deg, #34d399 0%, #10b981 100%); }
        .stat-card:nth-child(3) .stat-icon { background: linear-gradient(135deg, #6ee7b7 0%, #34d399 100%); }
        .stat-card:nth-child(4) .stat-icon { background: linear-gradient(135deg, #a7f3d0 0%, #6ee7b7 100%); }

        .stat-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--gray-800);
            margin-bottom: 1rem;
        }
        
        .stat-change {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .stat-change.positive {
            color: #10b981;
        }

        .stat-change.negative {
            color: #ef4444;
        }
        
        .stat-change-icon {
            margin-right: 0.25rem;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.1);
            overflow: hidden;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .table-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-800);
        }

        .table-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-600);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .recent-users-table {
            width: 100%;
            border-collapse: collapse;
        }

        .recent-users-table th {
            text-align: left;
            padding: 1rem;
            font-weight: 600;
            color: var(--gray-600);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--gray-200);
        }

        .recent-users-table td {
            padding: 1rem;
            color: var(--gray-600);
            border-bottom: 1px solid var(--gray-100);
        }

        .recent-users-table tbody tr {
            transition: all 0.2s ease;
        }

        .recent-users-table tbody tr:hover {
            background: var(--gray-50);
            transform: scale(1.01);
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .user-cell-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }
        
        .user-cell-info h5 {
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.125rem;
        }
        
        .user-cell-info span {
            font-size: 0.875rem;
            color: var(--gray-500);
        }
        
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .status-active {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }
        
        .status-inactive {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }
        
        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }
        
        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                padding: 1rem;
            }
            .main-content {
                padding: 1rem;
            }
            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="bg-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">A</div>
            <h1>Admin Portal</h1>
            <p class="sidebar-subtitle">Management Dashboard</p>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Main</div>
                <a href="{{ route('admin.dashboard') }}" class="nav-item active">
                    <span class="nav-icon">🏠</span>
                    Dashboard
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">Management</div>
                <a href="{{ route('admin.users.index') }}" class="nav-item">
                    <span class="nav-icon">👥</span>
                    User Management
                </a>
                <a href="{{ route('admin.departments.index') }}" class="nav-item">
                    <span class="nav-icon">🏢</span>
                    Department Management
                </a>
                <a href="{{ route('admin.fund-taxes.index') }}" class="nav-item">
                    <span class="nav-icon">💰</span>
                    Tax Management
                </a>
                <a href="{{ route('admin.complaints.index') }}" class="nav-item">
                    <span class="nav-icon">⚠️</span>
                    Complaint Management
                </a>
            </div>
        </nav>
    </aside>

    <main class="main-content">
        <header class="header">
            <div class="header-content">
                <h2>Admin Dashboard</h2>
                <p>Welcome back! Here's what's happening in your system. @isset($currentDate){{ $currentDate }}@endisset</p>
            </div>
            <div class="user-profile">
                <div class="user-avatar">A</div>
                <div class="user-details">
                    <h4>admin</h4>
                    <span>System Administrator</span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-title">Total Users</div>
                <div class="stat-value">@isset($totalUsers){{ $totalUsers }}@else N/A @endisset</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🏢</div>
                <div class="stat-title">Total Departments</div>
                <div class="stat-value">@isset($totalDepartments){{ $totalDepartments }}@else N/A @endisset</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📈</div>
                <div class="stat-title">New Users This Week</div>
                <div class="stat-value">@isset($newUsersThisWeek){{ $newUsersThisWeek }}@else N/A @endisset</div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h3 class="table-title">Recent Users</h3>
                <div class="table-actions">
                    <button class="btn btn-secondary">Export</button>
                    <button class="btn btn-primary">Add User</button>
                </div>
            </div>
            <table class="recent-users-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @empty($recentUsers)
                        <tr>
                            <td colspan="5" style="text-align: center;">No recent users found.</td>
                        </tr>
                    @else
                        @foreach($recentUsers as $user)
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-cell-avatar">{{ substr($user->name, 0, 2) }}</div>
                                        <div class="user-cell-info">
                                            <h5>{{ $user->name }}</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td><span class="status-badge status-{{ strtolower($user->status) }}">{{ $user->status }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
                                <td>
                                    <button class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;">View</button>
                                </td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
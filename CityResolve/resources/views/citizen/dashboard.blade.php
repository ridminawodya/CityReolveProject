@extends('layouts.citizen')

@section('content')
<style>
    /* Define CSS variables for consistency */
    :root {
        --primary: linear-gradient(135deg, #10b981 0%, #059669 100%);
        --primary-hover: #43A047;
        --secondary-color: #F8F9FA;
        --card-bg: #FFFFFF;
        --text-color: #333333;
        --label-color: #6B7280;
        --border-color: #E5E7EB;
        --shadow-medium: rgba(0, 0, 0, 0.1);

        /* New variables from admin dashboard */
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
        color: var(--gray-800);
        background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 50%, #dcfce7 100%);
        min-height: 100vh;
        padding: 2rem;
        overflow-x: hidden;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.1);
    }

    .page-header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--gray-800);
        background: var(--primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .section-header h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--gray-800);
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .dashboard-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
        text-align: center;
        border: 1px solid rgba(16, 185, 129, 0.1);
        transition: all 0.4s ease;
        position: relative;
    }
    
    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary);
    }
    
    .dashboard-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-2xl);
    }

    .dashboard-card h3 {
        font-size: 0.875rem;
        color: var(--gray-500);
        margin-bottom: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .dashboard-card .value {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--gray-800);
        background: var(--primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .table-container {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);
        overflow: hidden;
        margin-bottom: 2rem;
        border: 1px solid rgba(16, 185, 129, 0.1);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 1.5rem;
        text-align: left;
        border-bottom: 1px solid var(--gray-200);
    }

    .table th {
        font-weight: 600;
        color: var(--gray-600);
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: var(--gray-50);
        transform: scale(1.01);
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .badge.success {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
    }

    .badge.danger {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: var(--shadow-md);
    }

    .btn-primary {
        background: var(--primary);
        color: #fff;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-logout {
        background-color: #EF4444;
        color: #fff;
    }

    .btn-logout:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        background-color: #DC2626;
    }

    .card-body.p-4 {
        padding: 2rem;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .card-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    {{-- KEY CHANGE: Added a logout button --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>

<div class="card-container">
    <div class="dashboard-card">
        <h3>Total Tax Contributions</h3>
        <div class="value">Rs.{{ number_format($totalContributions, 2) }}</div>
    </div>
    <div class="dashboard-card">
        <h3>Latest Payment To (Department)</h3>
        <div class="value">{{ $departmentName }}</div>
    </div>
</div>

<div class="table-container mb-4">
    <div class="section-header px-4 pt-4">
        <h2>My Profile</h2>
        <a href="{{ route('citizen.profile.edit') }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit Profile
        </a>
    </div>
    <div class="card-body p-4">
        <table class="table">
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Address</th>
                {{-- KEY CHANGE: Accessing address from the profile relation --}}
                <td>{{ $user->profile->address ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                {{-- KEY CHANGE: Accessing phone from the profile relation --}}
                <td>{{ $user->profile->phone ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="table-container">
    <div class="section-header px-4 pt-4">
        <h2>Tax Payments</h2>
        <a href="{{ route('citizen.payments.create') }}" class="btn btn-primary">
            <i class="fas fa-credit-card"></i> Make a Payment
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                    <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                    <td><span class="badge {{ $payment->status === 'paid' ? 'success' : 'danger' }}">{{ $payment->status }}</span></td>
                    <td>
                        <a href="{{ route('citizen.payments.downloadReceipt', $payment->id) }}" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                            <i class="fas fa-download"></i> Download
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No transactions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
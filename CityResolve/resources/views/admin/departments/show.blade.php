@extends('admin.layout')

@section('content')
<!-- Add the CSS directly in a style tag for this page -->
<style>
/* Import a nice font and icon library */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

/* Define CSS variables for easy color management */
:root {
    --primary-color: #4CAF50;
    --primary-hover: #43A047;
    --secondary-color: #F8F9FA;
    --card-bg: #FFFFFF;
    --text-color: #333333;
    --label-color: #6B7280;
    --border-color: #E5E7EB;
    --shadow-light: rgba(0, 0, 0, 0.05);
    --shadow-medium: rgba(0, 0, 0, 0.1);
    --success-bg: #D1FAE5;
    --success-text: #065F46;
    --danger-bg: #FEE2E2;
    --danger-text: #991B1B;
    --info-color: #3B82F6;
    --info-text: #1E40AF;
    --primary-link-color: #1E40AF;
}

body {
    font-family: 'Inter', sans-serif;
    color: var(--text-color);
    background-color: var(--secondary-color);
}

/* Main container and page header styling */
.container-fluid {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.page-header h1 {
    font-size: 2rem;
    font-weight: 700;
}

/* Card styling for the details and users */
.card {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
    margin-top: 20px;
}

.card-body {
    padding: 24px;
}

/* Table styling for details */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
}

.table th {
    font-weight: 600;
    color: var(--label-color);
    width: 30%;
}

.table tbody tr:last-child th, .table tbody tr:last-child td {
    border-bottom: none;
}

/* User table styling */
.user-table th, .user-table td {
    font-size: 0.9rem;
}

/* Buttons styling */
.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background: var(--primary-color);
    color: #fff;
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    box-shadow: 0 4px 6px rgba(76, 175, 80, 0.2);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
}

.btn-secondary {
    background-color: var(--border-color);
    color: var(--text-color);
}

.btn-secondary:hover {
    background-color: #D1D5DB;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px var(--shadow-medium);
}

/* Badges for status */
.badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: capitalize;
}

.bg-success {
    background-color: var(--success-bg);
    color: var(--success-text);
}

.bg-danger {
    background-color: var(--danger-bg);
    color: var(--danger-text);
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 10px;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<div class="container-fluid">
    <div class="page-header">
        <h1>Department Details</h1>
        <div>
            <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Departments
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $department->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $department->name }}</td>
                    </tr>
                    <tr>
                        <th>Complaints Assigned</th>
                        <td>{{ $department->complaints_assigned }}</td>
                    </tr>
                    <tr>
                        <th>Staff Count</th>
                        <td>{{ $department->staff_count }}</td>
                    </tr>
                    <tr>
                        <th>Actions</th>
                        <td>{{ $department->actions ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $department->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $department->updated_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @if($department->users->count() > 0)
    <div class="card mt-4">
        <div class="card-body">
            <h3 class="text-lg font-bold mb-3">Users in this Department</h3>
            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($department->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <span class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

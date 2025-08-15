@extends('admin.layout')

@section('content')
<!-- Add the CSS directly in a style tag for this page -->
<style>
/* Import a nice font */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

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
}

body {
    font-family: 'Inter', sans-serif;
    color: var(--text-color);
    background-color: var(--secondary-color);
}

/* Main container and page header styling */
.user-management-container {
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

.page-header h2 {
    font-size: 2rem;
    font-weight: 700;
}

/* Action buttons styling */
.actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.back-btn {
    display: inline-block;
    background-color: var(--card-bg);
    border: 1px solid var(--border-color);
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    color: var(--label-color);
    transition: all 0.3s ease;
    box-shadow: 0 1px 2px var(--shadow-light);
}

.back-btn:hover {
    background-color: var(--secondary-color);
    box-shadow: 0 2px 4px var(--shadow-medium);
}

.primary-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    color: #fff;
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    box-shadow: 0 4px 6px rgba(76, 175, 80, 0.2);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.primary-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
}

/* Card styling for the form */
.card {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
}

.card-body {
    padding: 20px;
}

/* User details grid styling */
.user-details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.user-details-grid > div {
    background-color: var(--secondary-color);
    padding: 15px;
    border-radius: 8px;
    border: 1px solid var(--border-color);
    display: flex;
    flex-direction: column;
}

.user-details-grid strong {
    font-size: 0.9rem;
    color: var(--label-color);
    margin-bottom: 5px;
}

.user-details-grid span {
    font-size: 1rem;
    font-weight: 600;
}

/* Badges for status and roles */
.badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: capitalize;
}

.badge.success {
    background-color: #D1FAE5;
    color: #065F46;
}

.badge.danger {
    background-color: #FEE2E2;
    color: #991B1B;
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .actions {
        flex-direction: column;
        align-items: stretch;
    }
}
</style>

<div class="user-management-container">
    <div class="page-header">
        <h2>User Details</h2>
        <div class="actions">
            <a href="{{ route('admin.users.edit', $user) }}" class="primary-btn">Edit</a>
            <a href="{{ route('admin.users.index') }}" class="back-btn">
                &larr; Back to Users
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="user-details-grid">
                <div>
                    <strong>ID</strong>
                    <span>{{ $user->id }}</span>
                </div>
                <div>
                    <strong>Name</strong>
                    <span>{{ $user->name }}</span>
                </div>
                <div>
                    <strong>Email</strong>
                    <span>{{ $user->email }}</span>
                </div>
                <div>
                    <strong>Role</strong>
                    <span>{{ ucfirst($user->role) }}</span>
                </div>
                <div>
                    <strong>Department</strong>
                    <span>{{ $user->department ? $user->department->name : 'N/A' }}</span>
                </div>
                <div>
                    <strong>Status</strong>
                    <span class="badge {{ $user->status === 'active' ? 'success' : 'danger' }}">
                        {{ ucfirst($user->status) }}
                    </span>
                </div>
                <div>
                    <strong>Created At</strong>
                    <span>{{ $user->created_at->format('Y-m-d H:i:s') }}</span>
                </div>
                <div>
                    <strong>Updated At</strong>
                    <span>{{ $user->updated_at->format('Y-m-d H:i:s') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

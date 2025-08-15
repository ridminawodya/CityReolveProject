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
    max-width: 1200px;
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

/* Filter box styling */
.filter-box {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 2px 8px var(--shadow-light);
    padding: 20px;
    margin-bottom: 20px;
}

.filter-box form {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    align-items: flex-end;
}

.filter-group {
    display: flex;
    flex-direction: column;
    flex: 1;
    min-width: 150px;
}

.filter-group label {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--label-color);
}

.filter-group input,
.filter-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.filter-group input:focus,
.filter-group select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
}

.filter-btn {
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    color: #fff;
    background-color: var(--primary-color);
    transition: background-color 0.3s ease;
}

.filter-btn:hover {
    background-color: var(--primary-hover);
}

/* Card styling for the form and table */
.card {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    color: #fff;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h3 {
    font-size: 1.5rem;
    font-weight: 600;
}

.card-body {
    padding: 20px;
}

.secondary-btn {
    padding: 8px 16px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 8px;
    text-decoration: none;
    color: #fff;
    background-color: rgba(255, 255, 255, 0.1);
    transition: background-color 0.2s ease;
}

.secondary-btn:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

/* Table styling */
.table-responsive {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px;
}

table thead tr th {
    text-align: left;
    padding: 15px;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--label-color);
    border-bottom: 2px solid var(--border-color);
}

table tbody tr td {
    padding: 15px;
    border-bottom: 1px solid var(--border-color);
    font-size: 0.95rem;
}

table tbody tr:hover {
    background-color: var(--secondary-color);
}

/* User Info and Avatar */
.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e0f2f1;
    color: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
}

.user-name {
    font-weight: 600;
}

.user-id {
    color: var(--label-color);
    font-size: 0.8rem;
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

.badge.secondary {
    background-color: #E5E7EB;
    color: #4B5563;
}

.badge.success {
    background-color: #D1FAE5;
    color: #065F46;
}

.badge.danger {
    background-color: #FEE2E2;
    color: #991B1B;
}

/* Action buttons */
.actions {
    display: flex;
    gap: 10px;
}

.action-btn {
    padding: 6px 12px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    text-decoration: none;
    color: var(--text-color);
    transition: all 0.2s ease;
}

.action-btn:hover {
    background-color: var(--border-color);
}

.action-btn.danger {
    color: #EF4444;
    border-color: #FCA5A5;
}

.action-btn.danger:hover {
    background-color: #FEE2E2;
}

/* Pagination styling */
.pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}

.pagination > nav > div:first-child > span, .pagination a, .pagination svg {
    border: 1px solid var(--border-color);
    color: var(--text-color);
    padding: 8px 12px;
    border-radius: 6px;
    margin: 0 4px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.pagination > nav > div:first-child > span:hover, .pagination a:hover {
    background-color: var(--secondary-color);
}

.pagination span.page-link.active, .pagination > nav > div:first-child > span.active {
    background-color: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
}

/* Empty state styling */
.empty-state {
    text-align: center;
    padding: 40px 20px;
    border: 2px dashed var(--border-color);
    border-radius: 12px;
    margin-top: 20px;
    color: var(--label-color);
}

.empty-state h4 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.empty-state p {
    margin-bottom: 20px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .filter-box form {
        flex-direction: column;
        align-items: stretch;
    }
}
</style>

<div class="user-management-container">
    <div class="page-header">
        <h2>User Management</h2>
        <a href="{{ route('admin.users.create') }}" class="primary-btn">
            + Add New User
        </a>
    </div>
    
    <div class="filter-box">
        <form method="GET" action="{{ route('admin.users.index') }}">
            <div class="filter-group">
                <label for="search">Search</label>
                <input type="text" id="search" name="search" placeholder="Search by name or email..." value="{{ request('search') }}">
            </div>
            
            <div class="filter-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="department">Department</label>
                <select id="department" name="department">
                    <option value="">All Departments</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ request('department') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="filter-btn">Filter</button>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Users ({{ $users->total() }})</h3>
            <a href="{{ route('admin.users.export') }}" class="secondary-btn">Export CSV</a>
        </div>
        <div class="card-body">
            @if($users->count() > 0)
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="avatar">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                                    <div>
                                        <div class="user-name">{{ $user->name }}</div>
                                        <small class="user-id">ID: {{ $user->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            <td><span class="badge secondary">{{ ucfirst($user->role) }}</span></td>
                            <td>{{ $user->department ? $user->department->name : 'Not Assigned' }}</td>
                            <td>
                                <span class="badge {{ $user->status === 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                            <td>
                                <small>{{ $user->created_at->format('M d, Y') }}<br>{{ $user->created_at->diffForHumans() }}</small>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="action-btn">View</a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="action-btn">Edit</a>
                                    <button class="action-btn danger delete-user" 
                                            data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                {{ $users->links() }}
            </div>
            @else
            <div class="empty-state">
                <h4>No Users Found</h4>
                <p>No users match your current filters.</p>
                <a href="{{ route('admin.users.create') }}" class="primary-btn">Add First User</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

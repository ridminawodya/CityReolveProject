@extends('layouts.citizen') {{-- Or your main layout file --}}

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
.complaint-management-container {
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

/* Alert styling */
.alert {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-weight: 500;
}

.alert-success {
    background-color: #D1FAE5;
    color: #065F46;
    border: 1px solid #A7F3D0;
}

/* Card styling for the table */
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

/* Complaint Info styling */
.complaint-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.complaint-id {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e3f2fd;
    color: #1976d2;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.8rem;
}

.complaint-details {
    flex: 1;
}

.complaint-category {
    font-weight: 600;
    text-transform: capitalize;
}

.complaint-location {
    color: var(--label-color);
    font-size: 0.85rem;
    margin-top: 2px;
}

/* Badges for categories */
.badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: capitalize;
}

.badge.road { background-color: #FEF3C7; color: #92400E; }
.badge.water { background-color: #DBEAFE; color: #1E40AF; }
.badge.electricity { background-color: #FEE2E2; color: #991B1B; }
.badge.garbage { background-color: #D1FAE5; color: #065F46; }
.badge.noise { background-color: #F3E8FF; color: #6B21A8; }
.badge.street-lights { background-color: #FEF3C7; color: #92400E; }
.badge.parks { background-color: #D1FAE5; color: #065F46; }
.badge.building { background-color: #E5E7EB; color: #4B5563; }
.badge.other { background-color: #F3F4F6; color: #6B7280; }

/* Action buttons */
.actions {
    display: flex;
    gap: 8px;
    align-items: center;
}

.action-btn {
    padding: 6px 12px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    text-decoration: none;
    color: var(--text-color);
    font-size: 0.85rem;
    font-weight: 500;
    transition: all 0.2s ease;
    background-color: #fff;
}

.action-btn:hover {
    background-color: var(--border-color);
    text-decoration: none;
    color: var(--text-color);
}

.action-btn.info {
    color: #0EA5E9;
    border-color: #7DD3FC;
}

.action-btn.info:hover {
    background-color: #F0F9FF;
    color: #0EA5E9;
}

.action-btn.warning {
    color: #F59E0B;
    border-color: #FCD34D;
}

.action-btn.warning:hover {
    background-color: #FFFBEB;
    color: #F59E0B;
}

.action-btn.danger {
    color: #EF4444;
    border-color: #FCA5A5;
}

.action-btn.danger:hover {
    background-color: #FEE2E2;
    color: #EF4444;
}

/* Delete form styling */
.delete-form {
    display: inline-block;
    margin: 0;
}

.delete-form button {
    padding: 6px 12px;
    border: 1px solid #FCA5A5;
    border-radius: 6px;
    background-color: #fff;
    color: #EF4444;
    font-size: 0.85rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.delete-form button:hover {
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
    .actions {
        flex-direction: column;
        gap: 4px;
    }
    
    .action-btn {
        width: 100%;
        text-align: center;
    }
}
</style>

<div class="complaint-management-container">
    <div class="page-header">
        <h2>All Complaints</h2>
        <a href="{{ route('complaints.create') }}" class="primary-btn">
            + Submit New Complaint
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Complaints ({{ $complaints->total() }})</h3>
        </div>
        <div class="card-body">
            @if($complaints->count() > 0)
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Complaint</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Submitted On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $complaint)
                        <tr>
                            <td>
                                <div class="complaint-info">
                                    <div class="complaint-id">#{{ $complaint->id }}</div>
                                    <div class="complaint-details">
                                        <div class="complaint-category">{{ ucfirst(str_replace('-', ' ', $complaint->category)) }}</div>
                                        <div class="complaint-location">{{ Str::limit($complaint->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $complaint->category }}">
                                    {{ ucfirst(str_replace('-', ' ', $complaint->category)) }}
                                </span>
                            </td>
                            <td>{{ $complaint->location }}</td>
                            <td>
                                @if(isset($complaint->status))
                                    <span class="badge {{ $complaint->status === 'resolved' ? 'success' : ($complaint->status === 'pending' ? 'warning' : 'info') }}">
                                        {{ ucfirst($complaint->status) }}
                                    </span>
                                @else
                                    <span class="badge warning">Pending</span>
                                @endif
                            </td>
                            <td>
                                <small>{{ $complaint->created_at->format('M d, Y') }}<br>{{ $complaint->created_at->diffForHumans() }}</small>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('complaints.show', $complaint->id) }}" class="action-btn info">View</a>
                                    <a href="{{ route('complaints.edit', $complaint->id) }}" class="action-btn warning">Edit</a>
                                    <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this complaint?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                {{ $complaints->links() }}
            </div>
            @else
            <div class="empty-state">
                <h4>No Complaints Found</h4>
                <p>You haven't submitted any complaints yet.</p>
                <a href="{{ route('complaints.create') }}" class="primary-btn">Submit Your First Complaint</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
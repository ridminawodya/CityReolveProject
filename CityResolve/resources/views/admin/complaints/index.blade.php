@extends('admin.layout')

@section('title', 'Complaint Management')

@push('styles')
<style>
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
    --warning-bg: #FEF3C7;
    --warning-text: #92400E;
    --info-color: #3B82F6;
    --info-text: #1E40AF;
}

/* Page header styling */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.page-header h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #1a202c;
    margin: 0;
}

.total-count {
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    box-shadow: 0 2px 4px rgba(76, 175, 80, 0.2);
}

/* Statistics cards styling */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: var(--card-bg);
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    text-align: center;
    transition: transform 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
}

.stat-card.pending {
    border-left: 4px solid #F59E0B;
}

.stat-card.in-progress {
    border-left: 4px solid var(--info-color);
}

.stat-card.resolved {
    border-left: 4px solid var(--primary-color);
}

.stat-card.closed {
    border-left: 4px solid var(--label-color);
}

.stat-card h5 {
    color: var(--label-color);
    margin-bottom: 10px;
    font-size: 0.9rem;
    font-weight: 500;
}

.stat-card h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
}

.stat-card.pending h2 { color: #F59E0B; }
.stat-card.in-progress h2 { color: var(--info-color); }
.stat-card.resolved h2 { color: var(--primary-color); }
.stat-card.closed h2 { color: var(--label-color); }

/* Filter section styling */
.filters-section {
    background-color: var(--card-bg);
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 30px;
    box-shadow: 0 4px 12px var(--shadow-medium);
}

.filter-row {
    display: grid;
    grid-template-columns: 1fr 1fr 2fr auto auto;
    gap: 20px;
    align-items: end;
}

.filter-group {
    display: flex;
    flex-direction: column;
}

.filter-group label {
    margin-bottom: 8px;
    font-weight: 500;
    color: var(--label-color);
    font-size: 0.9rem;
}

.filter-input {
    padding: 12px 15px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 0.95rem;
    background-color: var(--card-bg);
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.filter-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
}

.btn-filter {
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 2px 4px rgba(76, 175, 80, 0.2);
}

.btn-filter:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(76, 175, 80, 0.3);
}

.btn-clear {
    background-color: var(--label-color);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: opacity 0.2s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-clear:hover {
    opacity: 0.8;
    color: white;
    text-decoration: none;
}

/* Content section styling */
.content-section {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
}

.content-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    color: white;
    padding: 25px 30px;
    display: flex;
    justify-content: between;
    align-items: center;
}

.content-header h3 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

/* Table styling */
.table-container {
    padding: 0;
}

.table {
    margin-bottom: 0;
}

.table thead th {
    background-color: #2D3748;
    color: white;
    border: none;
    padding: 20px 15px;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table tbody td {
    padding: 18px 15px;
    vertical-align: middle;
    border-bottom: 1px solid var(--border-color);
    color: var(--text-color);
}

.table tbody tr {
    transition: background-color 0.2s ease;
}

.table tbody tr:hover {
    background-color: var(--secondary-color);
}

/* Status badges */
.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: capitalize;
}

.status-badge.pending {
    background-color: var(--warning-bg);
    color: var(--warning-text);
}

.status-badge.in-progress {
    background-color: #DBEAFE;
    color: var(--info-text);
}

.status-badge.resolved {
    background-color: var(--success-bg);
    color: var(--success-text);
}

.status-badge.closed {
    background-color: #F3F4F6;
    color: var(--label-color);
}

/* Category badges */
.category-badge {
    background-color: var(--secondary-color);
    color: var(--text-color);
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 500;
    border: 1px solid var(--border-color);
}

/* Action buttons */
.btn-group {
    display: flex;
    gap: 8px;
}

.action-btn {
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.85rem;
    transition: all 0.2s ease;
    border: 1px solid;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 36px;
}

.btn-view {
    color: var(--info-color);
    border-color: var(--info-color);
    background: transparent;
}

.btn-view:hover {
    background-color: var(--info-color);
    color: white;
    text-decoration: none;
}

.btn-delete {
    color: var(--danger-text);
    border-color: var(--danger-text);
    background: transparent;
    cursor: pointer;
}

.btn-delete:hover {
    background-color: var(--danger-text);
    color: white;
}

/* Empty state styling */
.empty-state {
    padding: 80px 20px;
    text-align: center;
}

.empty-state i {
    color: var(--label-color);
    margin-bottom: 25px;
    opacity: 0.6;
}

.empty-state p {
    color: var(--label-color);
    font-size: 1.1rem;
    margin: 0;
}

/* Pagination styling */
.pagination-container {
    display: flex;
    justify-content: between;
    align-items: center;
    padding: 25px 30px;
    background-color: var(--secondary-color);
    border-top: 1px solid var(--border-color);
}

.pagination-info {
    color: var(--label-color);
    font-size: 0.9rem;
}

/* Toast styling */
.toast-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1050;
}

.toast {
    background-color: var(--card-bg);
    border-radius: 8px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    border: none;
}

.toast-header {
    background-color: var(--success-bg);
    border-bottom: 1px solid var(--border-color);
    border-radius: 8px 8px 0 0;
}

.toast-body {
    padding: 15px;
    color: var(--text-color);
}

/* Responsive adjustments */
@media (max-width: 1200px) {
    .filter-row {
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }
    
    .filter-group:nth-child(3) {
        grid-column: 1 / -1;
    }
    
    .btn-filter,
    .btn-clear {
        grid-column: span 1;
    }
}

@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .filter-row {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .table-container {
        overflow-x: auto;
    }
    
    .content-header {
        padding: 20px;
    }
    
    .pagination-container {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .btn-group {
        flex-direction: column;
        gap: 4px;
    }
}
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <h2>Complaint Management</h2>
        <span class="total-count">{{ $complaints->total() }} Total Complaints</span>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card pending">
            <h5>Pending</h5>
            <h2>{{ \App\Models\Complaint::where('status', 'pending')->count() }}</h2>
        </div>
        <div class="stat-card in-progress">
            <h5>In Progress</h5>
            <h2>{{ \App\Models\Complaint::where('status', 'in_progress')->count() }}</h2>
        </div>
        <div class="stat-card resolved">
            <h5>Resolved</h5>
            <h2>{{ \App\Models\Complaint::where('status', 'resolved')->count() }}</h2>
        </div>
        <div class="stat-card closed">
            <h5>Closed</h5>
            <h2>{{ \App\Models\Complaint::where('status', 'closed')->count() }}</h2>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filters-section">
        <form method="GET" action="{{ route('admin.complaints.index') }}">
            <div class="filter-row">
                <div class="filter-group">
                    <label>Status</label>
                    <select name="status" class="filter-input">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Category</label>
                    <select name="category" class="filter-input">
                        <option value="">All Categories</option>
                        <option value="road" {{ request('category') == 'road' ? 'selected' : '' }}>Road & Transportation</option>
                        <option value="water" {{ request('category') == 'water' ? 'selected' : '' }}>Water & Sanitation</option>
                        <option value="electricity" {{ request('category') == 'electricity' ? 'selected' : '' }}>Electricity</option>
                        <option value="garbage" {{ request('category') == 'garbage' ? 'selected' : '' }}>Garbage Collection</option>
                        <option value="noise" {{ request('category') == 'noise' ? 'selected' : '' }}>Noise Pollution</option>
                        <option value="street-lights" {{ request('category') == 'street-lights' ? 'selected' : '' }}>Street Lights</option>
                        <option value="parks" {{ request('category') == 'parks' ? 'selected' : '' }}>Parks & Recreation</option>
                        <option value="building" {{ request('category') == 'building' ? 'selected' : '' }}>Building & Construction</option>
                        <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Search</label>
                    <input type="text" name="search" class="filter-input" placeholder="Search complaints..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-filter">Filter</button>
                <a href="{{ route('admin.complaints.index') }}" class="btn-clear">Clear</a>
            </div>
        </form>
    </div>

    <!-- Content Section -->
    <div class="content-section">
        <div class="content-header">
            <h3>All Complaints ({{ $complaints->count() }})</h3>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $complaint)
                    <tr>
                        <td><strong>#{{ $complaint->id }}</strong></td>
                        <td>{{ $complaint->full_name }}</td>
                        <td>{{ $complaint->email }}</td>
                        <td>
                            <span class="category-badge">
                                {{ ucwords(str_replace('-', ' ', $complaint->category)) }}
                            </span>
                        </td>
                        <td>{{ Str::limit($complaint->location, 30) }}</td>
                        <td>
                            <span class="status-badge {{ $complaint->status }}">
                                {{ ucwords(str_replace('_', ' ', $complaint->status)) }}
                            </span>
                        </td>
                        <td>{{ $complaint->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.complaints.show', $complaint) }}" 
                                   class="action-btn btn-view" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.complaints.destroy', $complaint) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Are you sure you want to delete this complaint?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <i class="fas fa-inbox fa-4x"></i>
                                <p>No complaints found matching your criteria.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <div class="pagination-info">
                Showing {{ $complaints->firstItem() ?? 0 }} to {{ $complaints->lastItem() ?? 0 }} of {{ $complaints->total() }} results
            </div>
            <div>
                {{ $complaints->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="toast-container">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto text-success">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto hide success toasts after 5 seconds
    setTimeout(function() {
        document.querySelectorAll('.toast').forEach(function(toast) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Toast) {
                bootstrap.Toast.getOrCreateInstance(toast).hide();
            }
        });
    }, 5000);
});
</script>
@endpush
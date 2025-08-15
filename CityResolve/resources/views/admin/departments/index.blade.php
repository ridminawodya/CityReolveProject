@extends('admin.layout')

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

/* Add New Department button styling */
.btn-success {
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
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
    text-decoration: none;
    color: #fff;
}

/* Filter section styling */
.filters-section {
    background-color: var(--card-bg);
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.filter-row {
    display: flex;
    gap: 20px;
    align-items: end;
}

.filter-group {
    flex: 1;
}

.filter-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: var(--label-color);
}

.filter-input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    font-size: 1rem;
}

.btn-filter {
    background-color: var(--primary-color);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.btn-filter:hover {
    background-color: var(--primary-hover);
}

/* Content section styling */
.content-section {
    background-color: var(--card-bg);
    border-radius: 8px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.content-header {
    background-color: var(--primary-color);
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.content-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.export-btn {
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 0.9rem;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.export-btn:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

/* Department grid styling */
.departments-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    padding: 30px;
}

.department-card {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.department-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.card-header {
    background-color: var(--secondary-color);
    border-bottom: 1px solid var(--border-color);
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h6 {
    font-weight: 700;
    margin: 0;
}

.card-body {
    padding: 20px;
    flex-grow: 1;
}

.card-footer {
    padding: 15px 20px;
    background-color: var(--secondary-color);
    border-top: 1px solid var(--border-color);
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

/* Button group styling */
.btn-group {
    display: flex;
    gap: 5px;
}

.btn-group .btn {
    flex: 1;
    text-align: center;
    padding: 8px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    border: 1px solid;
}

.btn.btn-outline-info {
    color: var(--info-color);
    border-color: var(--info-color);
    background: transparent;
}

.btn.btn-outline-primary {
    color: var(--primary-color);
    border-color: var(--primary-color);
    background: transparent;
}

.btn.btn-outline-danger {
    color: var(--danger-text);
    border-color: var(--danger-text);
    background: transparent;
}

.btn.btn-outline-secondary {
    color: var(--label-color);
    border-color: var(--label-color);
    background: transparent;
}

.btn.btn-outline-info:hover {
    background-color: var(--info-color);
    color: #fff;
    text-decoration: none;
}

.btn.btn-outline-primary:hover {
    background-color: var(--primary-color);
    color: #fff;
    text-decoration: none;
}

.btn.btn-outline-danger:hover {
    background-color: var(--danger-text);
    color: #fff;
    text-decoration: none;
}

.btn.btn-outline-secondary:hover {
    background-color: var(--label-color);
    color: #fff;
    text-decoration: none;
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.btn:disabled:hover {
    background: transparent;
    color: var(--label-color);
}

/* Stats styling */
.d-flex {
    display: flex;
}

.justify-content-between {
    justify-content: space-between;
}

.text-center {
    text-align: center;
}

.flex-fill {
    flex: 1;
}

.text-primary {
    color: var(--info-color);
}

.text-success {
    color: var(--success-text);
}

.mb-0 {
    margin-bottom: 0;
}

.mb-3 {
    margin-bottom: 1rem;
}

.mt-auto {
    margin-top: auto;
}

.w-100 {
    width: 100%;
}

/* Empty state styling */
.empty-state {
    padding: 60px 20px;
    text-align: center;
}

.empty-state i {
    color: var(--label-color);
    margin-bottom: 20px;
}

.empty-state h5 {
    color: var(--label-color);
    margin-bottom: 10px;
    font-size: 1.25rem;
}

.empty-state p {
    color: var(--label-color);
    margin-bottom: 20px;
}

.text-muted {
    color: var(--label-color) !important;
}

/* Modal styling */
.modal-content {
    border-radius: 12px;
    background-color: var(--card-bg);
    box-shadow: 0 4px 12px var(--shadow-medium);
    border: none;
}

.modal-header {
    border-bottom: 1px solid var(--border-color);
    padding: 1rem 1.5rem;
}

.modal-body {
    padding: 1.5rem;
}

.modal-footer {
    border-top: 1px solid var(--border-color);
    padding: 1rem 1.5rem;
}

.modal-title {
    font-weight: 600;
    color: var(--text-color);
}

.btn-secondary {
    background-color: var(--label-color);
    border-color: var(--label-color);
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    border: 1px solid;
}

.btn-danger {
    background-color: var(--danger-text);
    border-color: var(--danger-text);
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    border: 1px solid;
}

.btn-secondary:hover,
.btn-danger:hover {
    text-decoration: none;
    opacity: 0.9;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .filter-row {
        flex-direction: column;
        gap: 15px;
    }
    
    .departments-grid {
        grid-template-columns: 1fr;
        padding: 20px;
    }
    
    .btn-group {
        flex-direction: column;
    }
}
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h2>Department Management</h2>
    <a href="{{ route('admin.departments.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add New Department
    </a>
</div>

<!-- Filters Section -->
<div class="filters-section">
    <div class="filter-row">
        <div class="filter-group">
            <label>Search</label>
            <input type="text" class="filter-input" placeholder="Search by department name...">
        </div>
        <div class="filter-group">
            <label>Status</label>
            <select class="filter-input">
                <option>All Statuses</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
        </div>
        <button class="btn-filter">Filter</button>
    </div>
</div>

<!-- Content Section -->
<div class="content-section">
    <div class="content-header">
        <h3>Departments ({{ $departments->count() }})</h3>
        <button class="export-btn">Export CSV</button>
    </div>

    @forelse($departments as $department)
        @if($loop->first)
            <div class="departments-grid">
        @endif
                <div class="department-card">
                    <div class="card-header">
                        <h6 class="mb-0">{{ $department->name }}</h6>
                        <span class="badge {{ $department->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($department->status) }}
                        </span>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">
                            {{ $department->description ?: 'No description available.' }}
                        </p>
                        
                        <div class="d-flex justify-content-between text-center mt-auto">
                            <div class="flex-fill">
                                <h4 class="text-primary mb-0">{{ $department->users_count ?? 0 }}</h4>
                                <small class="text-muted">Total Users</small>
                            </div>
                            <div class="flex-fill">
                                <h4 class="text-success mb-0">{{ $department->users ? $department->users->where('status', 'active')->count() : 0 }}</h4>
                                <small class="text-muted">Active Users</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group w-100" role="group">
                            <a href="{{ route('admin.departments.show', $department->id) }}" 
                               class="btn btn-outline-info">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('admin.departments.edit', $department->id) }}" 
                               class="btn btn-outline-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            @if(($department->users_count ?? 0) === 0)
                                <button type="button" class="btn btn-outline-danger delete-department" 
                                        data-department-id="{{ $department->id }}" 
                                        data-department-name="{{ $department->name }}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            @else
                                <button type="button" class="btn btn-outline-secondary" disabled title="Cannot delete department with users">
                                    <i class="fas fa-lock"></i> Locked
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
        @if($loop->last)
            </div>
        @endif
    @empty
        <div class="empty-state">
            <i class="fas fa-building fa-3x"></i>
            <h5>No Departments Found</h5>
            <p>Create your first department to organize your users.</p>
            <a href="{{ route('admin.departments.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Create First Department
            </a>
        </div>
    @endforelse
</div>

<!-- Pagination -->
@if($departments->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $departments->links() }}
    </div>
@endif

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete department <strong id="departmentName"></strong>?</p>
                <p class="text-danger">This action cannot be undone!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Department</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete department functionality
    document.querySelectorAll('.delete-department').forEach(button => {
        button.addEventListener('click', function() {
            const departmentId = this.dataset.departmentId;
            const departmentName = this.dataset.departmentName;
            
            document.getElementById('departmentName').textContent = departmentName;
            document.getElementById('deleteForm').action = `/admin/departments/${departmentId}`;
            
            // Using Bootstrap modal JS, assuming it's included in your app
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        });
    });
    
    // Filter functionality (basic example)
    const filterBtn = document.querySelector('.btn-filter');
    const searchInput = document.querySelector('.filter-input[placeholder*="Search"]');
    const statusSelect = document.querySelector('select.filter-input');
    
    if (filterBtn) {
        filterBtn.addEventListener('click', function() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusFilter = statusSelect.value;
            
            // Basic client-side filtering
            document.querySelectorAll('.department-card').forEach(card => {
                const departmentName = card.querySelector('.card-header h6').textContent.toLowerCase();
                const departmentStatus = card.querySelector('.badge').textContent.toLowerCase();
                
                const matchesSearch = searchTerm === '' || departmentName.includes(searchTerm);
                const matchesStatus = statusFilter === 'All Statuses' || departmentStatus.includes(statusFilter.toLowerCase());
                
                if (matchesSearch && matchesStatus) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
    
    // Export CSV functionality (basic example)
    const exportBtn = document.querySelector('.export-btn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            // This would typically make an AJAX call to your backend
            // For now, just show an alert
            alert('Export functionality would be implemented here');
        });
    }
});
</script>
@endpush
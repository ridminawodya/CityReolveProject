@extends('layouts.app')

@section('title', 'Manage Departments')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">Department Management</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('admin.departments.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Add New Department
                </a>
            </div>

            <!-- Departments Grid -->
            <div class="row">
                @forelse($departments as $department)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card h-100 department-card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">{{ $department->name }}</h6>
                                <span class="badge {{ $department->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($department->status) }}
                                </span>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">
                                    {{ $department->description ?: 'No description available.' }}
                                </p>
                                
                                <div class="row text-center">
                                    <div class="col-6">
                                        <h4 class="text-primary mb-0">{{ $department->users_count }}</h4>
                                        <small class="text-muted">Total Users</small>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="text-success mb-0">{{ $department->users->where('status', 'active')->count() }}</h4>
                                        <small class="text-muted">Active Users</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('admin.departments.show', $department->id) }}" 
                                       class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.departments.edit', $department->id) }}" 
                                       class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @if($department->users_count === 0)
                                        <button type="button" class="btn btn-outline-danger btn-sm delete-department" 
                                                data-department-id="{{ $department->id }}" 
                                                data-department-name="{{ $department->name }}">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-outline-secondary btn-sm" disabled title="Cannot delete department with users">
                                            <i class="fas fa-lock"></i> Locked
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center py-5">
                                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Departments Found</h5>
                                <p class="text-muted mb-3">Create your first department to organize your users.</p>
                                <a href="{{ route('admin.departments.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Create First Department
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($departments->hasPages())
                <div class="d-flex justify-content-center">
                    {{ $departments->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

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

@push('styles')
<style>
.department-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.department-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}
</style>
@endpush

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
            
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        });
    });
});
</script>
@endpush
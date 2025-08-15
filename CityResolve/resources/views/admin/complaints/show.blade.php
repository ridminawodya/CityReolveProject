@extends('admin.layout')

@section('title', 'Complaint Details')

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
    --info-bg: #DBEAFE;
}

/* Page layout */
.container-fluid {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Page header styling */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 30px;
    padding: 20px 0;
}

.page-header-content h2 {
    font-size: 2rem;
    font-weight: 600;
    color: var(--text-color);
    margin: 0 0 10px 0;
}

.page-header-content .complaint-id {
    color: var(--label-color);
    font-size: 1rem;
}

/* Status badge styling */
.status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: capitalize;
    display: inline-block;
}

.status-badge.pending {
    background-color: var(--warning-bg);
    color: var(--warning-text);
}

.status-badge.in-progress {
    background-color: var(--info-bg);
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

/* Back button styling */
.btn-back {
    background-color: var(--label-color);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.btn-back:hover {
    background-color: #374151;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    color: white;
    text-decoration: none;
}

/* Card styling */
.detail-card {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
    margin-bottom: 25px;
}

.card-header-custom {
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    color: white;
    padding: 20px 25px;
    border-bottom: none;
}

.card-header-custom h4 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.card-body-custom {
    padding: 30px 25px;
}

/* Detail sections */
.detail-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-bottom: 25px;
}

.detail-group {
    display: flex;
    flex-direction: column;
}

.detail-group:last-child {
    margin-bottom: 0;
}

.detail-label {
    font-weight: 600;
    color: var(--label-color);
    margin-bottom: 8px;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.detail-value {
    color: var(--text-color);
    font-size: 1rem;
    line-height: 1.5;
    margin: 0;
    padding: 12px 15px;
    background-color: var(--secondary-color);
    border-radius: 6px;
    border-left: 4px solid var(--primary-color);
}

.detail-value.full-width {
    grid-column: 1 / -1;
}

/* Description styling */
.description-box {
    background-color: var(--secondary-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 20px;
    margin: 0;
    line-height: 1.6;
    color: var(--text-color);
    white-space: pre-wrap;
    word-wrap: break-word;
}

/* Photo styling */
.photo-container {
    margin-top: 15px;
    text-align: center;
}

.complaint-photo {
    max-width: 100%;
    height: auto;
    max-height: 400px;
    border-radius: 8px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    cursor: pointer;
    transition: transform 0.2s ease;
}

.complaint-photo:hover {
    transform: scale(1.02);
}

/* Form styling */
.form-section {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
    margin-bottom: 25px;
}

.form-group-custom {
    margin-bottom: 20px;
}

.form-label-custom {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--label-color);
    font-size: 0.9rem;
}

.form-control-custom {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 0.95rem;
    background-color: var(--card-bg);
    transition: all 0.2s ease;
}

.form-control-custom:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
}

.form-control-custom textarea {
    resize: vertical;
    min-height: 120px;
    font-family: inherit;
}

/* Primary button styling */
.btn-primary-custom {
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    color: white;
    border: none;
    padding: 14px 24px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    font-size: 1rem;
    box-shadow: 0 2px 4px rgba(76, 175, 80, 0.2);
}

.btn-primary-custom:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(76, 175, 80, 0.3);
    color: white;
    text-decoration: none;
}

/* Action buttons styling */
.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.btn-action {
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.2s ease;
    border: 1px solid;
    cursor: pointer;
    font-size: 0.95rem;
}

.btn-action.email {
    color: var(--info-color);
    border-color: var(--info-color);
    background: transparent;
}

.btn-action.email:hover {
    background-color: var(--info-color);
    color: white;
    text-decoration: none;
}

.btn-action.phone {
    color: var(--primary-color);
    border-color: var(--primary-color);
    background: transparent;
}

.btn-action.phone:hover {
    background-color: var(--primary-color);
    color: white;
    text-decoration: none;
}

.btn-action.delete {
    color: var(--danger-text);
    border-color: var(--danger-text);
    background: transparent;
    width: 100%;
}

.btn-action.delete:hover {
    background-color: var(--danger-text);
    color: white;
}

/* Sidebar styling */
.sidebar-section {
    position: sticky;
    top: 20px;
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
    min-width: 300px;
}

.toast-header {
    background-color: var(--success-bg);
    border-bottom: 1px solid var(--border-color);
    border-radius: 8px 8px 0 0;
    padding: 12px 15px;
}

.toast-body {
    padding: 15px;
    color: var(--text-color);
}

/* Grid layout */
.main-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    align-items: start;
}

/* Responsive adjustments */
@media (max-width: 1200px) {
    .main-grid {
        grid-template-columns: 1fr;
    }
    
    .sidebar-section {
        position: static;
    }
}

@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .detail-row {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .card-body-custom {
        padding: 20px 15px;
    }
    
    .card-header-custom {
        padding: 15px;
    }
    
    .container-fluid {
        padding: 0 15px;
    }
}

@media (max-width: 480px) {
    .page-header-content h2 {
        font-size: 1.5rem;
    }
    
    .action-buttons {
        gap: 8px;
    }
    
    .btn-action {
        padding: 10px 15px;
        font-size: 0.9rem;
    }
}

/* Image modal for photo viewing */
.image-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
}

.image-modal.show {
    display: flex;
}

.image-modal img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 8px;
}

.image-modal .close {
    position: absolute;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 2rem;
    cursor: pointer;
}
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-content">
            <h2>Complaint Details</h2>
            <div class="complaint-id">ID: #{{ $complaint->id }}</div>
            <div class="mt-2">
                <span class="status-badge {{ $complaint->status }}">
                    {{ ucwords(str_replace('_', ' ', $complaint->status)) }}
                </span>
            </div>
        </div>
        <a href="{{ route('admin.complaints.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <!-- Main Content Grid -->
    <div class="main-grid">
        <!-- Complaint Details Section -->
        <div class="details-section">
            <div class="detail-card">
                <div class="card-header-custom">
                    <h4>Personal Information</h4>
                </div>
                <div class="card-body-custom">
                    <div class="detail-row">
                        <div class="detail-group">
                            <div class="detail-label">Full Name</div>
                            <p class="detail-value">{{ $complaint->full_name }}</p>
                        </div>
                        <div class="detail-group">
                            <div class="detail-label">Email Address</div>
                            <p class="detail-value">{{ $complaint->email }}</p>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-group">
                            <div class="detail-label">Contact Number</div>
                            <p class="detail-value">{{ $complaint->contact_no }}</p>
                        </div>
                        <div class="detail-group">
                            <div class="detail-label">Category</div>
                            <p class="detail-value">{{ ucwords(str_replace('-', ' ', $complaint->category)) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="detail-card">
                <div class="card-header-custom">
                    <h4>Complaint Information</h4>
                </div>
                <div class="card-body-custom">
                    <div class="detail-group">
                        <div class="detail-label">Location</div>
                        <p class="detail-value">{{ $complaint->location }}</p>
                    </div>

                    <div class="detail-group">
                        <div class="detail-label">Description</div>
                        <div class="description-box">{{ $complaint->description }}</div>
                    </div>

                    @if($complaint->photo)
                    <div class="detail-group">
                        <div class="detail-label">Attached Photo</div>
                        <div class="photo-container">
                            <img src="{{ asset('storage/' . $complaint->photo) }}" 
                                 alt="Complaint Photo" 
                                 class="complaint-photo"
                                 onclick="openImageModal(this.src)">
                        </div>
                    </div>
                    @endif

                    <div class="detail-row">
                        <div class="detail-group">
                            <div class="detail-label">Submitted Date</div>
                            <p class="detail-value">{{ $complaint->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                        <div class="detail-group">
                            <div class="detail-label">Last Updated</div>
                            <p class="detail-value">{{ $complaint->updated_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Section -->
        <div class="sidebar-section">
            <!-- Status Update Form -->
            <div class="form-section">
                <div class="card-header-custom">
                    <h4>Update Status</h4>
                </div>
                <div class="card-body-custom">
                    <form action="{{ route('admin.complaints.updateStatus', $complaint) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group-custom">
                            <label for="status" class="form-label-custom">Status</label>
                            <select name="status" id="status" class="form-control-custom" required>
                                <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>
                                    In Progress
                                </option>
                                <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>
                                    Resolved
                                </option>
                                <option value="closed" {{ $complaint->status == 'closed' ? 'selected' : '' }}>
                                    Closed
                                </option>
                            </select>
                        </div>

                        <div class="form-group-custom">
                            <label for="admin_notes" class="form-label-custom">Admin Notes</label>
                            <textarea name="admin_notes" 
                                      id="admin_notes" 
                                      class="form-control-custom" 
                                      rows="5" 
                                      placeholder="Add notes about the complaint status, actions taken, etc.">{{ $complaint->admin_notes }}</textarea>
                        </div>

                        <button type="submit" class="btn-primary-custom">
                            <i class="fas fa-save"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="form-section">
                <div class="card-header-custom">
                    <h4>Quick Actions</h4>
                </div>
                <div class="card-body-custom">
                    <div class="action-buttons">
                        <a href="mailto:{{ $complaint->email }}" class="btn-action email">
                            <i class="fas fa-envelope"></i> Email Complainant
                        </a>
                        <a href="tel:{{ $complaint->contact_no }}" class="btn-action phone">
                            <i class="fas fa-phone"></i> Call Complainant
                        </a>
                        <form action="{{ route('admin.complaints.destroy', $complaint) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this complaint? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action delete">
                                <i class="fas fa-trash"></i> Delete Complaint
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="image-modal" onclick="closeImageModal()">
    <span class="close">&times;</span>
    <img id="modalImage" src="" alt="Full Size Image">
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

// Image modal functions
function openImageModal(src) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    modalImage.src = src;
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeImageModal();
    }
});
</script>
@endpush
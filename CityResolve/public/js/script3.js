document.addEventListener('DOMContentLoaded', function() {
    const trackForm = document.getElementById('trackForm');
    const trackResultDiv = document.getElementById('trackResult');
    
    if (trackForm) {
        trackForm.addEventListener('submit', function(event) {
            event.preventDefault(); 
            trackComplaint();
        });
    }
    
    // Set current year in footer
    const currentYear = new Date().getFullYear();
    const yearElement = document.getElementById('current-year-bottom');
    if (yearElement) {
        yearElement.textContent = currentYear;
    }
});

async function trackComplaint() {
    const complaintId = document.getElementById('complaintId').value.trim();
    const trackResultDiv = document.getElementById('trackResult');
    const submitButton = document.querySelector('#trackForm button[type="submit"]');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    
    if (!complaintId) {
        displayResult('Please enter a valid Complaint ID.', 'alert-warning');
        return;
    }

    // Show loading state
    submitButton.disabled = true;
    submitButton.innerHTML = '<div class="loading-spinner"></div> Searching...';
    displayResult('<div class="loading-spinner"></div> Fetching complaint status...', 'alert-info');

    try {
        const response = await fetch('/track-complaint', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                complaint_id: complaintId
            })
        });

        const data = await response.json();

        if (data.success && data.complaint) {
            displayComplaintDetails(data.complaint);
        } else {
            displayResult(data.message || 'Complaint not found. Please check your Complaint ID.', 'alert-danger');
        }
    } catch (error) {
        console.error('Error:', error);
        displayResult('An error occurred while tracking your complaint. Please try again.', 'alert-danger');
    } finally {
        // Reset button state
        submitButton.disabled = false;
        submitButton.innerHTML = '<i class="bi bi-search"></i> Track Complaint Status';
    }
}

function displayResult(html, alertClass) {
    const trackResultDiv = document.getElementById('trackResult');
    trackResultDiv.innerHTML = html;
    trackResultDiv.className = `alert ${alertClass}`;
    trackResultDiv.classList.remove('d-none');
}

function displayComplaintDetails(complaint) {
    const statusClass = getStatusClass(complaint.status);
    const statusTimeline = generateStatusTimeline(complaint.status);
    
    const resultHtml = `
        <div class="complaint-details-card">
            <div class="complaint-header">
                <h4><i class="bi bi-check-circle-fill text-success"></i> Complaint Found!</h4>
                <div class="complaint-id-badge">ID: #${complaint.id}</div>
            </div>
            
            <div class="complaint-info">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-card">
                            <h5><i class="bi bi-file-text"></i> Complaint Details</h5>
                            <p><strong>Category:</strong> ${complaint.category}</p>
                            <p><strong>Location:</strong> ${complaint.location}</p>
                            <p><strong>Description:</strong> ${complaint.description}</p>
                            <p><strong>Submitter:</strong> ${complaint.first_name} ${complaint.last_name}</p>
                            <p><strong>Contact:</strong> ${complaint.contact_no}</p>
                            <p><strong>Email:</strong> ${complaint.email}</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="info-card">
                            <h5><i class="bi bi-info-circle"></i> Status Information</h5>
                            <p><strong>Current Status:</strong> <span class="badge ${statusClass}">${complaint.status_label}</span></p>
                            <p><strong>Submitted:</strong> ${complaint.submitted_date}</p>
                            <p><strong>Last Updated:</strong> ${complaint.last_updated}</p>
                        </div>
                    </div>
                </div>
                
                ${complaint.admin_notes ? `
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="info-card admin-notes">
                                <h5><i class="bi bi-chat-left-text"></i> Admin Notes</h5>
                                <p>${complaint.admin_notes}</p>
                            </div>
                        </div>
                    </div>
                ` : ''}
                
                <div class="status-timeline mt-4">
                    <h5><i class="bi bi-clock-history"></i> Status Progress</h5>
                    ${statusTimeline}
                </div>
            </div>
        </div>
    `;
    
    displayResult(resultHtml, 'alert-success complaint-details');
}

function getStatusClass(status) {
    const statusClasses = {
        'pending': 'bg-warning text-dark',
        'in_progress': 'bg-info text-white',
        'resolved': 'bg-success text-white',
        'closed': 'bg-secondary text-white'
    };
    return statusClasses[status] || 'bg-secondary text-white';
}

function generateStatusTimeline(currentStatus) {
    const statuses = [
        { key: 'pending', label: 'Pending Review' },
        { key: 'in_progress', label: 'In Progress' },
        { key: 'resolved', label: 'Resolved' },
        { key: 'closed', label: 'Closed' }
    ];
    
    const currentIndex = statuses.findIndex(s => s.key === currentStatus);
    
    let timeline = '<div class="timeline">';
    
    statuses.forEach((status, index) => {
        const isActive = index <= currentIndex;
        const isCurrent = index === currentIndex;
        
        timeline += `
            <div class="timeline-item ${isActive ? 'active' : ''} ${isCurrent ? 'current' : ''}">
                <div class="timeline-marker">
                    <i class="bi ${isActive ? 'bi-check-circle-fill' : 'bi-circle'}"></i>
                </div>
                <div class="timeline-content">
                    <span>${status.label}</span>
                </div>
            </div>
        `;
    });
    
    timeline += '</div>';
    return timeline;
}

// Mobile menu toggle function
function toggleMobileMenu() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar) {
        sidebar.classList.toggle('show');
    }
}
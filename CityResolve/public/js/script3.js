function toggleMobileMenu() {
    document.getElementById('sidebar').classList.toggle('show');
}
 
 // Track form functionality
document.getElementById('trackForm').addEventListener('submit', function(e) {
    e.preventDefault();
            
    const complaintId = document.getElementById('complaintId').value.trim();
    const submitBtn = this.querySelector('button[type="submit"]');
    const resultDiv = document.getElementById('trackResult');
            
    if (!complaintId) {
        alert('Please enter a complaint ID');
        return;
    }
            
// Show loading state
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<span class="loading-spinner"></span> Tracking...';
    submitBtn.disabled = true;
            
// Simulate API call
    setTimeout(() => {
// Mock complaint data - in real app, this would come from API
        const mockComplaintData = {
            id: complaintId,
            status: 'In Progress',
            submittedDate: '2025-06-10',
            lastUpdated: '2025-06-14',
            assignedTo: 'Municipal Works Department',
            description: 'Road pothole repair on Main Street',
            priority: 'Medium',
            estimatedCompletion: '2025-06-20'
        };
                
// Display result
        resultDiv.innerHTML = `
            <div style="border-left: 4px solid var(--primary-green); padding-left: 1rem;">
                <h4 style="color: var(--primary-green); margin-bottom: 1rem;">
                    <i class="bi bi-check-circle-fill me-2"></i>Complaint Found
                </h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Complaint ID:</strong> ${mockComplaintData.id}</p>
                        <p><strong>Status:</strong> <span style="color: var(--primary-green); font-weight: 600;">${mockComplaintData.status}</span></p>
                        <p><strong>Priority:</strong> ${mockComplaintData.priority}</p>
                        <p><strong>Assigned To:</strong> ${mockComplaintData.assignedTo}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Submitted:</strong> ${mockComplaintData.submittedDate}</p>
                        <p><strong>Last Updated:</strong> ${mockComplaintData.lastUpdated}</p>
                        <p><strong>Est. Completion:</strong> ${mockComplaintData.estimatedCompletion}</p>
                    </div>
                </div>
                <div style="margin-top: 1rem; padding: 1rem; background: rgba(34, 197, 94, 0.1); border-radius: 10px;">
                    <strong>Description:</strong> ${mockComplaintData.description}
                </div>
            </div>
        `;
        resultDiv.classList.remove('d-none');
        resultDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
// Reset button
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
    }, 1500);
});

// Add scroll effect to navbar
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 100) {
        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
    } else {
        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
    }
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
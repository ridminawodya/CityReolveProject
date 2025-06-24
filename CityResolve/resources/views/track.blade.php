<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CityResolve - Track Your Complaint</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
    --primary-green: #22c55e;
    --primary-gradient: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    --secondary-gradient: linear-gradient(135deg, #34d399 0%, #22c55e 100%);
    --light-green: #dcfce7;
    --background-green: #f0fdf4;
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --shadow-soft: 0 10px 40px rgba(34, 197, 94, 0.1);
    --shadow-hover: 0 20px 60px rgba(34, 197, 94, 0.15);
    --glass-bg: rgba(255, 255, 255, 0.9);
    --success-gradient: linear-gradient(135deg,#22c55e 0%,#16a34a 100%);
}

* { 
    margin: 0; 
    padding: 0; 
    box-sizing: border-box; 
}
        
body { 
    font-family: 'Inter', sans-serif; 
    background: var(--background-green);
    min-height: 100vh;
    line-height: 1.6;
}

.animated-bg {
    position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    overflow: hidden;
}

.animated-bg::before {
    content: '';
    position: absolute;
    top: -50%; left: -50%; width: 200%; height: 200%;
    background: radial-gradient(circle, rgba(34, 197, 94, 0.1) 2px, transparent 2px);
    background-size: 40px 40px;
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-20px, -20px) rotate(180deg); }
}

.navbar {
    background: rgba(255, 255, 255, 0.95) !important;
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(34, 197, 94, 0.1);
    padding: 1rem 0;
    box-shadow: 0 2px 20px rgba(34, 197, 94, 0.1);
}

.navbar-brand {
    font-weight: 800; 
    font-size: 1.8rem; 
    color: var(--primary-green) !important; 
    display: flex; 
    align-items: center;
}

.navbar-brand i {
    font-size: 2.2rem; 
    margin-right: 10px;
    color: var(--primary-green);
}

.navbar-nav .nav-link {
    color: var(--text-primary) !important;
    font-weight: 500; 
    margin: 0 10px; 
    padding: 8px 16px !important;
    border-radius: 25px; 
    transition: all 0.3s ease;
}

.navbar-nav .nav-link:hover {
    background: var(--light-green);
    color: var(--primary-green) !important;
    transform: translateY(-2px);
}

.sidebar-nav {
    position: fixed; 
    left: 0; 
    top: 0; 
    height: 100vh; 
    width: 80px;
    background: rgba(30, 41, 59, 0.97);
    backdrop-filter: blur(20px);
    z-index: 1000;
    transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-nav:hover { 
    width: 280px; 
}

.sidebar-nav .nav-item { 
    margin: 8px 0; 
}

.sidebar-nav .nav-link {
    padding: 16px 20px; 
    color: rgba(255, 255, 255, 0.8);
    display: flex; 
    align-items: center; 
    text-decoration: none;
    transition: all 0.3s ease; 
    border-radius: 0 30px 30px 0;
    margin-right: 15px; 
    position: relative; 
    overflow: hidden;
}

.sidebar-nav .nav-link::before {
    content: ''; 
    position: absolute; 
    left: 0; top: 0; 
    height: 100%; 
    width: 0;
    background: var(--success-gradient); 
    transition: width 0.3s ease; 
    z-index: -1;
}

.sidebar-nav .d-flex{
    padding-top: 150px;
}

.sidebar-nav .nav-link:hover { 
    color: white; 
    transform: translateX(10px); 
}

.sidebar-nav .nav-link:hover::before { 
    width: 100%; 
}

.sidebar-nav .nav-text { 
    margin-left: 15px; 
    opacity: 0; 
    transition: opacity 0.3s ease; 
    white-space: nowrap; 
    font-weight: 500; 
}

.sidebar-nav:hover .nav-text { 
    opacity: 1; 
}

.track-section {
    padding: 8rem 0 6rem 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
}

.track-section::before {
    content: '';
    position: absolute;
    top: 0; 
    left: 0; 
    right: 0; 
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 30%, rgba(34, 197, 94, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.track-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 1;
}

.track-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 3rem;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(34, 197, 94, 0.1);
    transition: all 0.3s ease;
}

.track-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.section-title {
    font-size: 2.8rem;
    font-weight: 800;
    color: var(--text-primary);
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
}

.section-title i {
    color: var(--primary-green);
    margin-right: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: var(--primary-gradient);
    border-radius: 2px;
}

.track-form {
    margin-bottom: 2rem;
}

.input-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.form-control {
    border: 2px solid rgba(34, 197, 94, 0.2);
    border-radius: 15px;
    padding: 1rem 1.5rem;
    font-size: 1.1rem;
    font-weight: 500;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.9);
}

.form-control:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.2rem rgba(34, 197, 94, 0.25);
    background: white;
}

.btn-primary {
    background: var(--primary-gradient);
    color: white;
    padding: 1rem 2.5rem;
    border: none;
    border-radius: 15px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    box-shadow: var(--shadow-soft);
    width: 100%;
    justify-content: center;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-hover);
    color: white;
}

.btn-primary i {
    margin-right: 10px;
}

.alert {
    border: none;
    border-radius: 15px;
    padding: 1.5rem;
    font-weight: 500;
    box-shadow: var(--shadow-soft);
    border-left: 4px solid var(--primary-green);
}

.alert-info {
    background: linear-gradient(135deg, var(--light-green) 0%, rgba(34, 197, 94, 0.1) 100%);
    color: var(--text-primary);
}

.d-none {
    display: none !important;
}

.footer {
    background: var(--text-primary);
    color: white;
    text-align: center;
    padding: 3rem 0;
}

.track-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    margin: 0 auto 2rem auto;
    box-shadow: var(--shadow-soft);
}

@media (max-width: 768px) {
    .track-section {
        padding: 6rem 0 4rem 0;
    }
            
    .section-title {
        font-size: 2.2rem;
    }
            
    .track-card {
        padding: 2rem;
    }
            
    .btn-primary {
        padding: 0.8rem 2rem;
    }
}

.track-form {
    animation: slideUp 0.6s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.loading-spinner {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top-color: white;
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    
<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-buildings"></i>CityResolve
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.html">
                        <i class="bi bi-translate fs-5"></i>
                        <span class="nav-text">Sinhala</span>
                    </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="home.html">
                        <i class="bi bi-globe fs-5"></i>
                        <span class="nav-text">English</span>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Sidebar Navigation -->
    <div class="sidebar-nav">
        <div class="d-flex flex-column h-100 py-20">
            <a class="nav-link" href="index.html">
                <i class="bi bi-house-door nav-icon fs-5"></i>
                <span class="nav-text">Home</span>
            </a>

            <a class="nav-link" href="submit.html">
                <i class="bi bi-pencil-square fs-5"></i>
                <span class="nav-text">Submit Complaint</span>
            </a>

            <a class="nav-link active" href="track.html">
                <i class="bi bi-search fs-5"></i>
                <span class="nav-text">Track Status</span>
            </a>

            <a class="nav-link" href="community.html">
                <i class="bi bi-people-fill fs-5"></i>
                <span class="nav-text">Community</span>
            </a>

            <a class="nav-link" href="timetable.html">
                <i class="bi bi-info-circle fs-5"></i>
                <span class="nav-text">Service Schedule</span>
            </a>

            <a class="nav-link" href="about.html">
                <i class="bi bi-info-circle fs-5"></i>
                <span class="nav-text">About Us</span>
            </a>

            <a class="nav-link" href="payment.html">
                <i class="bi bi-credit-card fs-5"></i>
                <span class="nav-text">Payments</span>
            </a>

            <a class="nav-link mt-auto" href="profile.html">
                <i class="bi bi-person-circle fs-5"></i>
                <span class="nav-text">Profile</span>
            </a>

            <a class="nav-link" href="login.html">
                <i class="bi bi-box-arrow-right fs-5"></i>
                <span class="nav-text">Logout</span>
            </a>

        </div>
    </div>

<!-- Track Complaint Section -->
    <section class="track-section">
        <div class="track-container">
            <div class="track-card">
                <div class="track-icon">
                    <i class="bi bi-search"></i>
                </div>
                
                <h1 class="section-title">
                    <i class="bi bi-search"></i>Track Your Complaint
                </h1>
                
                <form id="trackForm" class="track-form">
                    <div class="input-group">
                        <input type="text" class="form-control" id="complaintId" placeholder="Enter your Complaint ID" required>
                    </div>
                    
                    <button type="submit" class="btn-primary">
                        <i class="bi bi-search"></i>Track Complaint Status
                    </button>
                </form>
                
                <div id="trackResult" class="alert alert-info d-none">
<!-- Complaint status will be displayed here -->
                </div>
            </div>
        </div>
    </section>

<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CityResolve. All rights reserved. Connecting citizens with local government.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
    </script>
</body>
</html>
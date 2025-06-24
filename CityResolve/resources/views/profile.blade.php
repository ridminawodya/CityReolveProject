<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
    --primary-green: #22c55e;
    --primary-gradient: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    --light-green: #dcfce7;
    --background-green: #f0fdf4;
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --shadow-soft: 0 10px 40px rgba(34, 197, 94, 0.1);
    --shadow-hover: 0 20px 60px rgba(34, 197, 94, 0.15);
    --success-gradient: linear-gradient(135deg,#22c55e 0%,#16a34a 100%);
    --navbar-height: 80px;
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
    padding-top: calc(var(--navbar-height) + 2rem);
    padding-left: 80px;
    padding-right: 0;
    padding-bottom: 2rem;
}

.animated-bg {
    position: fixed; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%; 
    z-index: -1;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.navbar {
    background: rgba(255, 255, 255, 0.95) !important;
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(34, 197, 94, 0.1);
    padding: 1rem 0;
    box-shadow: 0 2px 20px rgba(34, 197, 94, 0.1);
    height: var(--navbar-height);
    z-index: 1050;
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
    top: var(--navbar-height); 
    height: calc(100vh - var(--navbar-height)); 
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
    left: 0; 
    top: 0; 
    height: 100%; 
    width: 0;
    background: var(--success-gradient);
    transition: width 0.3s ease; 
    z-index: -1;
}

.sidebar-nav .d-flex{
    padding-top: 2rem;
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

.main-content {
    transition: margin-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.profile-container {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 2rem;
    margin-bottom: 2rem;
}

.profile-sidebar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(34, 197, 94, 0.1);
    height: fit-content;
    position: relative;
}

.profile-sidebar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
    border-radius: 20px 20px 0 0;
}

.profile-avatar {
    text-align: center;
    margin-bottom: 2rem;
}

.avatar-container {
    position: relative;
    display: inline-block;
    margin-bottom: 1rem;
}

.avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: var(--primary-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: white;
    font-weight: 600;
    margin: 0 auto;
    box-shadow: var(--shadow-soft);
}

.avatar-edit {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background: white;
    border: 2px solid var(--primary-green);
    border-radius: 50%;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.avatar-edit:hover {
    background: var(--primary-green);
    color: white;
}

.profile-name {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.profile-role {
    color: var(--text-secondary);
    font-weight: 500;
    margin-bottom: 1rem;
}

.profile-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-item {
    text-align: center;
    padding: 1rem;
    background: var(--light-green);
    border-radius: 12px;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-green);
}

.stat-label {
    font-size: 0.85rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.profile-actions {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.btn-action {
    background: var(--primary-gradient);
    color: white;
    padding: 0.75rem 1rem;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
    color: white;
}

.btn-secondary {
    background: white;
    color: var(--text-primary);
    border: 2px solid #e2e8f0;
}

.btn-secondary:hover {
    border-color: var(--primary-green);
    color: var(--primary-green);
}

.profile-main {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.profile-section {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(34, 197, 94, 0.1);
    position: relative;
}

.profile-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
    border-radius: 20px 20px 0 0;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.section-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.section-title i {
    color: var(--primary-green);
}

.edit-btn {
    background: none;
    border: none;
    color: var(--primary-green);
    cursor: pointer;
    font-weight: 600;
    padding: 0.5rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.edit-btn:hover {
    background: var(--light-green);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.form-floating {
    margin-bottom: 1.5rem;
}

.form-floating > .form-control,
.form-floating > .form-select {
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 1rem 0.75rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.8);
}

.form-floating > .form-control:focus,
.form-floating > .form-select:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.2rem rgba(34, 197, 94, 0.25);
    background: white;
}

.form-floating > .form-control:disabled {
    background: #f8fafc;
    border-color: #e2e8f0;
    color: var(--text-secondary);
}

.form-floating > label {
    color: var(--text-secondary);
    padding: 1rem 0.75rem;
}

.alert {
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    border: none;
    font-weight: 500;
}

.alert-success {
    background: var(--light-green);
    color: #16a34a;
    border-left: 4px solid var(--primary-green);
}

.alert-info {
    background: #dbeafe;
    color: #2563eb;
    border-left: 4px solid #3b82f6;
}

@media (max-width: 992px) {
    body {
        padding-left: 0;
        padding-top: calc(var(--navbar-height) + 1rem);
    }
            
    .sidebar-nav {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }
            
    .sidebar-nav.show {
        transform: translateX(0);
    }
            
    .profile-container {
        grid-template-columns: 1fr;
    }
            
    .navbar {
        padding: 1rem;
    }
            
    .form-row {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 0.5rem;
    }
            
    .profile-section,
    .profile-sidebar {
        padding: 1.5rem;
        margin: 0.5rem 0;
    }
            
    .navbar {
        padding: 0.75rem 1rem;
    }
            
    .navbar-nav {
        flex-direction: column;
        gap: 0.5rem;
    }
            
    body {
        padding-top: calc(var(--navbar-height) + 0.5rem);
    }
}

.loading {
    display: inline-block;
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255,255,255,.3);
    border-radius: 50%;
    border-top-color: #fff;
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg); 
    }
}

.mobile-menu-toggle {
    display: none;
    position: fixed;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    z-index: 1060;
    background: var(--primary-green);
    color: white;
    border: none;
    border-radius: 8px;
    width: 40px;
    height: 40px;
    cursor: pointer;
}

@media (max-width: 992px) {
    .mobile-menu-toggle {
        display: flex;
        align-items: center;
        justify-content: center;
    }
}

.footer {
    background: var(--text-primary);
    color: white;
    text-align: center;
    padding: 3rem 0;
}
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    
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

<!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
        <i class="bi bi-list"></i>
    </button>

    <div class="sidebar-nav" id="sidebar">
        <div class="d-flex flex-column h-100">
            <a class="nav-link" href="home.html">
                <i class="bi bi-house-door nav-icon fs-5"></i>
                <span class="nav-text">Home</span>
            </a>

            <a class="nav-link" href="submit.html">
                <i class="bi bi-pencil-square fs-5"></i>
                <span class="nav-text">Submit Complaint</span>
            </a>

            <a class="nav-link" href="track.html">
                <i class="bi bi-search fs-5"></i>
                <span class="nav-text">Track Status</span>
            </a>

            <a class="nav-link" href="community.html">
                <i class="bi bi-people-fill fs-5"></i>
                <span class="nav-text">Community</span>
            </a>

            <a class="nav-link" href="timetable.html">
                <i class="bi bi-calendar-check fs-5"></i>
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

            <a class="nav-link mt-auto activ" href="profile.html">
                <i class="bi bi-person-circle fs-5"></i>
                <span class="nav-text">Profile</span>
            </a>

            <a class="nav-link" href="login.html">
                <i class="bi bi-box-arrow-right fs-5"></i>
                <span class="nav-text">Logout</span>
            </a>
        </div>
    </div>


    <div class="main-content">
        <div class="container">
            <div class="profile-container">
<!-- Profile Sidebar -->
                <div class="profile-sidebar">
                    <div class="profile-avatar">
                        <div class="avatar-container">
                            <div class="avatar" id="profileAvatar">JD</div>
                            <div class="avatar-edit" onclick="editAvatar()">
                                <i class="bi bi-camera"></i>
                            </div>
                        </div>
                        <div class="profile-name" id="profileName">User Name</div>
                        <div class="profile-role" id="profileRole">Active Citizen</div>
                    </div>

                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-number">8</div>
                            <div class="stat-label">Issues Reported</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">7</div>
                            <div class="stat-label">Resolved</div>
                        </div>
                    </div>

                    <div class="profile-actions">
                        <button class="btn-action" onclick="editProfile()">
                            <i class="bi bi-pencil"></i>
                            Edit Profile
                        </button>
                        <a href="submit.html" class="btn-action btn-secondary">
                            <i class="bi bi-plus-circle"></i>
                            Report New Issue
                        </a>
                        
                    </div>
                </div>

                <div class="profile-main">
                    <div class="profile-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="bi bi-person"></i>
                                Personal Information
                            </h2>
                            <button class="edit-btn" onclick="toggleEdit('personal')">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                        </div>
                        
                        <div id="message"></div>
                        
                        <form id="personalForm">
                            <div class="form-row">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="firstName" value="User" disabled>
                                    <label for="firstName">
                                        <i class="bi bi-person me-2"></i>First Name
                                    </label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="lastName" value="Name" disabled>
                                    <label for="lastName">
                                        <i class="bi bi-person me-2"></i>Last Name
                                    </label>
                                </div>
                            </div>

                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" value="user.name@email.com" disabled>
                                <label for="email">
                                    <i class="bi bi-envelope me-2"></i>Email Address
                                </label>
                            </div>

                            <div class="form-row">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567" disabled>
                                    <label for="phone">
                                        <i class="bi bi-telephone me-2"></i>Phone Number
                                    </label>
                                </div>
                                <div class="form-floating">
                                    <select class="form-select" id="userType" disabled>
                                        <option value="citizen" selected>Citizen</option>
                                        <option value="business">Business Owner</option>
                                        <option value="organization">Organization</option>
                                    </select>
                                    <label for="userType">
                                        <i class="bi bi-person-badge me-2"></i>Account Type
                                    </label>
                                </div>
                            </div>

                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" value="username" disabled>
                                <label for="username">
                                    <i class="bi bi-at me-2"></i>Username
                                </label>
                            </div>

                            <div class="form-floating">
                                <input type="text" class="form-control" id="address" value="123 Main Street" disabled>
                                <label for="address">
                                    <i class="bi bi-geo-alt me-2"></i>Address
                                </label>
                            </div>

                            <div class="form-row">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="city" value="Springfield" disabled>
                                    <label for="city">
                                        <i class="bi bi-building me-2"></i>City
                                    </label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="postalCode" value="12345" disabled>
                                    <label for="postalCode">
                                        <i class="bi bi-mailbox me-2"></i>Postal Code
                                    </label>
                                </div>
                            </div>

                            <div id="editActions" style="display: none;">
                                <button type="submit" class="btn-action" style="margin-right: 1rem;">
                                    <i class="bi bi-check"></i>
                                    <span class="btn-text">Save Changes</span>
                                </button>
                                <button type="button" class="btn-action btn-secondary" onclick="cancelEdit('personal')">
                                    <i class="bi bi-x"></i>
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CityResolve. All rights reserved. Connecting citizens with local government.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        //Variables to track edit state and original data
let isEditing = false;
let originalData = {};
        
function editProfile() {
    if (!isEditing) {
            toggleEdit('personal');
    }
}
        
function toggleEdit(section) {
    const form = document.getElementById('personalForm');
    const inputs = form.querySelectorAll('input, select');
    const editActions = document.getElementById('editActions');
    const editBtn = document.querySelector('.edit-btn');
            
    if (!isEditing) {
// Store original data
        inputs.forEach(input => {
            originalData[input.id] = input.value;
        });
                
// Enable editing
        inputs.forEach(input => {
            if (input.id !== 'email' && input.id !== 'username') {
                input.disabled = false;
            }
        });
                
        editActions.style.display = 'block';
        editBtn.innerHTML = '<i class="bi bi-x"></i> Cancel';
        isEditing = true;
    } else {
        cancelEdit(section);
    }
}
       
function cancelEdit(section) {
    const form = document.getElementById('personalForm');
    const inputs = form.querySelectorAll('input, select');
    const editActions = document.getElementById('editActions');
    const editBtn = document.querySelector('.edit-btn');
            
// Restore original data
    inputs.forEach(input => {
        if (originalData[input.id]) {
            input.value = originalData[input.id];
        }
        input.disabled = true;
    });
            
    editActions.style.display = 'none';
    editBtn.innerHTML = '<i class="bi bi-pencil"></i> Edit';
    isEditing = false;
        document.getElementById('message').innerHTML = '';
}
        
function editAvatar() {
    showMessage('Avatar upload feature would be implemented here. You could upload a new profile picture or choose from preset avatars.', 'info');
}
        
function toggleMobileMenu() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}
        
// Form submission
document.getElementById('personalForm').addEventListener('submit', function(e) {
    e.preventDefault();
            
    const submitButton = this.querySelector('button[type="submit"]');
    const buttonText = submitButton.querySelector('.btn-text');
            
// Show loading state
    submitButton.disabled = true;
    buttonText.innerHTML = '<span class="loading"></span> Saving...';
            
// Simulate API call
    setTimeout(() => {
        showMessage('Profile updated successfully!', 'success');
                
// Update profile display
        updateProfileDisplay();
                
// Reset form state
        const inputs = this.querySelectorAll('input, select');
        inputs.forEach(input => input.disabled = true);
                
        document.getElementById('editActions').style.display = 'none';
        document.querySelector('.edit-btn').innerHTML = '<i class="bi bi-pencil"></i> Edit';
        isEditing = false;
                
        submitButton.disabled = false;
        buttonText.innerHTML = 'Save Changes';
                
// Clear message after 3 seconds
        setTimeout(() => {
            document.getElementById('message').innerHTML = '';
        }, 3000);
    }, 1500);
});
        
function updateProfileDisplay() {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const userType = document.getElementById('userType').value;
            
// Update sidebar
    document.getElementById('profileName').textContent = `${firstName} ${lastName}`;
    document.getElementById('profileRole').textContent = userType.charAt(0).toUpperCase() + userType.slice(1);
            
// Update avatar initials
    const initials = firstName.charAt(0) + lastName.charAt(0);
    document.getElementById('profileAvatar').textContent = initials.toUpperCase();
}

function showMessage(message, type = 'success') {
    const messageDiv = document.getElementById('message');
    const alertClass = type === 'success' ? 'alert-success' : 'alert-info';
    const icon = type === 'success' ? 'bi-check-circle' : 'bi-info-circle';
            
    messageDiv.innerHTML = `
        <div class="alert ${alertClass}" role="alert">
            <i class="${icon} me-2"></i>${message}
        </div>
    `;
}
        
// Add smooth focus animations
const inputs = document.querySelectorAll('.form-control, .form-select');
inputs.forEach(input => {
    input.addEventListener('focus', () => {
// console.log(`Input with ID ${input.id} is focused!`);
    });

    input.addEventListener('blur', () => {
// console.log(`Input with ID ${input.id} lost focus.`);
    });
});
    </script>
</body>
</html>
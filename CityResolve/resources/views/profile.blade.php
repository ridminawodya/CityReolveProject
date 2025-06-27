<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles8.css')}}">
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
                        <a class="nav-link" href="/home">
                        <i class="bi bi-translate fs-5"></i>
                        <span class="nav-text">Sinhala</span>
                    </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/home">
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
            <a class="nav-link" href="/home">
                <i class="bi bi-house-door nav-icon fs-5"></i>
                <span class="nav-text">Home</span>
            </a>

            <a class="nav-link" href="/submit">
                <i class="bi bi-pencil-square fs-5"></i>
                <span class="nav-text">Submit Complaint</span>
            </a>

            <a class="nav-link" href="/track">
                <i class="bi bi-search fs-5"></i>
                <span class="nav-text">Track Status</span>
            </a>

            <a class="nav-link" href="/community">
                <i class="bi bi-people-fill fs-5"></i>
                <span class="nav-text">Community</span>
            </a>

            <a class="nav-link" href="/timetable">
                <i class="bi bi-calendar-check fs-5"></i>
                <span class="nav-text">Service Schedule</span>
            </a>            

            <a class="nav-link" href="/about">
                <i class="bi bi-info-circle fs-5"></i>
                <span class="nav-text">About Us</span>
            </a>

            <a class="nav-link" href="/payment">
                <i class="bi bi-credit-card fs-5"></i>
                <span class="nav-text">Payments</span>
            </a>

            <a class="nav-link mt-auto activ" href="/profile">
                <i class="bi bi-person-circle fs-5"></i>
                <span class="nav-text">Profile</span>
            </a>

            <a class="nav-link" href="/login">
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
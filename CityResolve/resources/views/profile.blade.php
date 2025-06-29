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

    <footer class="footer mt-auto">
        <div class="container py-5">
            <div class="row">

                <!-- Column 1: Quick Links -->
                <div class="col-md-4 col-lg-4 mb-4 mb-md-0">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50"> Services & Permits</a></li>
                        <li><a href="#" class="text-white-50"> Online Payments</a></li>
                        <li><a href="#" class="text-white-50"> Public Notices</a></li>
                    </ul>
                </div>

                <!-- Column 2: Contact Us -->
                <div class="col-md-4 col-lg-4 mb-4 mb-md-0">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt-fill me-2 text-white-50"></i> No. 15, Peradeniya Road, Kandy 20000, Sri Lanka.</li>
                        <li><a href="tel:+1234567890" class="text-white-50"><i class="bi bi-telephone-fill me-2"></i> +(94) 81 223 4567</a></li>
                        <li><a href="mailto:info@cityresolve.gov" class="text-white-50"><i class="bi bi-envelope-fill me-2"></i> info@cityresolve.gov</a></li><br>
                        <li class="mt-3 text-white-50 fw-bold">Office Hours:</li>
                        <li class="text-white-50">Mon - Fri: 8:00 AM - 5:00 PM</li>
                    </ul>
                </div>

                <!-- Column 3: Stay Connected -->
                <div class="col-md-4 col-lg-4 text-center">
                    <h5>Stay Connected</h5>
                    <p class="text-white-50">Follow us on social media for updates and news.</p>
                    <div class="d-flex justify-content-center gap-2 mb-4 social-icon-wrapper">

                        <a href="https://facebook.com/yourcouncil" target="_blank" aria-label="Facebook"
                           class="social-icon-link facebook">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="https://instagram.com/yourcouncil" target="_blank" aria-label="Instagram"
                           class="social-icon-link instagram">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="https://twitter.com/yourcouncil" target="_blank" aria-label="Twitter"
                           class="social-icon-link twitter">
                            <i class="bi bi-twitter"></i>
                        </a>

                        <a href="https://linkedin.com/company/yourcouncil" target="_blank" aria-label="LinkedIn"
                           class="social-icon-link linkedin">
                            <i class="bi bi-linkedin"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright Bar -->
        <div class="container text-center">
            <span class="text-white-50">
                &copy; <span id="current-year-bottom"></span> CityResolve Municipal Council. All rights reserved.
            </span>
            <span class="d-block d-md-inline-block ms-md-3">
                <a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a> |
                <a href="#" class="text-white-50 text-decoration-none ms-2">Terms of Service</a>
            </span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/script8.js')}}"></script>
</body>
</html>
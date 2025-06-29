<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Submit a Complaint</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles2.css')}}">
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

    <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
    <i class="bi bi-list"></i>
</button>

<!-- Sidebar Navigation -->
    <div class="sidebar-nav" id="sidebar">
        <div class="d-flex flex-column h-100 py-20">
            <a class="nav-link" href="/home">
                <i class="bi bi-house-door nav-icon fs-5"></i>
                <span class="nav-text">Home</span>
            </a>

            <a class="nav-link active" href="/submit">
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

            <a class="nav-link mt-auto" href="/profile">
                <i class="bi bi-person-circle fs-5"></i>
                <span class="nav-text">Profile</span>
            </a>

            <a class="nav-link" href="/login">
                <i class="bi bi-box-arrow-right fs-5"></i>
                <span class="nav-text">Logout</span>
            </a>

        </div>
    </div>

<!-- Main Content Area -->
    <div class="main-content">
<!-- Main Form Section -->
        <section class="form-section">
        <div class="form-container">
            <h2 class="form-title">
                <i class="bi bi-send"></i> Submit a Complaint
            </h2>
            
            <div class="success-message" id="successMessage">
                <i class="bi bi-check-circle"></i> Your complaint has been submitted successfully!
            </div>

            <form id="complaintForm">
                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-tag"></i> Category
                    </label>
                    <select class="form-select" required>
                        <option value="">Select Category</option>
                        <option value="road">Road & Transportation</option>
                        <option value="water">Water & Sanitation</option>
                        <option value="electricity">Electricity</option>
                        <option value="garbage">Garbage Collection</option>
                        <option value="noise">Noise Pollution</option>
                        <option value="street-lights">Street Lights</option>
                        <option value="parks">Parks & Recreation</option>
                        <option value="building">Building & Construction</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-pencil-square"></i> Description
                    </label>
                    <textarea class="form-control" rows="5" placeholder="Describe your issue..." required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-geo-alt"></i> Location
                    </label>
                    <input type="text" class="form-control" placeholder="Enter location" required>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="bi bi-camera"></i> Attach Photo (optional)
                    </label>
                    <input type="file" class="form-control" accept="image/*">
                </div>

                <div class="text-center">
                    <button type="submit" class="submit-btn">
                        <i class="bi bi-send"></i>
                        Submit Complaint
                    </button>
                </div>
            </form>
        </div>
        </section>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/script2.js')}}"></script>
</body>
</html>
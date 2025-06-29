<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CityResolve - About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles6.css')}}">
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

<!-- About Section -->
    <section class="about-section">
        <div class="about-container">
            <div class="about-card">
                <div class="about-content">
                    <div class="about-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>
                    
                    <h1 class="section-title">
                        About CityResolve
                    </h1>
                    
                    <p class="about-description">
                        <b>CityResolve</b> is a next-generation digital platform designed to streamline communication between citizens and municipal authorities, ensuring timely and transparent resolution of urban issues. Our system empowers residents to report problems, track progress, and see how their feedback shapes city improvements.
                    </p>
                    
                    <ul class="features-list">
                        <li class="feature-item">
                            <div class="feature-icon success">
                                <i class="bi bi-check2-circle"></i>
                            </div>
                            <div class="feature-text">Simple, intuitive complaint submission</div>
                        </li>
                        
                        <li class="feature-item">
                            <div class="feature-icon primary">
                                <i class="bi bi-bell"></i>
                            </div>
                            <div class="feature-text">Real-time status updates and notifications</div>
                        </li>
                        
                        <li class="feature-item">
                            <div class="feature-icon info">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <div class="feature-text">Data-driven municipal planning</div>
                        </li>
                        
                        <li class="feature-item">
                            <div class="feature-icon warning">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <div class="feature-text">Secure, verified complaints</div>
                        </li>
                        
                        <li class="feature-item">
                            <div class="feature-icon secondary">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="feature-text">Community participation and feedback</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

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
    <script src="{{asset('js/script6.js')}}"></script>
</body>
</html>
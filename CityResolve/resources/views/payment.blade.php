<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Tax Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles7.css')}}">
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
                        <a class="nav-link" href="#">
                        <i class="bi bi-translate fs-5"></i>
                        <span class="nav-text">Sinhala</span>
                    </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
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

<div class="sidebar-nav" id="sidebar">
        <div class="d-flex flex-column h-100 py-20">
            <a class="nav-link" href="/">
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
                <span class="nav-text">Tax Payments</span>
            </a>

            <a class="nav-link mt-auto" href="/register">
                <i class="bi bi-box-arrow-right fs-5"></i>
                <span class="nav-text">Sign Up</span>
            </a>

            <a class="nav-link" href="/login">
                <i class="bi bi-person-circle fs-5"></i>
                <span class="nav-text">Login</span>
            </a>
        </div>
    </div>

<div class="main-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    <i class="bi bi-credit-card"></i>
                    Municipal Tax Payment
                </h1>
                <p class="page-subtitle">Manage and pay your municipal taxes securely online</p>
            </div>

            <div class="tax-overview">
                <div class="tax-card overdue">
                    <div class="tax-card-header">
                        <div class="tax-type">Property Tax (Rates)</div>
                    </div>
                    <div class="tax-amount">LKR 25,500.00</div>
                </div>

                <div class="tax-card due-soon">
                    <div class="tax-card-header">
                        <div class="tax-type">Business License</div>
                    </div>
                    <div class="tax-amount">LKR 8,750.00</div>
                </div>

                <div class="tax-card paid">
                    <div class="tax-card-header">
                        <div class="tax-type">Waste Management</div>
                    </div>
                    <div class="tax-amount">LKR 1,200.00</div>
                </div>

                <div class="tax-card due-soon">
                    <div class="tax-card-header">
                        <div class="tax-type">Tax on Trades & Businesses</div>
                    </div>
                    <div class="tax-amount">LKR 6,200.00</div>
                </div>

                <div class="tax-card overdue">
                    <div class="tax-card-header">
                        <div class="tax-type">Vehicle Tax (Annual)</div>
                    </div>
                    <div class="tax-amount">LKR 2,800.00</div>
                </div>

                <div class="tax-card paid">
                    <div class="tax-card-header">
                        <div class="tax-type">Council Property Rent</div>
                    </div>
                    <div class="tax-amount">LKR 15,000.00</div>
                </div>

                <div class="tax-card">
                    <div class="tax-card-header">
                        <div class="tax-type">Public Performance License</div>
                    </div>
                    <div class="tax-amount">LKR 1,500.00</div>
                </div>

                <div class="tax-card">
                    <div class="tax-card-header">
                        <div class="tax-type">Street Lighting Tax</div>
                    </div>
                    <div class="tax-amount">LKR 3,500.00</div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto">
        <div class="container py-5">
            <div class="row">

                <div class="col-md-4 col-lg-4 mb-4 mb-md-0">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/timetable" class="text-white-50"> Services & Permits</a></li>
                        <li><a href="/payment" class="text-white-50"> Online Payments</a></li>
                        <li><a href="/community" class="text-white-50"> Public Notices</a></li>
                    </ul>
                </div>

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
    <script src="{{asset('js/script7.js')}}"></script>
</body>
</html>
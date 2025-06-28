<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CityResolve - Municipal Complaint Resolution System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
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

    <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
        <i class="bi bi-list"></i>
    </button>

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


    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Empowering Citizens. Resolving Issues.</h1>
                <p>CityResolve is your one-stop platform for reporting and tracking municipal complaints. Ever wish reporting a local issue was easier? With CityResolve, it is! We're here to help you connect directly with your municipal council, making sure your concerns are heard and resolved. Join the community and make your city better!</p>
                <a href="/submit" class="btn-primary">
                    <i class="bi bi-pencil-square me-2"></i>Submit a Complaint
                </a>
            </div>

            <div class="hero-visual">
                <div class="phone-mockup">
                    <div class="phone-screen">
                    </div>
                </div>
                <div class="feature-grid">
                    <div class="feature-card"><i class="bi bi-building"></i></div>
                    <div class="feature-card"><i class="bi bi-people"></i></div>
                    <div class="feature-card"><i class="bi bi-chat-dots"></i></div>
                    <div class="feature-card"><i class="bi bi-geo-alt"></i></div>
                    <div class="feature-card"><i class="bi bi-camera"></i></div>
                    <div class="feature-card"><i class="bi bi-bell"></i></div>
                    <div class="feature-card"><i class="bi bi-graph-up"></i></div>
                    <div class="feature-card"><i class="bi bi-shield-check"></i></div>
                </div>
            </div>

        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="features-content">
            <div class="features-visual">
                <div style="position: relative; text-align: center;">
                    <div style="background: var(--light-green); padding: 3rem; border-radius: 20px; display: inline-block;">
                        <i class="bi bi-phone" style="font-size: 4rem; color: var(--primary-green);"></i>
                        <div style="margin-top: 1rem; font-size: 1.2rem; color: var(--text-primary); font-weight: 600;">How it Works</div>
                    </div>
                </div>
            </div>

            <div class="features-text">
                <h2>How It Works</h2>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <div class="feature-content">
                        <h3>Submit Your Complaint</h3>
                        <p>Describe your issue and upload relevant photos or documents.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Track Progress</h3>
                        <p>Monitor the status of your complaint in real time.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-emoji-smile"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Get Resolution</h3>
                        <p>Receive updates and feedback once the issue is resolved.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- App Features Section -->
    <section class="app-features-section">
        <div class="app-features-content">
            <h2 class="section-title">Platform Features</h2>
            <div class="phones-mockup">
                <div class="phone-small">
                    <div class="phone-screen" style="background-image: url('{{ asset('assets/photos/complain.png')}}');">
                    </div>
                </div>

                <div class="phone-small">
                    <div class="phone-screen" style="background-image: url('{{ asset('assets/photos/payment.png')}}');">
                    </div>
                </div>

                <div class="phone-small">
                    <div class="phone-screen" style="background-image: url('{{ asset('assets/photos/status.png')}}');">
                    </div>
                </div>

            </div>

            <div class="app-features-grid">
                <div class="app-feature-card">
                    <h3><i class="bi bi-phone me-2" style="color: var(--primary-green);"></i>CityResolve Mobile Application</h3>
                    <p>Easily report local issues like potholes or waste from your phone. Help make your community better, anytime, anywhere.</p>
                </div>

                <div class="app-feature-card">
                    <h3><i class="bi bi-globe me-2" style="color: var(--primary-green);"></i>CityResolve Web Admin for Councils</h3>
                    <p>Streamline how your council manages and responds to citizen complaints. Deliver efficient public service with a clear overview of all issues.</p>
                </div>

                <div class="app-feature-card">
                    <h3><i class="bi bi-person-gear me-2" style="color: var(--primary-green);"></i>Seamless Submission & Convenience</h3>
                    <p>Pay your taxes from anywhere, at any time, with just a few clicks. Our platform makes filing quick and hassle-free, fitting right into your busy schedule.</p>
                </div>

                <div class="app-feature-card">
                    <h3><i class="bi bi-shield-check me-2" style="color: var(--primary-green);"></i>Real-Time Service Schedules</h3>
                    <p>Access up-to-the-minute service schedules directly from your device. Plan your day efficiently and avoid</p>
                </div>

                <div class="app-feature-card">
                    <h3><i class="bi bi-bell me-2" style="color: var(--primary-green);"></i>Updates</h3>
                    <p>Get instant updates directly to your phone about your complaint's status. Stay informed about important local government news without effort.</p>
                </div>

                <div class="app-feature-card">
                    <h3><i class="bi bi-people me-2" style="color: var(--primary-green);"></i>Better Engagement</h3>
                    <p>Foster transparency and accountability between citizens and local government. Build a stronger community through enhanced communication and trust.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">120</div>
                <div class="stat-label">Complaints Resolved</div>
            </div>

            <div class="stat-item">
                <div class="stat-number">116</div>
                <div class="stat-label">Active Users</div>
            </div>


            <div class="stat-item">
                <div class="stat-number">96%</div>
                <div class="stat-label">Satisfaction Rate</div>
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
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
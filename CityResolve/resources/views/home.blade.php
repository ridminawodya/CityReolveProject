<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CityResolve - Municipal Complaint Resolution System</title>
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
    position: fixed; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%; 
    z-index: -1;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    overflow: hidden;
}

.animated-bg::before {
    content: '';
    position: absolute;
    top: -50%; 
    left: -50%; 
    width: 200%; 
    height: 200%;
    background: radial-gradient(circle, rgba(34, 197, 94, 0.1) 2px, transparent 2px);
    background-size: 40px 40px;
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { 
        transform: translate(0, 0) rotate(0deg); 
    }
    50% { 
        transform: translate(-20px, -20px) rotate(180deg); 
    }
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
    left: 0; 
    top: 0; 
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

.hero-section {
    background: linear-gradient(135deg, var(--background-green) 0%, var(--light-green) 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    padding-top: 150px;
    padding-bottom: 100px;
}

.hero-section::before {
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

.hero-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 1;
}

.hero-text h1 {
    font-size: 3.5rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.hero-text p {
    font-size: 1.2rem;
    color: var(--text-secondary);
    margin-bottom: 2rem;
    line-height: 1.8;
}

.btn-primary {
    background: var(--primary-gradient);
    color: white;
    padding: 1rem 2.5rem;
    border: none;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    box-shadow: var(--shadow-soft);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-hover);
    color: white;
}

.hero-visual {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.phone-mockup {
    width: 300px;
    height: 600px;
    background: #1f2937;
    border-radius: 35px;
    padding: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    position: relative;
    z-index: 2;
}

.phone-screen {
    width: 100%;
    height: 100%;
    background: var(--primary-green);
    border-radius: 25px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    position: relative;
    overflow: hidden;
    background-image: url('council.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.phone-screen::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.1) 50%, transparent 60%);
    animation: shine 3s ease-in-out infinite;
}

@keyframes shine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.feature-grid {
    position: absolute;
    right: -100px;
    top: 50%;
    transform: translateY(-50%);
    display: grid;
    grid-template-columns: repeat(4, 80px);
    gap: 15px;
    opacity: 0.8;
}

.feature-card {
    width: 80px;
    height: 80px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    animation: float-cards 6s ease-in-out infinite;
}

.feature-card:nth-child(1) { 
    background: #ef4444; 
    animation-delay: 0s; 
}

.feature-card:nth-child(2) { 
    background: #f97316; 
    animation-delay: 0.5s; 
}

.feature-card:nth-child(3) { 
    background: #eab308; 
    animation-delay: 1s; 
}

.feature-card:nth-child(4) { 
    background: #22c55e; 
    animation-delay: 1.5s; 
}

.feature-card:nth-child(5) { 
    background: #06b6d4; 
    animation-delay: 2s; 
}

.feature-card:nth-child(6) { 
    background: #3b82f6; 
    animation-delay: 2.5s; 
}

.feature-card:nth-child(7) { 
    background: #8b5cf6; 
    animation-delay: 3s; 
}

.feature-card:nth-child(8) { 
    background: #ec4899; 
    animation-delay: 3.5s; 
}

@keyframes float-cards {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.features-section {
    padding: 6rem 0;
    background: white;
}

.features-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

.features-visual {
    position: relative;
}

.features-text h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 2rem;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: var(--glass-bg);
    border-radius: 15px;
    transition: all 0.3s ease;
    border-left: 4px solid var(--primary-green);
}

.feature-item:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-soft);
}

.feature-icon {
    width: 50px;
    height: 50px;
    background: var(--primary-gradient);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.feature-content h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.feature-content p {
    color: var(--text-secondary);
    line-height: 1.6;
}

.app-features-section {
    padding: 6rem 0;
    background: var(--background-green);
}

.app-features-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    text-align: center;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 3rem;
}

.app-features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.app-feature-card {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    border-top: 4px solid var(--primary-green);
}

.app-feature-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-hover);
}

.app-feature-card h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.app-feature-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

.phones-mockup {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin: 3rem 0;
}

.phone-small {
    width: 200px;
    height: 400px;
    background: #1f2937;
    border-radius: 25px;
    padding: 15px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.phone-small .phone-screen {
    width: 100%;
    height: 100%;
    border-radius: 15px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    background-color: var(--primary-green);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    font-size: 0.8rem;
}

.footer {
    background: var(--text-primary);
    color: white;
    text-align: center;
    padding: 3rem 0;
}

@media (max-width: 768px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
            
    .hero-text h1 {
        font-size: 2.5rem;
    }
            
    .features-content {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
            
    .feature-grid {
        display: none;
    }
            
    .phone-mockup {
        width: 250px;
        height: 500px;
    }
            
    .phones-mockup {
        flex-direction: column;
        align-items: center;
    }
}

.stats-section {
    padding: 4rem 0;
    background: white;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    max-width: 800px;
    margin: 0 auto;
    padding: 0 2rem;
}

.stat-item {
    text-align: center;
    padding: 2rem 1rem;
    background: var(--glass-bg);
    border-radius: 15px;
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-soft);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary-green);
    margin-bottom: 0.5rem;
}

.stat-label {
    color: var(--text-secondary);
    font-weight: 500;
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


    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Empowering Citizens. Resolving Issues.</h1>
                <p>CityResolve is your one-stop platform for reporting and tracking municipal complaints. Ever wish reporting a local issue was easier? With CityResolve, it is! We're here to help you connect directly with your municipal council, making sure your concerns are heard and resolved. Join the community and make your city better!</p>
                <a href="submit.html" class="btn-primary">
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
                    <div class="phone-screen" style="background-image: url('complain.png');">
                    </div>
                </div>

                <div class="phone-small">
                    <div class="phone-screen" style="background-image: url('payment.png');">
                    </div>
                </div>

                <div class="phone-small">
                    <div class="phone-screen" style="background-image: url('status.png');">
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
    <script>
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

// Add scroll effect to navbar
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 100) {
        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
    } else {
        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
    }
});

// Animate stats on scroll
const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px 0px -100px 0px'
};


const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumber = entry.target.querySelector('.stat-number');
            const finalNumber = parseInt(statNumber.textContent.replace(/[^\d]/g, ''));
            animateNumber(statNumber, finalNumber);
        }
    });
}, observerOptions);

document.querySelectorAll('.stat-item').forEach(stat => {
    observer.observe(stat);
});

//Animate Number Function
function animateNumber(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString() + 
            (element.textContent.includes('%') ? '%' : 
            element.textContent.includes('+') ? '+' : '');
    }, 20);
}
    </script>
</body>
</html>
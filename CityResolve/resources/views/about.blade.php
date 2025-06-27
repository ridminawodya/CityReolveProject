<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CityResolve - About Us</title>
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

.about-section {
    padding: 8rem 0 6rem 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
}

.about-section::before {
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

.about-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 1;
}

.about-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 4rem;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(34, 197, 94, 0.1);
    transition: all 0.3s ease;
}

.about-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.section-title {
    font-size: 3rem;
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
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 4px;
    background: var(--primary-gradient);
    border-radius: 2px;
}

.about-description {
    font-size: 1.2rem;
    color: var(--text-secondary);
    text-align: center;
    margin-bottom: 3rem;
    line-height: 1.8;
}

.about-description b {
    color: var(--primary-green);
    font-weight: 700;
}

.features-list {
    list-style: none;
    padding: 0;
    margin: 2rem 0;
}

.feature-item {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    margin-bottom: 1rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 15px;
    transition: all 0.3s ease;
    border-left: 4px solid var(--primary-green);
    box-shadow: 0 5px 15px rgba(34, 197, 94, 0.05);
}

.feature-item:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-soft);
    background: white;
}

.feature-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    margin-right: 1.5rem;
    flex-shrink: 0;
}

.feature-icon.success { 
    background: linear-gradient(135deg, #22c55e, #16a34a); 
    color: white; 
}

.feature-icon.primary { 
    background: linear-gradient(135deg, #3b82f6, #1d4ed8); 
    color: white; 
}

.feature-icon.info { 
    background: linear-gradient(135deg, #06b6d4, #0891b2); 
    color: white; 
}

.feature-icon.warning { 
    background: linear-gradient(135deg, #f59e0b, #d97706); 
    color: white; 
}

.feature-icon.secondary { 
    background: linear-gradient(135deg, #6b7280, #4b5563); 
    color: white; 
}

.feature-text {
    font-size: 1.1rem;
    color: var(--text-primary);
    font-weight: 500;
}

.closing-text {
    font-size: 1.1rem;
    color: var(--text-secondary);
    text-align: center;
    margin-top: 2rem;
    padding: 2rem;
    background: linear-gradient(135deg, var(--light-green) 0%, rgba(34, 197, 94, 0.1) 100%);
    border-radius: 15px;
    border-left: 4px solid var(--primary-green);
}

.about-icon {
    width: 100px;
    height: 100px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2.5rem;
    margin: 0 auto 2rem auto;
    box-shadow: var(--shadow-soft);
    animation: pulse 3s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.footer {
    background: var(--text-primary);
    color: white;
    text-align: center;
    padding: 3rem 0;
}

@media (max-width: 768px) {
    .about-section {
        padding: 6rem 0 4rem 0;
    }
            
    .section-title {
        font-size: 2.2rem;
    }
            
    .about-card {
        padding: 2.5rem;
    }
            
    .about-description {
        font-size: 1.1rem;
    }
            
    .feature-item {
        flex-direction: column;
        text-align: center;
        padding: 1.5rem 1rem;
    }
            
    .feature-icon {
        margin-right: 0;
        margin-bottom: 1rem;
    }
}

.feature-item {
    animation: slideInLeft 0.6s ease-out;
    animation-fill-mode: both;
}

.feature-item:nth-child(1) { 
    animation-delay: 0.1s; 
}
.feature-item:nth-child(2) { 
    animation-delay: 0.2s; 
}

.feature-item:nth-child(3) { 
    animation-delay: 0.3s; 
}

.feature-item:nth-child(4) { 
    animation-delay: 0.4s; 
}

.feature-item:nth-child(5) { 
    animation-delay: 0.5s; 
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.about-content {
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
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

<!-- Sidebar Navigation -->
    <div class="sidebar-nav">
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

<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CityResolve. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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

//Creates an options object for the intersection observer
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
        }
    });
}, observerOptions);

// Observe feature items for animation
document.querySelectorAll('.feature-item').forEach(item => {
    observer.observe(item);
});
    </script>
</body>
</html>
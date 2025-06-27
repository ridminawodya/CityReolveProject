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
        * {
    font-family: 'Inter', sans-serif;
}
    
:root {
    --primary-green: #22c55e;
    --primary-gradient: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    --secondary-gradient: linear-gradient(135deg, #34d399 0%, #22c55e 100%);
    --light-green: #dcfce7;
    --background-green: #e8f5e8;
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --shadow-soft: 0 10px 40px rgba(34, 197, 94, 0.1);
    --shadow-hover: 0 20px 60px rgba(34, 197, 94, 0.15);
    --glass-bg: rgba(255, 255, 255, 0.9);
    --success-gradient: linear-gradient(135deg,#22c55e 0%,#16a34a 100%);
}

body {
    background: var(--background-green);
    min-height: 100vh;
}

.animated-bg {
    position: fixed; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%; 
    z-index: -1;
    background: var(--background-green); 
    overflow: hidden;
}

.animated-bg::before {
    content: '';
    position: absolute;
    top: -50%; 
    left: -50%; 
    width: 200%; 
    height: 200%;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
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
    left: 0; 
    top: 0; 
    height: 100%; 
    width: 0;
    background: var(--success-gradient); transition: width 0.3s ease; z-index: -1;
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

.glass {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
}
    
.section-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.section-title i {
    background: var(--secondary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
    
.icon-circle {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: var(--primary-green);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 2rem;
    margin-right: 1rem;
}
    
.complaint-feed {
    max-height: 260px;
    overflow-y: auto;
    background: rgba(248, 250, 252, 0.8);
    border-radius: 1rem;
    padding: 1rem;
    margin-bottom: 1rem;
    border: 1px solid rgba(34, 197, 94, 0.1);
}

.complaint-feed::-webkit-scrollbar {
    width: 8px;
    background: #e9ecef;
    border-radius: 4px;
}

.complaint-feed::-webkit-scrollbar-thumb {
    background: var(--primary-green);
    border-radius: 4px;
}

.badge.bg-info {
    background-color: var(--primary-green) !important;
}

.badge.bg-warning {
    background-color: #f59e0b !important;
}

.badge.bg-success {
    background-color: #10b981 !important;
}

.btn-outline-primary {
    border-color: var(--primary-green);
    color: var(--primary-green);
}

.btn-outline-primary:hover {
    background-color: var(--primary-green);
    border-color: var(--primary-green);
}

#community {
    background: transparent !important;
    padding: 3rem 0;
    margin-top: 100px;
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
<!-- Animated Background -->
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

            <a class="nav-link active" href="/community">
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

    <section id="community" class="py-5">
        <div class="container">
            <div class="glass p-5 mx-auto" style="max-width: 800px;">
                <div class="section-title text-center mb-4"><i class="bi bi-people"></i> Community Feed</div>
                <div class="complaint-feed">
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-primary"><i class="bi bi-geo-alt"></i></div>
                            <div>
                                <span class="fw-bold">Water Leakage</span> <span class="badge bg-info">In Progress</span>
                                <div class="small text-muted">Park Road, 2 hours ago</div>
                            </div>
                        </div>
                        <div class="ms-5 mt-1 text-secondary">"There is a water leak near the children's park, causing slippery conditions."</div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-warning"><i class="bi bi-lightbulb"></i></div>
                            <div>
                                <span class="fw-bold">Streetlight Outage</span> <span class="badge bg-warning text-dark">Pending</span>
                                <div class="small text-muted">Sunset Avenue, 4 hours ago</div>
                            </div>
                        </div>
                        <div class="ms-5 mt-1 text-secondary">"Streetlights have not been working for three nights, area is very dark."</div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-success"><i class="bi bi-tree"></i></div>
                            <div>
                                <span class="fw-bold">Fallen Tree</span> <span class="badge bg-success">Resolved</span>
                                <div class="small text-muted">Maple Street, 1 day ago</div>
                            </div>
                        </div>
                        <div class="ms-5 mt-1 text-secondary">"A tree has fallen and is blocking the sidewalk. Please clear it soon."</div>
                    </div>
                </div>
                <div class="text-end">
                    <a href="/submit" class="btn btn-outline-primary btn-sm"><i class="bi bi-plus-circle"></i> Raise a New Complaint</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CityResolve. All rights reserved. Connecting citizens with local government.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
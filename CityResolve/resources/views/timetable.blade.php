<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Service Schedule</title>
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
    --warning-color: #f59e0b;
    --danger-color: #ef4444;
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

.sidebar-nav .nav-link.active {
    color: white;
    transform: translateX(10px);
}

.sidebar-nav .nav-link.active::before {
    width: 100%;
}

.main-content {
    transition: margin-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.page-header {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(34, 197, 94, 0.1);
    position: relative;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
    border-radius: 20px 20px 0 0;
}

.page-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.page-title i {
    color: var(--primary-green);
}

.page-subtitle {
    color: var(--text-secondary);
    font-size: 1.1rem;
    font-weight: 500;
}

.schedule-section {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(34, 197, 94, 0.1);
    position: relative;
    margin-bottom: 2rem;
}

.schedule-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
    border-radius: 20px 20px 0 0;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.section-title i {
    color: var(--primary-green);
}

.table-responsive {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid rgba(34, 197, 94, 0.1);
}

.table {
    margin-bottom: 0;
    background-color: #fff;
}

.table th, .table td {
    padding: 1rem;
    vertical-align: middle;
    border-top: 1px solid #e2e8f0;
}

.table thead th {
    background-color: var(--primary-green);
    color: white;
    font-weight: 600;
    border-bottom: none;
}

.table tbody tr:hover {
    background-color: var(--light-green);
}

.badge {
    padding: 0.5em 0.8em;
    border-radius: 20px;
    font-weight: 600;
}

.badge-primary {
    background-color: rgba(34, 197, 94, 0.1);
    color: var(--primary-green);
}

.badge-info {
    background-color: rgba(100, 116, 139, 0.1);
    color: #64748b;
}

.badge-warning {
    background-color: rgba(245, 158, 11, 0.1);
    color: var(--warning-color);
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

    .mobile-menu-toggle {
        display: flex;
        align-items: center;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 0.5rem;
    }

    .schedule-section,
    .page-header {
        padding: 1.5rem;
        margin: 0.5rem 0;
    }

    .page-title {
        font-size: 1.5rem;
    }
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
        <div class="d-flex flex-column h-100">
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
                <i class="bi bi-calendar-check fs-5"></i>
                <span class="nav-text">Tax Payment</span>
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

    <div class="main-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    <i class="bi bi-calendar-check"></i>
                    Municipal Service Schedule
                </h1>
                <p class="page-subtitle">View the schedule for various municipal services in your area.</p>
            </div>

            <div class="schedule-section">
                <h2 class="section-title">
                    <i class="bi bi-trash"></i>
                    Waste Collection Schedule
                </h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Area/Zone</th>
                                <th>Day(s)</th>
                                <th>Time Slot</th>
                                <th>Service Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Zone A (North)</td>
                                <td>Monday, Thursday</td>
                                <td>7:00 AM - 11:00 AM</td>
                                <td>Household Waste</td>
                            </tr>
                            <tr>
                                <td>Zone B (South)</td>
                                <td>Tuesday, Friday</td>
                                <td>8:00 AM - 12:00 PM</td>
                                <td>Household Waste</td>
                            </tr>
                            <tr>
                                <td>Zone C (East)</td>
                                <td>Wednesday, Saturday</td>
                                <td>7:30 AM - 11:30 AM</td>
                                <td>Household Waste</td>
                            </tr>
                            <tr>
                                <td>All Zones</td>
                                <td>Sunday (Last of month)</td>
                                <td>9:00 AM - 1:00 PM</td>
                                <td>Recyclables</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="schedule-section">
                <h2 class="section-title">
                    <i class="bi bi-tree"></i>
                    Public Park Maintenance
                </h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Park Name</th>
                                <th>Day(s)</th>
                                <th>Activity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Central Park</td>
                                <td>Monday, Wednesday, Friday</td>
                                <td>Gardening, Cleaning</td>
                                <td><span class="badge badge-primary">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>Riverside Green</td>
                                <td>Tuesday, Thursday</td>
                                <td>Lawn Mowing</td>
                                <td><span class="badge badge-primary">Scheduled</span></td>
                            </tr>
                            <tr>
                                <td>Community Garden</td>
                                <td>Saturday</td>
                                <td>Weeding, Planting</td>
                                <td><span class="badge badge-info">Bi-Weekly</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="schedule-section">
                <h2 class="section-title">
                    <i class="bi bi-droplet"></i>
                    Water Supply Maintenance
                </h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Area Affected</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Uptown Sector 1</td>
                                <td>2025-06-25</td>
                                <td>10:00 AM - 2:00 PM</td>
                                <td>Planned pipeline inspection</td>
                            </tr>
                            <tr>
                                <td>Downtown West</td>
                                <td>2025-07-05</td>
                                <td>1:00 PM - 5:00 PM</td>
                                <td>Valve replacement</td>
                            </tr>
                            <tr>
                                <td>Industrial Zone</td>
                                <td>2025-07-15</td>
                                <td>9:00 AM - 1:00 PM</td>
                                <td>Routine pump maintenance</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
</body>
</html>
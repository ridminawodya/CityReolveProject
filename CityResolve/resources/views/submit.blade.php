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
    padding: 16px 20px; color: rgba(255, 255, 255, 0.8);
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

.main-content {
    margin-left: 80px;
    padding: 6rem 2rem 2rem 2rem;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.form-section {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 3rem 2rem;
    box-shadow: var(--shadow-soft);
    max-width: 600px;
    width: 100%;
}

.form-container { 
    max-width: 100%; 
    margin: 0 auto; 
}

.form-title {
    text-align: center; 
    font-size: 2.5rem; 
    font-weight: 700; 
    margin-bottom: 2rem; 
    color: var(--text-primary);
    font-family: 'Inter', sans-serif;
}

.form-title i {
    background: var(--secondary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.form-group { 
    margin-bottom: 1.5rem; 
}

.form-label {
    font-weight: 600; 
    color: var(--text-primary); 
    margin-bottom: 0.8rem; 
    display: flex; 
    align-items: center;
    font-size: 1rem;
    font-family: 'Inter', sans-serif;
}

.form-label i { 
    margin-right: 8px; 
    color: var(--primary-green); 
}

.form-control, .form-select {
    border: 2px solid rgba(0, 0, 0, 0.1); 
    border-radius: 12px; 
    padding: 12px 16px;
    font-size: 1rem; 
    transition: all 0.3s ease; 
    background: rgba(255, 255, 255, 0.8);
    font-family: 'Inter', sans-serif;
    font-weight: 400;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
    background: white;
}

.submit-btn {
    background: var(--secondary-gradient); 
    border: none; 
    padding: 15px 40px;
    font-size: 1.1rem; 
    font-weight: 600; 
    border-radius: 50px; 
    color: white;
    text-decoration: none; 
    display: inline-flex; 
    align-items: center;
    transition: all 0.3s ease; 
    box-shadow: 0 10px 30px rgba(34, 197, 94, 0.2);
    font-family: 'Inter', sans-serif;
}

.submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(34, 197, 94, 0.3);
    color: white;
}

.submit-btn i {
    margin-right: 8px;
}

@media (max-width: 768px) {
    .sidebar-nav {
        transform: translateX(-100%);
    }
            
    .main-content {
        margin-left: 0;
        padding: 5rem 1rem 2rem 1rem;
    }
            
    .form-section { 
        padding: 2rem 1rem;
        max-width: 100%;
    }
}

@keyframes success-pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.success-message {
    background: var(--secondary-gradient); 
    color: white; 
    padding: 1rem 2rem;
    border-radius: 50px; 
    text-align: center; 
    margin: 1rem 0;
    animation: success-pulse 2s ease-in-out; 
    display: none;
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

            <a class="nav-link active" href="submit.html">
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

<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CityResolve. All rights reserved. Connecting citizens with local government.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('complaintForm').addEventListener('submit', function(e) {
    e.preventDefault();
            
// Show success message
    const successMessage = document.getElementById('successMessage');
    successMessage.style.display = 'block';
            
// Scroll to success message
    successMessage.scrollIntoView({ behavior: 'smooth' });
            
// Hide success message after 3 seconds
    setTimeout(() => {
        successMessage.style.display = 'none';
    }, 3000);
            
// Reset form
    this.reset();
});
    </script>
</body>
</html>
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

<!-- Sidebar Navigation -->
    <div class="sidebar-nav">
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

<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CityResolve. All rights reserved. Connecting citizens with local government.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/script2.js')}}"></script>
</body>
</html>
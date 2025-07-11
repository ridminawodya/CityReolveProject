<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles10.css')}}">
</head>
<body>
    <div class="animated-bg"></div>
    
    <div class="login-container">
        <div class="brand-header">
            <div class="brand-logo">
                <i class="bi bi-buildings"></i>
            </div>
            <h1 class="brand-title">CityResolve</h1>
            <p class="brand-subtitle">Municipal Complaint Resolution System</p>
        </div>

        <form id="loginForm">
            <div id="message"></div>

            <div class="form-floating">
                <input type="text" class="form-control" id="username" placeholder="Username" required>
                <label for="username">
                    <i class="bi bi-person me-2"></i>Username
                </label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">
                    <i class="bi bi-lock me-2"></i>Password
                </label>
            </div>

            <div class="remember-me">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Remember me
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                <span class="btn-text">Sign In</span>
            </button>

            <div class="forgot-password">
                <a href="#" id="forgotPassword">Forgot your password?</a>
            </div>
        </form>

        <div class="signup-link">
            <p>Don't have an account? <a href="/account">Create Account</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/script10.js')}}"></script>
</body>
</html>
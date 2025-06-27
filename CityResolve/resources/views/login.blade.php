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
    <script>
        //Selecting important elements
const loginForm = document.getElementById('loginForm');
const messageDiv = document.getElementById('message');
const submitButton = loginForm.querySelector('button[type="submit"]');
const buttonText = submitButton.querySelector('.btn-text');

// Demo credentials
const validCredentials = {
    username: 'admin',
    password: 'cityresolve123'
};

//Handling form submission
loginForm.addEventListener('submit', function(e) {
    e.preventDefault();
            
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
            
// Clear previous messages
    messageDiv.innerHTML = '';
            
// Basic validation
    if (!username || !password) {
        showMessage('Please fill in all fields.', 'error');
    return;
    }
            
// Show loading state
    showLoading(true);
            
// Simulate API call
    setTimeout(() => {
        if (username === validCredentials.username && password === validCredentials.password) {
            showMessage('Login successful! Redirecting...', 'success');
            setTimeout(() => {
// Redirect to dashboard or home page
                window.location.href = '/home';
            }, 1500);
        } else {
            showMessage('Invalid username or password. Please try again.', 'error');
            showLoading(false);
        }
    }, 1500);
});

//Showing messages to the user
function showMessage(message, type) {
    const alertClass = type === 'error' ? 'alert-danger' : 'alert-success';
    const icon = type === 'error' ? 'bi-exclamation-triangle' : 'bi-check-circle';
            
    messageDiv.innerHTML = `
        <div class="alert ${alertClass}" role="alert">
            <i class="${icon} me-2"></i>${message}
        </div>
    `;
}

//Showing and hiding loading state on button
function showLoading(isLoading) {
    if (isLoading) {
        submitButton.disabled = true;
        buttonText.innerHTML = '<span class="loading"></span> Signing in...';
    } else {
        submitButton.disabled = false;
        buttonText.innerHTML = 'Sign In';
    }
}

//Forgot password link
document.getElementById('forgotPassword').addEventListener('click',function(e){
    e.preventDefault();
    showMessage('Password reset functionality would be implemented here.','success');
})

// Add smooth focus animations on input fields
const inputs = document.querySelectorAll('.form-control');
inputs.forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateY(-2px)';
    });
            
    input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateY(0)';
    });
});

    </script>
</body>
</html>
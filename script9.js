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
                window.location.href = 'dashboard.html';
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


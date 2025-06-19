//Store references to important elements in signup form
const signupForm = document.getElementById('signupForm');
const messageDiv = document.getElementById('message');
const submitButton = signupForm.querySelector('button[type="submit"]');
const buttonText = submitButton.querySelector('.btn-text');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');
const strengthFill = document.getElementById('strengthFill');
const strengthText = document.getElementById('strengthText');

// Password strength checker
passwordInput.addEventListener('input', function() {
    const password = this.value;
    const strength = checkPasswordStrength(password);
//Updates strength indicator
    updatePasswordStrength(strength);
});

function checkPasswordStrength(password) {
    let score = 0;
    let feedback = [];

    if (password.length >= 8) score += 1;
    else feedback.push('at least 8 characters');

    if (/[a-z]/.test(password)) score += 1;
    else feedback.push('lowercase letters');

    if (/[A-Z]/.test(password)) score += 1;
    else feedback.push('uppercase letters');

    if (/[0-9]/.test(password)) score += 1;
    else feedback.push('numbers');

    if (/[^A-Za-z0-9]/.test(password)) score += 1;
    else feedback.push('special characters');

    return { score, feedback, password };
}

//updates visual strength bar and message based on score
function updatePasswordStrength(strength) {
    const { score, feedback, password } = strength;
    const percentage = (score / 5) * 100;
            
    strengthFill.style.width = percentage + '%';
            
    if (password.length === 0) {
        strengthFill.className = 'strength-fill';
        strengthText.textContent = 'Password strength will appear here';
        strengthText.className = 'strength-text';
        return;
    }

    if (score <= 2) {
        strengthFill.className = 'strength-fill strength-weak';
        strengthText.textContent = 'Weak - Add: ' + feedback.slice(0, 2).join(', ');
        strengthText.className = 'strength-text text-danger';
    } else if (score === 3) {
        strengthFill.className = 'strength-fill strength-fair';
        strengthText.textContent = 'Fair - Add: ' + feedback.join(', ');
        strengthText.className = 'strength-text text-warning';
    } else if (score === 4) {
        strengthFill.className = 'strength-fill strength-good';
        strengthText.textContent = 'Good - Almost there!';
        strengthText.className = 'strength-text text-success';
    } else {
        strengthFill.className = 'strength-fill strength-strong';
        strengthText.textContent = 'Strong password!';
        strengthText.className = 'strength-text text-success';
    }
}

// Form validation and submission
signupForm.addEventListener('submit', function(e) {
    e.preventDefault();
            
// Get form data
    const formData = {
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        userType: document.getElementById('userType').value,
        username: document.getElementById('username').value,
        password: document.getElementById('password').value,
        confirmPassword: document.getElementById('confirmPassword').value,
        address: document.getElementById('address').value,
        city: document.getElementById('city').value,
        postalCode: document.getElementById('postalCode').value,
        agreeTerms: document.getElementById('agreeTerms').checked
    };
            
// Clear previous messages
    messageDiv.innerHTML = '';
            
// Validation
    const validationResult = validateForm(formData);
    if (!validationResult.isValid) {
        showMessage(validationResult.message, 'error');
    return;
    }
            
// Show loading state
    showLoading(true);
            
// Simulate API call
    setTimeout(() => {
// Check if username/email already exists (simulate)
        if (formData.username === 'admin' || formData.email === 'admin@cityresolve.com') {
            showMessage('Username or email already exists. Please choose different ones.', 'error');
            showLoading(false);
        return;
        }
                
        showMessage('Account created successfully! Please check your email for verification.', 'success');
        setTimeout(() => {
            window.location.href = 'login.html';
        }, 2000);
    }, 2000);
});

function validateForm(data) {
// Required fields check
    const requiredFields = ['firstName', 'lastName', 'email', 'phone', 'userType', 'username', 'password', 'confirmPassword', 'address', 'city', 'postalCode'];
    for (let field of requiredFields) {
        if (!data[field] || data[field].trim() === '') {
                return { isValid: false, message: 'Please fill in all required fields.' };
        }
    }

// Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(data.email)) {
        return { isValid: false, message: 'Please enter a valid email address.' };
    }

// Phone validation
    const phoneRegex = /^[\d\s\-\+\(\)]+$/;
    if (!phoneRegex.test(data.phone) || data.phone.length < 10) {
        return { isValid: false, message: 'Please enter a valid phone number.' };
    }

// Username validation
    if (data.username.length < 3) {
        return { isValid: false, message: 'Username must be at least 3 characters long.' };
    }

// Password validation
    const passwordStrength = checkPasswordStrength(data.password);
    if (passwordStrength.score < 3) {
        return { isValid: false, message: 'Password is too weak. Please include uppercase, lowercase, numbers, and special characters.' };
    }

// Password confirmation
    if (data.password !== data.confirmPassword) {
        return { isValid: false, message: 'Passwords do not match.' };
    }

// Terms agreement
    if (!data.agreeTerms) {
        return { isValid: false, message: 'Please agree to the Terms of Service and Privacy Policy.' };
    }

    return { isValid: true };
}

function showMessage(message, type) {
    const alertClass = type === 'error' ? 'alert-danger' : type === 'warning' ? 'alert-warning' : 'alert-success';
    const icon = type === 'error' ? 'bi-exclamation-triangle' : type === 'warning' ? 'bi-exclamation-circle' : 'bi-check-circle';
            
    messageDiv.innerHTML = `
        <div class="alert ${alertClass}" role="alert">
            <i class="${icon} me-2"></i>${message}
        </div>
    `;
            
// Scroll to message
    messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function showLoading(isLoading) {
    if (isLoading) {
        submitButton.disabled = true;
        buttonText.innerHTML = '<span class="loading"></span> Creating Account...';
    } else {
        submitButton.disabled = false;
        buttonText.innerHTML = 'Create Account';
    }
}

// Terms and Privacy links
document.getElementById('termsLink').addEventListener('click', function(e) {
    e.preventDefault();
    showMessage('Terms of Service would be displayed here in a modal or separate page.', 'warning');
});

document.getElementById('privacyLink').addEventListener('click', function(e) {
    e.preventDefault();
    showMessage('Privacy Policy would be displayed here in a modal or separate page.', 'warning');
});

// Real-time username availability check (simulate)
document.getElementById('username').addEventListener('blur', function() {
    const username = this.value;
    if (username && username.length >= 3) {
        if (username === 'admin' || username === 'test') {
            this.style.borderColor = '#ef4444';
            showMessage('Username "' + username + '" is already taken.', 'error');
        } else {
            this.style.borderColor = '#22c55e';
        }
    }
});

// Real-time email validation
document.getElementById('email').addEventListener('blur', function() {
    const email = this.value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailRegex.test(email)) {
        this.style.borderColor = '#ef4444';
    } else if (email) {
        this.style.borderColor = '#22c55e';
    }
});

// Confirm password validation
confirmPasswordInput.addEventListener('input', function() {
    const password = passwordInput.value;
    const confirmPassword = this.value;
            
    if (confirmPassword && password !== confirmPassword) {
        this.style.borderColor = '#ef4444';
    } else if (confirmPassword) {
        this.style.borderColor = '#22c55e';
    }
});

// Add smooth focus animations
const inputs = document.querySelectorAll('.form-control, .form-select');
inputs.forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateY(-2px)';
    });
            
    input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateY(0)';
    });
});
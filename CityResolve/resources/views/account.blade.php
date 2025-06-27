<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles9.css')}}">
</head>
<body>
    <div class="animated-bg"></div>
    
    <div class="signup-container">
        <div class="brand-header">
            <div class="brand-logo">
                <i class="bi bi-buildings"></i>
            </div>
            <h1 class="brand-title">Join CityResolve</h1>
            <p class="brand-subtitle">Create your account to start resolving community issues</p>
        </div>

        <form id="signupForm">
            <div id="message"></div>

            <div class="form-row">
                <div class="form-floating">
                    <input type="text" class="form-control" id="firstName" placeholder="First Name" required>
                    <label for="firstName">
                        <i class="bi bi-person me-2"></i>First Name
                    </label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
                    <label for="lastName">
                        <i class="bi bi-person me-2"></i>Last Name
                    </label>
                </div>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                <label for="email">
                    <i class="bi bi-envelope me-2"></i>Email Address
                </label>
            </div>

            <div class="form-row">
                <div class="form-floating">
                    <input type="tel" class="form-control" id="phone" placeholder="Phone Number" required>
                    <label for="phone">
                        <i class="bi bi-telephone me-2"></i>Phone Number
                    </label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="userType" required>
                        <option value="" disabled selected></option>
                        <option value="citizen">Citizen</option>
                        <option value="business">Business Owner</option>
                        <option value="organization">Organization</option>
                    </select>
                    <label for="userType">
                        <i class="bi bi-person-badge me-2"></i>Account Type
                    </label>
                </div>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="username" placeholder="Username" required>
                <label for="username">
                    <i class="bi bi-at me-2"></i>Username
                </label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">
                    <i class="bi bi-lock me-2"></i>Password
                </label>
            </div>

            <div class="password-strength">
                <div class="strength-bar">
                    <div class="strength-fill" id="strengthFill"></div>
                </div>
                <div class="strength-text" id="strengthText">Password strength will appear here</div>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                <label for="confirmPassword">
                    <i class="bi bi-lock-fill me-2"></i>Confirm Password
                </label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="address" placeholder="Address" required>
                <label for="address">
                    <i class="bi bi-geo-alt me-2"></i>Address
                </label>
            </div>

            <div class="form-row">
                <div class="form-floating">
                    <input type="text" class="form-control" id="city" placeholder="City" required>
                    <label for="city">
                        <i class="bi bi-building me-2"></i>City
                    </label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="postalCode" placeholder="Postal Code" required>
                    <label for="postalCode">
                        <i class="bi bi-mailbox me-2"></i>Postal Code
                    </label>
                </div>
            </div>

            <div class="terms-checkbox">
                <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                <label class="form-check-label" for="agreeTerms">
                    I agree to the <a href="#" id="termsLink">Terms of Service</a> and <a href="#" id="privacyLink">Privacy Policy</a>. I understand that my information will be used to improve municipal services and community engagement.
                </label>
            </div>

            <button type="submit" class="btn btn-signup">
                <i class="bi bi-person-plus me-2"></i>
                <span class="btn-text">Create Account</span>
            </button>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="/login">Sign In</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
    </script>
</body>
</html>
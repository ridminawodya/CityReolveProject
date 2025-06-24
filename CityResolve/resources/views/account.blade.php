<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Create Account</title>
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
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 0;
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
    0%, 100% {
        transform: translate(0, 0) rotate(0deg); 
    }
    50% { 
        transform: translate(-20px, -20px) rotate(180deg); 
    }
}

.signup-container {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 3rem;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(34, 197, 94, 0.1);
    max-width: 600px;
    width: 100%;
    position: relative;
    overflow: hidden;
    margin: auto;
}

.signup-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
}

.brand-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.brand-logo {
    font-size: 3rem;
    color: var(--primary-green);
    margin-bottom: 1rem;
}

.brand-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.brand-subtitle {
    color: var(--text-secondary);
    font-size: 1rem;
    font-weight: 500;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.form-floating {
    margin-bottom: 1.5rem;
}

.form-floating > .form-control,
.form-floating > .form-select {
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 1rem 0.75rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.8);
}

.form-floating > .form-control:focus,
.form-floating > .form-select:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.2rem rgba(34, 197, 94, 0.25);
    background: white;
}

.form-floating > label {
    color: var(--text-secondary);
    padding: 1rem 0.75rem;
}

.password-strength {
    margin-top: 0.5rem;
    margin-bottom: 1rem;
}

.strength-bar {
    height: 4px;
    background: #e2e8f0;
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.strength-fill {
    height: 100%;
    width: 0%;
    transition: all 0.3s ease;
    border-radius: 2px;
}

.strength-weak { background: #ef4444; }
.strength-fair { background: #f59e0b; }
.strength-good { background: #22c55e; }
.strength-strong { background: #16a34a; }

.strength-text {
    font-size: 0.85rem;
    font-weight: 500;
}

.btn-signup {
    background: var(--primary-gradient);
    color: white;
    padding: 1rem 2rem;
    border: none;
    border-radius: 12px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    margin-bottom: 1.5rem;
    box-shadow: var(--shadow-soft);
}

.btn-signup:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
    color: white;
}

.btn-signup:active {
    transform: translateY(0);
}

.terms-checkbox {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
    gap: 0.75rem;
}

.form-check-input:checked {
    background-color: var(--primary-green);
    border-color: var(--primary-green);
}

.form-check-input:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.25rem rgba(34, 197, 94, 0.25);
}

.form-check-label {
    color: var(--text-secondary);
    font-weight: 500;
    line-height: 1.5;
}

.form-check-label a {
    color: var(--primary-green);
    text-decoration: none;
    font-weight: 600;
}

.form-check-label a:hover {
    text-decoration: underline;
}

.login-link {
    text-align: center;
    padding-top: 1.5rem;
    border-top: 1px solid #e2e8f0;
    color: var(--text-secondary);
}

.login-link a {
    color: var(--primary-green);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.login-link a:hover {
    color: #16a34a;
    text-decoration: underline;
}

.alert {
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    border: none;
    font-weight: 500;
}

.alert-danger {
    background: #fef2f2;
    color: #dc2626;
    border-left: 4px solid #dc2626;
}

.alert-success {
    background: var(--light-green);
    color: #16a34a;
    border-left: 4px solid var(--primary-green);
}

.alert-warning {
    background: #fffbeb;
    color: #d97706;
    border-left: 4px solid #f59e0b;
}

@media (max-width: 768px) {
    .signup-container {
        padding: 2rem 1.5rem;
        margin: 1rem;
    }
            
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
            
    .brand-title {
        font-size: 1.75rem;
    }
            
    .brand-logo {
        font-size: 2.5rem;
    }
}

.loading {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid rgba(255,255,255,.3);
    border-radius: 50%;
    border-top-color: #fff;
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.step-indicator {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
    gap: 1rem;
}

.step {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    transition: all 0.3s ease;
}

.step.active {
    background: var(--primary-green);
    color: white;
}

.step.completed {
    background: #16a34a;
    color: white;
}

.step.pending {
    background: #e2e8f0;
    color: var(--text-secondary);
}
    </style>
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
            <p>Already have an account? <a href="login.html">Sign In</a></p>
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
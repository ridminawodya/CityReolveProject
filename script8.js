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


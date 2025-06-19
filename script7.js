//Variables to track edit state and original data
let isEditing = false;
let originalData = {};
        
function editProfile() {
    if (!isEditing) {
            toggleEdit('personal');
    }
}
        
function toggleEdit(section) {
    const form = document.getElementById('personalForm');
    const inputs = form.querySelectorAll('input, select');
    const editActions = document.getElementById('editActions');
    const editBtn = document.querySelector('.edit-btn');
            
    if (!isEditing) {
// Store original data
        inputs.forEach(input => {
            originalData[input.id] = input.value;
        });
                
// Enable editing
        inputs.forEach(input => {
            if (input.id !== 'email' && input.id !== 'username') {
                input.disabled = false;
            }
        });
                
        editActions.style.display = 'block';
        editBtn.innerHTML = '<i class="bi bi-x"></i> Cancel';
        isEditing = true;
    } else {
        cancelEdit(section);
    }
}
       
function cancelEdit(section) {
    const form = document.getElementById('personalForm');
    const inputs = form.querySelectorAll('input, select');
    const editActions = document.getElementById('editActions');
    const editBtn = document.querySelector('.edit-btn');
            
// Restore original data
    inputs.forEach(input => {
        if (originalData[input.id]) {
            input.value = originalData[input.id];
        }
        input.disabled = true;
    });
            
    editActions.style.display = 'none';
    editBtn.innerHTML = '<i class="bi bi-pencil"></i> Edit';
    isEditing = false;
        document.getElementById('message').innerHTML = '';
}
        
function editAvatar() {
    showMessage('Avatar upload feature would be implemented here. You could upload a new profile picture or choose from preset avatars.', 'info');
}
        
function toggleMobileMenu() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}
        
// Form submission
document.getElementById('personalForm').addEventListener('submit', function(e) {
    e.preventDefault();
            
    const submitButton = this.querySelector('button[type="submit"]');
    const buttonText = submitButton.querySelector('.btn-text');
            
// Show loading state
    submitButton.disabled = true;
    buttonText.innerHTML = '<span class="loading"></span> Saving...';
            
// Simulate API call
    setTimeout(() => {
        showMessage('Profile updated successfully!', 'success');
                
// Update profile display
        updateProfileDisplay();
                
// Reset form state
        const inputs = this.querySelectorAll('input, select');
        inputs.forEach(input => input.disabled = true);
                
        document.getElementById('editActions').style.display = 'none';
        document.querySelector('.edit-btn').innerHTML = '<i class="bi bi-pencil"></i> Edit';
        isEditing = false;
                
        submitButton.disabled = false;
        buttonText.innerHTML = 'Save Changes';
                
// Clear message after 3 seconds
        setTimeout(() => {
            document.getElementById('message').innerHTML = '';
        }, 3000);
    }, 1500);
});
        
function updateProfileDisplay() {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const userType = document.getElementById('userType').value;
            
// Update sidebar
    document.getElementById('profileName').textContent = `${firstName} ${lastName}`;
    document.getElementById('profileRole').textContent = userType.charAt(0).toUpperCase() + userType.slice(1);
            
// Update avatar initials
    const initials = firstName.charAt(0) + lastName.charAt(0);
    document.getElementById('profileAvatar').textContent = initials.toUpperCase();
}

function showMessage(message, type = 'success') {
    const messageDiv = document.getElementById('message');
    const alertClass = type === 'success' ? 'alert-success' : 'alert-info';
    const icon = type === 'success' ? 'bi-check-circle' : 'bi-info-circle';
            
    messageDiv.innerHTML = `
        <div class="alert ${alertClass}" role="alert">
            <i class="${icon} me-2"></i>${message}
        </div>
    `;
}
        
// Add smooth focus animations
const inputs = document.querySelectorAll('.form-control, .form-select');
inputs.forEach(input => {
    input.addEventListener('focus', () => {
// console.log(`Input with ID ${input.id} is focused!`);
    });

    input.addEventListener('blur', () => {
// console.log(`Input with ID ${input.id} lost focus.`);
    });
});
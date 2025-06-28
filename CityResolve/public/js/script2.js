function toggleMobileMenu() {
    document.getElementById('sidebar').classList.toggle('show');
}

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
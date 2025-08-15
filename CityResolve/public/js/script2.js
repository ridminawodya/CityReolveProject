document.addEventListener('DOMContentLoaded', function () {
    // Toggles the mobile navigation menu.
    window.toggleMobileMenu = function () {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('active');
    };

    const complaintForm = document.getElementById('complaintForm');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    if (complaintForm) {
        complaintForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Hide previous messages
            successMessage.classList.add('d-none');
            errorMessage.classList.add('d-none');
            
            // Get the CSRF token from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            // Use FormData to easily handle form data, including files
            const formData = new FormData(this);

            fetch('/complaints', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json' // Tell the server we expect a JSON response
                },
                body: formData // Pass the FormData object directly
            })
            .then(response => {
                // Check if the response is ok (status code 200-299)
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw new Error(errorData.message || 'Server error occurred.');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    successMessage.textContent = data.message;
                    successMessage.classList.remove('d-none');
                    complaintForm.reset(); // Clear the form on success
                } else {
                    errorMessage.textContent = data.message || 'An unknown error occurred.';
                    errorMessage.classList.remove('d-none');
                }
            })
            .catch(error => {
                console.error('Submission failed:', error);
                errorMessage.textContent = 'Submission failed. Please check your network connection.';
                errorMessage.classList.remove('d-none');
            });
        });
    }

    // Dynamic year for the footer
    const currentYearElement = document.getElementById('current-year-bottom');
    if (currentYearElement) {
        currentYearElement.textContent = new Date().getFullYear();
    }
});

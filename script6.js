//Mobile menu toggle
function toggleMobileMenu() {
    document.getElementById('sidebar').classList.toggle('show');
}

//Global variables
let selectedTaxType = '';
let selectedTaxAmount = 0;
let selectedPaymentMethodType = '';

function payTax(taxType, amount) {
    selectedTaxType = taxType;
    selectedTaxAmount = amount;

    document.getElementById('taxType').value = formatTaxType(taxType);
    document.getElementById('taxAmount').value = `LKR ${amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('paymentSection').style.display = 'block';
    document.getElementById('paymentAlert').innerHTML = ''; // Clear previous alerts
    window.scrollTo({ top: document.getElementById('paymentSection').offsetTop - 100, behavior: 'smooth' });
}

//Tax Selection Function
function formatTaxType(type) {
    switch (type) {
        case 'property': return 'Property Tax';
        case 'business': return 'Business License';
        case 'waste': return 'Waste Management';
        case 'lighting': return 'Street Lighting';
        default: return type;
    }
}

//Payment Method Selection
function selectPaymentMethod(method) {
    const paymentMethods = document.querySelectorAll('.payment-method');
    paymentMethods.forEach(pm => pm.classList.remove('selected'));
    document.querySelector(`.payment-method[onclick="selectPaymentMethod('${method}')"]`).classList.add('selected');

    selectedPaymentMethodType = method;

    const cardDetails = document.getElementById('cardDetails');
    if (method === 'card') {
        cardDetails.style.display = 'block';
// Make card fields required
        document.getElementById('cardNumber').setAttribute('required', 'required');
        document.getElementById('expiryDate').setAttribute('required', 'required');
        document.getElementById('cvv').setAttribute('required', 'required');
        document.getElementById('cardHolderName').setAttribute('required', 'required');
    } else {
        cardDetails.style.display = 'none';
// Remove required attribute for other payment methods
        document.getElementById('cardNumber').removeAttribute('required');
        document.getElementById('expiryDate').removeAttribute('required');
        document.getElementById('cvv').removeAttribute('required');
        document.getElementById('cardHolderName').removeAttribute('required');
    }
}

//Payment Cancellation
function cancelPayment() {
    document.getElementById('paymentSection').style.display = 'none';
    document.getElementById('paymentForm').reset();
    document.getElementById('cardDetails').style.display = 'none';
    const paymentMethods = document.querySelectorAll('.payment-method');
    paymentMethods.forEach(pm => pm.classList.remove('selected'));
    document.getElementById('paymentAlert').innerHTML = '';
}

//Form Submission Handler
document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const paymentAlert = document.getElementById('paymentAlert');
    paymentAlert.innerHTML = ''; // Clear previous alerts

// Basic form validation
    const propertyId = document.getElementById('propertyId').value;
    const assessmentNumber = document.getElementById('assessmentNumber').value;
    const ownerName = document.getElementById('ownerName').value;
    const ownerNIC = document.getElementById('ownerNIC').value;
    const propertyAddress = document.getElementById('propertyAddress').value;

    if (!propertyId || !assessmentNumber || !ownerName || !ownerNIC || !propertyAddress) {
        paymentAlert.innerHTML = '<div class="alert alert-danger" role="alert">Please fill in all required property and owner information.</div>';
    return;
    }

    if (!selectedPaymentMethodType) {
        paymentAlert.innerHTML = '<div class="alert alert-warning" role="alert">Please select a payment method.</div>';
    return;
    }

    if (selectedPaymentMethodType === 'card') {
        const cardNumber = document.getElementById('cardNumber').value;
        const expiryDate = document.getElementById('expiryDate').value;
        const cvv = document.getElementById('cvv').value;
        const cardHolderName = document.getElementById('cardHolderName').value;

        if (!cardNumber || !expiryDate || !cvv || !cardHolderName) {
            paymentAlert.innerHTML = '<div class="alert alert-danger" role="alert">Please fill in all required card details.</div>';
        return;
        }
// Add more robust card validation (e.g., regex for card number, expiry date format)
    }

// Simulate payment processing
    const submitButton = document.querySelector('#paymentForm button[type="submit"]');
    const originalButtonText = submitButton.innerHTML;
    submitButton.innerHTML = '<span class="loading me-2"></span>Processing...';
    submitButton.disabled = true;

    setTimeout(() => {
        submitButton.innerHTML = originalButtonText;
        submitButton.disabled = false;

// Simulate success or failure
        const isSuccess = Math.random() > 0.2; // 80% chance of success

        if (isSuccess) {
            paymentAlert.innerHTML = '<div class="alert alert-success" role="alert">Payment for ' + formatTaxType(selectedTaxType) + ' of ' + document.getElementById('taxAmount').value + ' successful! A receipt has been sent to your email.</div>';
            document.getElementById('paymentForm').reset();
            document.getElementById('cardDetails').style.display = 'none';
            const paymentMethods = document.querySelectorAll('.payment-method');
            paymentMethods.forEach(pm => pm.classList.remove('selected'));
            selectedPaymentMethodType = ''; // Reset selected payment method

// Optionally, update the tax overview card status to "Paid"
// This would require more complex DOM manipulation or re-rendering the cards
        } else {
            paymentAlert.innerHTML = '<div class="alert alert-danger" role="alert">Payment failed. Please check your details and try again.</div>';
        }
        window.scrollTo({ top: document.getElementById('paymentAlert').offsetTop - 100, behavior: 'smooth' });

    }, 2000); // Simulate 2 seconds processing time
});
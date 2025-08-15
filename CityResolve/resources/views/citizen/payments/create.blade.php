@extends('layouts.citizen')

@section('content')
<style>
    /* Define CSS variables for consistency */
    :root {
        --primary-color: #4CAF50;
        --primary-hover: #43A047;
        --secondary-color: #F8F9FA;
        --card-bg: #FFFFFF;
        --text-color: #333333;
        --label-color: #6B7280;
        --border-color: #E5E7EB;
        --shadow-medium: rgba(0, 0, 0, 0.1);
        --error-color: #EF4444;
        --success-color: #10B981;
    }

    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-color);
        background-color: var(--secondary-color);
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-card {
        background-color: var(--card-bg);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 12px var(--shadow-medium);
        max-width: 800px;
        margin: 40px auto;
    }

    .form-section {
        margin-bottom: 30px;
        padding-bottom: 25px;
        border-bottom: 1px solid var(--border-color);
    }

    .form-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-color);
        margin-bottom: 20px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--primary-color);
    }

    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
        flex: 1;
    }

    .form-group.full-width {
        flex: none;
        width: 100%;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--label-color);
        margin-bottom: 8px;
    }

    .required::after {
        content: " *";
        color: var(--error-color);
    }

    .form-group .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 1rem;
        transition: border-color 0.2s ease;
    }
    
    .form-group .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
    }

    .form-group .form-select {
        width: 100%;
        padding: 12px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 1rem;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='none'%3e%3cpath d='M7 10l5 5 5-5H7z' fill='%236B7280'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1.5em;
    }

    .payment-method-details {
        display: none;
        margin-top: 20px;
        padding: 20px;
        background-color: #F9FAFB;
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }

    .payment-method-details.active {
        display: block;
    }

    .form-text {
        font-size: 0.875rem;
        color: var(--label-color);
        margin-top: 5px;
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: var(--primary-color);
        color: #fff;
        background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
        box-shadow: 0 4px 6px rgba(76, 175, 80, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
    }

    .btn-secondary {
        background: #F3F4F6;
        color: #4B5563;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }

    .security-info {
        background-color: #EBF8FF;
        border: 1px solid #BFDBFE;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .security-info .icon {
        color: #3B82F6;
        margin-right: 8px;
    }
</style>

<div class="page-header">
    <h1 class="text-2xl font-bold">Make a Tax Payment</h1>
    <a href="{{ route('citizen.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>
</div>

<div class="form-card">
    <div class="security-info">
        <i class="fas fa-shield-alt icon"></i>
        <strong>Secure Payment:</strong> All payment information is encrypted and processed securely. We do not store your payment details.
    </div>

    <form method="POST" action="{{ route('citizen.payments.store') }}" id="paymentForm">
        @csrf

        <!-- Tax Information Section -->
        <div class="form-section">
            <h3 class="section-title">Tax Information</h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="tax_type" class="required">Tax Type</label>
                    <select id="tax_type" name="tax_type" class="form-select" required>
                        <option value="">Select tax type</option>
                        <option value="income_tax">Income Tax</option>
                        <option value="property_tax">Property Tax</option>
                        <option value="business_tax">Business Tax</option>
                        <option value="vehicle_tax">Vehicle Registration Tax</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tax_year" class="required">Tax Year</label>
                    <select id="tax_year" name="tax_year" class="form-select" required>
                        <option value="">Select year</option>
                        @for($year = date('Y'); $year >= date('Y') - 5; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="reference_number">Reference/Account Number</label>
                    <input type="text" id="reference_number" name="reference_number" class="form-control" 
                           placeholder="Enter reference or account number">
                    <div class="form-text">Optional: Enter your tax reference or account number if available</div>
                </div>
                <div class="form-group">
                    <label for="amount" class="required">Amount to Pay (Rs.)</label>
                    <input type="number" id="amount" name="amount" class="form-control" 
                           step="0.01" min="0.01" required placeholder="0.00">
                </div>
            </div>
        </div>

        <!-- Payment Method Section -->
        <div class="form-section">
            <h3 class="section-title">Payment Method</h3>
            
            <div class="form-group">
                <label for="payment_method" class="required">Select Payment Method</label>
                <select id="payment_method" name="payment_method" class="form-select" required onchange="togglePaymentDetails()">
                    <option value="">Select a payment method</option>
                    <option value="credit_card">Credit/Debit Card</option>
                    <option value="bank_transfer">Bank Transfer (ACH)</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <!-- Credit Card Details -->
            <div id="credit_card_details" class="payment-method-details">
                <div class="form-row">
                    <div class="form-group">
                        <label for="card_name" class="required">Cardholder Name</label>
                        <input type="text" id="card_name" name="card_name" class="form-control" 
                               placeholder="Name as shown on card">
                    </div>
                    <div class="form-group">
                        <label for="card_number" class="required">Card Number</label>
                        <input type="text" id="card_number" name="card_number" class="form-control" 
                               placeholder="1234 5678 9012 3456" maxlength="19">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="expiry_date" class="required">Expiry Date</label>
                        <input type="text" id="expiry_date" name="expiry_date" class="form-control" 
                               placeholder="MM/YY" maxlength="5">
                    </div>
                    <div class="form-group">
                        <label for="cvv" class="required">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="form-control" 
                               placeholder="123" maxlength="4">
                    </div>
                    <div class="form-group">
                        <label for="zip_code">Billing ZIP Code</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control" 
                               placeholder="12345">
                    </div>
                </div>
            </div>

            <!-- Bank Transfer Details -->
            <div id="bank_transfer_details" class="payment-method-details">
                <div class="form-row">
                    <div class="form-group">
                        <label for="bank_name" class="required">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" class="form-control" 
                               placeholder="Enter your bank name">
                    </div>
                    <div class="form-group">
                        <label for="account_type" class="required">Account Type</label>
                        <select id="account_type" name="account_type" class="form-select">
                            <option value="">Select account type</option>
                            <option value="checking">Checking</option>
                            <option value="savings">Savings</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="routing_number" class="required">Routing Number</label>
                        <input type="text" id="routing_number" name="routing_number" class="form-control" 
                               placeholder="9 digit routing number" maxlength="9">
                    </div>
                    <div class="form-group">
                        <label for="account_number" class="required">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" 
                               placeholder="Account number">
                    </div>
                </div>
                <div class="form-text">
                    <i class="fas fa-info-circle"></i> 
                    Bank transfers typically take 1-3 business days to process.
                </div>
            </div>

            <!-- PayPal Details -->
            <div id="paypal_details" class="payment-method-details">
                <div class="form-group">
                    <label for="paypal_email" class="required">PayPal Email</label>
                    <input type="email" id="paypal_email" name="paypal_email" class="form-control" 
                           placeholder="your-email@example.com">
                </div>
                <div class="form-text">
                    <i class="fas fa-info-circle"></i> 
                    You will be redirected to PayPal to complete your payment securely.
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="form-section">
            <h3 class="section-title">Contact Information</h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="email" class="required">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           value="{{ auth()->user()->email ?? '' }}" required
                           placeholder="your-email@example.com">
                    <div class="form-text">Receipt and confirmation will be sent to this email</div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="form-control" 
                           placeholder="(555) 123-4567">
                </div>
            </div>
        </div>

        <!-- Receipt Options Section -->
        <div class="form-section">
            <h3 class="section-title">Receipt Options</h3>
            
            <div class="form-group">
                <label>
                    <input type="checkbox" name="email_receipt" value="1" checked style="margin-right: 8px;">
                    Email receipt immediately after payment
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="downloadable_receipt" value="1" checked style="margin-right: 8px;">
                    Enable downloadable PDF receipt
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="print_receipt" value="1" style="margin-right: 8px;">
                    Show printable receipt page after payment
                </label>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('citizen.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary" id="submitBtn">
                <i class="fas fa-credit-card"></i> Process Payment
            </button>
        </div>
    </form>
</div>

<script>
function togglePaymentDetails() {
    const paymentMethod = document.getElementById('payment_method').value;
    const allDetails = document.querySelectorAll('.payment-method-details');
    
    // Hide all payment details
    allDetails.forEach(detail => {
        detail.classList.remove('active');
    });
    
    // Show selected payment method details
    if (paymentMethod) {
        const selectedDetails = document.getElementById(paymentMethod + '_details');
        if (selectedDetails) {
            selectedDetails.classList.add('active');
        }
    }
    
    // Update required fields based on payment method
    updateRequiredFields(paymentMethod);
}

function updateRequiredFields(paymentMethod) {
    // Remove required attribute from all payment method fields
    document.querySelectorAll('.payment-method-details input, .payment-method-details select').forEach(field => {
        field.removeAttribute('required');
    });
    
    // Add required attribute to active payment method fields
    if (paymentMethod) {
        const activeSection = document.getElementById(paymentMethod + '_details');
        if (activeSection) {
            activeSection.querySelectorAll('input, select').forEach(field => {
                if (field.closest('.form-group').querySelector('label.required') || 
                    field.closest('.form-group').querySelector('label .required')) {
                    field.setAttribute('required', 'required');
                }
            });
        }
    }
}

// Format card number with spaces
document.getElementById('card_number')?.addEventListener('input', function(e) {
    let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
    let formattedValue = value.match(/.{1,4}/g)?.join(' ') ?? value;
    e.target.value = formattedValue;
});

// Format expiry date
document.getElementById('expiry_date')?.addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length >= 2) {
        value = value.substring(0, 2) + '/' + value.substring(2, 4);
    }
    e.target.value = value;
});

// Only allow numbers for CVV
document.getElementById('cvv')?.addEventListener('input', function(e) {
    e.target.value = e.target.value.replace(/\D/g, '');
});

// Only allow numbers for routing number
document.getElementById('routing_number')?.addEventListener('input', function(e) {
    e.target.value = e.target.value.replace(/\D/g, '');
});

// Form submission handling
document.getElementById('paymentForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
    submitBtn.disabled = true;
});
</script>
@endsection
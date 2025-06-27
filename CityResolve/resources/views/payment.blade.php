<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Tax Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles7.css')}}">
</head>
<body>
    <div class="animated-bg"></div>

<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-buildings"></i>CityResolve
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">
                        <i class="bi bi-translate fs-5"></i>
                        <span class="nav-text">Sinhala</span>
                    </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/home">
                        <i class="bi bi-globe fs-5"></i>
                        <span class="nav-text">English</span>
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
        <i class="bi bi-list"></i>
    </button>

<div class="sidebar-nav" id="sidebar">
        <div class="d-flex flex-column h-100">
            <a class="nav-link" href="/home">
                <i class="bi bi-house-door nav-icon fs-5"></i>
                <span class="nav-text">Home</span>
            </a>

            <a class="nav-link" href="/submit">
                <i class="bi bi-pencil-square fs-5"></i>
                <span class="nav-text">Submit Complaint</span>
            </a>

            <a class="nav-link" href="/track">
                <i class="bi bi-search fs-5"></i>
                <span class="nav-text">Track Status</span>
            </a>

            <a class="nav-link" href="/community">
                <i class="bi bi-people-fill fs-5"></i>
                <span class="nav-text">Community</span>
            </a>

            <a class="nav-link" href="/timetable">
                <i class="bi bi-calendar-check fs-5"></i>
                <span class="nav-text">Service Schedule</span>
            </a>

            <a class="nav-link" href="/about">
                <i class="bi bi-info-circle fs-5"></i>
                <span class="nav-text">About Us</span>
            </a>

            <a class="nav-link" href="/payment">
                <i class="bi bi-credit-card fs-5"></i>
                <span class="nav-text">Tax Payments</span>
            </a>

            <a class="nav-link mt-auto" href="/profile">
                <i class="bi bi-person-circle fs-5"></i>
                <span class="nav-text">Profile</span>
            </a>

            <a class="nav-link" href="/login">
                <i class="bi bi-box-arrow-right fs-5"></i>
                <span class="nav-text">Logout</span>
            </a>
        </div>
    </div>

<div class="main-content">
        <div class="container">
<div class="page-header">
                <h1 class="page-title">
                    <i class="bi bi-credit-card"></i>
                    Municipal Tax Payment
                </h1>
                <p class="page-subtitle">Manage and pay your municipal taxes securely online</p>
            </div>

<div class="tax-overview">
                <div class="tax-card overdue">
                    <div class="tax-card-header">
                        <div class="tax-type">Property Tax</div>
                        <span class="tax-status status-overdue">Overdue</span>
                    </div>
                    <div class="tax-amount">LKR 25,500.00</div>
                    <div class="tax-due-date">Due: March 15, 2025</div>
                    <button class="btn-action btn-pay" onclick="payTax('property',25500)">
                        <i class="bi bi-credit-card"></i>
                        Pay Now
                    </button>
                </div>

                <div class="tax-card due-soon">
                    <div class="tax-card-header">
                        <div class="tax-type">Business License</div>
                        <span class="tax-status status-due-soon">Due Soon</span>
                    </div>
                    <div class="tax-amount">LKR 8,750.00</div>
                    <div class="tax-due-date">Due: July 30, 2025</div>
                    <button class="btn-action btn-pay" onclick="payTax('business',8750)">
                        <i class="bi bi-credit-card"></i>
                        Pay Now
                    </button>
                </div>

                <div class="tax-card paid">
                    <div class="tax-card-header">
                        <div class="tax-type">Waste Management</div>
                        <span class="tax-status status-paid">Paid</span>
                    </div>
                    <div class="tax-amount">LKR 1,200.00</div>
                    <div class="tax-due-date">Paid: May 10, 2025</div>
                    <button class="btn-action btn-secondary">
                        <i class="bi bi-download"></i>
                        Receipt
                    </button>
                </div>

                <div class="tax-card">
                    <div class="tax-card-header">
                        <div class="tax-type">Street Lighting</div>
                        <span class="tax-status status-due-soon">Due Soon</span>
                    </div>
                    <div class="tax-amount">LKR 3,500.00</div>
                    <div class="tax-due-date">Due: August 15, 2025</div>
                    <button class="btn-action btn-pay" onclick="payTax('lighting',3500)">
                        <i class="bi bi-credit-card"></i>
                        Pay Now
                    </button>
                </div>
            </div>

            <div class="payment-section" id="paymentSection" style="display: none;">
                <h2 class="section-title">
                    <i class="bi bi-wallet2"></i>
                    Payment Details
                </h2>

                <div id="paymentAlert"></div>
                <form id="paymentForm">
                    <div class="form-row">

                        <div class="form-floating">
                            <input type="text" class="form-control" id="taxType" readonly>
                            <label for="taxType">
                                <i class="bi bi-tag me-2"></i>Tax Type
                            </label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="taxAmount" readonly>
                            <label for="taxAmount">
                                <i class="bi bi-currency-dollar me-2"></i>Amount(LKR)
                            </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="propertyId" placeholder="Enter property ID" required> 
                            <label for="propertyId">
                                <i class="bi bi-house me-2"></i>Property ID
                            </label>                       
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="assessmentNumber" placeholder="Enter assessment number" required>
                            <label for="assessmentNumber">
                                <i class="bi bi-file-text me-2"></i>Assessment Number
                            </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="ownerName" placeholder="Enter owner name" required>
                            <label for="ownerName">
                                <i class="bi bi-person me-2"></i>Property Owner Name
                            </label>                        
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="ownerNIC" placeholder="Enter NIC number" required>
                            <label for="ownerNIC">
                                <i class="bi bi-card-text me-2"></i>NIC Number
                            </label>
                        </div>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="propertyAddress" placeholder="Enter property address" required>
                        <label for="propertyAddress">
                            <i class="bi bi-geo-alt me-2"></i>Property Address
                        </label>
                    </div>

                    <h3 class="section-title" style="margin-top: 2rem;">
                        <i class="bi bi-credit-card"></i>Payment Method
                    </h3>

                    <div class="payment-methods">
                        <div class="payment-method" onclick="selectPaymentMethod('card')">
                            <i class="bi bi-credit-card"></i>
                            <div class="method-name">Credit/Debit Card</div>
                        </div>

                        <div class="payment-method" onclick="selectPaymentMethod('bank')">
                            <i class="bi bi-bank"></i>
                            <div class="method-name">Bank Transfer</div>
                        </div>

                        <div class="payment-method" onclick="selectPaymentMethod('mobile')">
                            <i class="bi bi-phone"></i>
                            <div class="method-name">Mobile Payment</div>
                        </div>

                        <div class="payment-method" onclick="selectPaymentMethod('wallet')">
                            <i class="bi bi-wallet2"></i>
                            <div class="method-name">Digital Wallet</div>
                        </div>
                    </div>

                    <div id="cardDetails" style="display: none;">
                        <h4 class="section-title" style="font-size: 1.2rem; margin-bottom: 1rem;">
                            <i class="bi bi-credit-card"></i>
                            Card Information
                        </h4>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                            <label for="cardNumber">
                                <i class="bi bi-credit-card me-2"></i>Card Number
                            </label>                        
                        </div>

                        <div class="form-row">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                                <label for="expiryDate">
                                    <i class="bi bi-calendar me-2"></i>Expiry Date
                                </label>
                            </div>

                            <div class="form-floating">
                                <input type="text" class="form-control" id="cvv" placeholder="123">
                                <label for="cvv">
                                    <i class="bi bi-shield-lock me-2"></i>CVV
                                </label>
                            </div>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="cardHolderName" placeholder="Enter cardholder name">
                            <label for="cardHolderName">
                                <i class="bi bi-person me-2"></i>Cardholder Name
                            </label>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                        <button type="submit" class="btn-action btn-pay">
                            <i class="bi bi-shield-check"></i>
                            <span class="btn-text">Proceed tp Payment</span>
                        </button>
                        <button type="button" class="btn-action btn-secondary" onclick="cancelPayment()">
                            <i class="bi bi-x-circle"></i>Cancel
                        </button>
                    </div>
                </form>
            </div>

            <div class="payment-section">
                <h2 class="section-title">
                    <i class="bi bi-clock-history"></i>
                    Recent Payment History
                </h2>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Tax Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2025-05-10</td>
                                <td>Waste Management</td>
                                <td>LKR 1,200.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td><a href="#" class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i></a></td>
                            </tr>
                            <tr>
                                <td>2024-12-20</td>
                                <td>Property Tax</td>
                                <td>LKR 25,000.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td><a href="#" class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i></a></td>
                            </tr>
                            <tr>
                                <td>2024-06-15</td>
                                <td>Business License</td>
                                <td>LKR 8,000.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td><a href="#" class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i></a></td>
                            </tr>
                            <tr>
                                <td>2024-03-01</td>
                                <td>Street Lighting</td>
                                <td>LKR 3,000.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td><a href="#" class="btn btn-sm btn-outline-success"><i class="bi bi-download"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 CityResolve. All rights reserved. Connecting citizens with local government.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/script7.js')}}"></script>
</body>
</html>
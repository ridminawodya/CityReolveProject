@extends('layouts.citizen')

@section('content')
<style>
    :root {
        --primary-color: #4CAF50;
        --secondary-color: #F8F9FA;
        --card-bg: #FFFFFF;
        --text-color: #333333;
        --border-color: #E5E7EB;
        --shadow-medium: rgba(0, 0, 0, 0.1);
        --success-color: #10B981;
    }
    
    .form-card {
        background-color: var(--card-bg);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 12px var(--shadow-medium);
        max-width: 800px;
        margin: 40px auto;
        text-align: center;
    }

    .success-icon {
        color: var(--success-color);
        font-size: 4rem;
        margin-bottom: 20px;
        animation: scaleIn 0.5s ease-out;
    }

    @keyframes scaleIn {
        from { transform: scale(0.5); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--success-color);
        margin-bottom: 10px;
    }

    .page-subtitle {
        font-size: 1.125rem;
        color: var(--text-color);
        margin-bottom: 20px;
    }

    .transaction-details {
        background-color: var(--secondary-color);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 20px;
        margin: 30px auto;
        display: inline-block;
        text-align: left;
    }

    .transaction-details p {
        margin: 5px 0;
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
        justify-content: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }
</style>

<div class="form-card">
    <i class="fas fa-check-circle success-icon"></i>
    <h1 class="page-title">Payment Successful!</h1>
    <p class="page-subtitle">Thank you for your tax payment. Your transaction has been completed successfully.</p>

    <div class="transaction-details">
        <p><strong>Tax Type:</strong> {{ $transaction->tax_type }}</p>
        <p><strong>Amount Paid:</strong> ${{ number_format($transaction->amount, 2) }}</p>
        <p><strong>Reference Number:</strong> {{ $transaction->reference_number }}</p>
    </div>

    <div class="form-actions">
        <a href="{{ route('citizen.payments.downloadReceipt', $transaction->id) }}" class="btn btn-primary" target="_blank">
            <i class="fas fa-download"></i> Download Receipt
        </a>
        <a href="{{ route('citizen.dashboard') }}" class="btn btn-secondary">
            <i class="fas fa-home"></i> Go to Dashboard
        </a>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html>
<head>
    <title>Tax Payment Receipt</title>
    <style>
        body { font-family: 'Inter', sans-serif; line-height: 1.6; color: #333; }
        .container { width: 80%; margin: auto; padding: 20px; border: 1px solid #ddd; }
        .header { text-align: center; border-bottom: 2px solid #4CAF50; padding-bottom: 10px; margin-bottom: 20px; }
        h1 { color: #4CAF50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Official Tax Payment Receipt</h1>
            <p>Date: {{ \Carbon\Carbon::parse($payment->created_at)->format('F j, Y') }}</p>
        </div>

        <h3>Payment Details</h3>
        <table>
            <tbody>
                <tr>
                    <th>Payment ID</th>
                    <td>{{ $payment->id }}</td>
                </tr>
                <tr>
                    <th>Tax Type</th>
                    <td>{{ $payment->tax_type }}</td>
                </tr>
                <tr>
                    <th>Tax Year</th>
                    <td>{{ $payment->tax_year }}</td>
                </tr>
                <tr>
                    <th>Amount Paid</th>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>{{ str_replace('_', ' ', ucwords($payment->payment_method)) }}</td>
                </tr>
                <tr>
                    <th>Reference Number</th>
                    <td>{{ $payment->reference_number }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ucwords($payment->status) }}</td>
                </tr>
            </tbody>
        </table>

        <h3>Payer Information</h3>
        <table>
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $payment->user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $payment->user->email }}</td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top: 30px; text-align: center;">Thank you for your payment.</p>
    </div>
</body>
</html>
@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-2xl font-bold">Fund & Tax Record Details</h1>
    <div>
        <a href="{{ route('admin.fund-taxes.edit', $fundTax) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.fund-taxes.index') }}" class="btn btn-secondary">Back to Records</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $fundTax->id }}</td>
            </tr>
            <tr>
                <th>Department Name</th>
                <td>{{ $fundTax->department_name }}</td>
            </tr>
            <tr>
                <th>Tax Allocated</th>
                <td>${{ number_format($fundTax->tax_allocated, 2) }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $fundTax->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $fundTax->updated_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection


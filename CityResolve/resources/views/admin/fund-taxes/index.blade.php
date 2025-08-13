@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-2xl font-bold">Fund & Tax Management</h1>
    <a href="{{ route('admin.fund-taxes.create') }}" class="btn btn-primary">Add New Record</a>
</div>

<div class="search-form">
    <form method="GET" action="{{ route('admin.fund-taxes.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by department name..." class="form-control search-input">
        <button type="submit" class="btn btn-secondary">Search</button>
        @if(request('search'))
            <a href="{{ route('admin.fund-taxes.index') }}" class="btn btn-secondary">Clear</a>
        @endif
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Department Name</th>
            <th>Tax Allocated</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($fundTaxes as $fundTax)
            <tr>
                <td>{{ $fundTax->id }}</td>
                <td>{{ $fundTax->department_name }}</td>
                <td>${{ number_format($fundTax->tax_allocated, 2) }}</td>
                <td>{{ $fundTax->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.fund-taxes.show', $fundTax) }}" class="btn btn-secondary">View</a>
                    <a href="{{ route('admin.fund-taxes.edit', $fundTax) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.fund-taxes.destroy', $fundTax) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No fund & tax records found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $fundTaxes->links() }}
@endsection


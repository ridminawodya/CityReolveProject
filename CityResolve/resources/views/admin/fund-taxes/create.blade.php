@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-2xl font-bold">Add New Fund & Tax Record</h1>
    <a href="{{ route('admin.fund-taxes.index') }}" class="btn btn-secondary">Back to Records</a>
</div>

<form method="POST" action="{{ route('admin.fund-taxes.store') }}">
    @csrf
    
    <div class="form-group">
        <label for="department_name" class="form-label">Department Name</label>
        <input type="text" id="department_name" name="department_name" value="{{ old('department_name') }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="tax_allocated" class="form-label">Tax Allocated</label>
        <input type="number" id="tax_allocated" name="tax_allocated" value="{{ old('tax_allocated') }}" class="form-control" step="0.01" min="0" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Create Record</button>
        <a href="{{ route('admin.fund-taxes.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection


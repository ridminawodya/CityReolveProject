@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-2xl font-bold">Edit Department</h1>
    <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Back to Departments</a>
</div>

<form method="POST" action="{{ route('admin.departments.update', $department) }}">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name" class="form-label">Department Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $department->name) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="complaints_assigned" class="form-label">Complaints Assigned</label>
        <input type="number" id="complaints_assigned" name="complaints_assigned" value="{{ old('complaints_assigned', $department->complaints_assigned) }}" class="form-control" min="0" required>
    </div>

    <div class="form-group">
        <label for="staff_count" class="form-label">Staff Count</label>
        <input type="number" id="staff_count" name="staff_count" value="{{ old('staff_count', $department->staff_count) }}" class="form-control" min="0" required>
    </div>

    <div class="form-group">
        <label for="actions" class="form-label">Actions</label>
        <textarea id="actions" name="actions" class="form-control" rows="4">{{ old('actions', $department->actions) }}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Update Department</button>
        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection


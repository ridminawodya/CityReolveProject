@extends('admin.layout')

@section('content')
<!-- Add the CSS directly in a style tag for this page -->
<style>
/* Import a nice font */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

/* Define CSS variables for easy color management */
:root {
    --primary-color: #4CAF50;
    --primary-hover: #43A047;
    --secondary-color: #F8F9FA;
    --card-bg: #FFFFFF;
    --text-color: #333333;
    --label-color: #6B7280;
    --border-color: #E5E7EB;
    --shadow-light: rgba(0, 0, 0, 0.05);
    --shadow-medium: rgba(0, 0, 0, 0.1);
}

body {
    font-family: 'Inter', sans-serif;
    color: var(--text-color);
    background-color: var(--secondary-color);
}

/* Main container and page header styling */
.user-management-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.page-header h2 {
    font-size: 2rem;
    font-weight: 700;
}

/* Card styling for the form */
.card {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
    padding: 20px;
}

/* Form layout and input styling */
.form-group {
    margin-bottom: 20px;
}

.form-label {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--label-color);
    display: block;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
}

/* Action buttons styling */
.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.btn.btn-success {
    background: var(--primary-color);
    color: #fff;
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    box-shadow: 0 4px 6px rgba(76, 175, 80, 0.2);
}

.btn.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
}

.btn.btn-secondary {
    background-color: var(--border-color);
    color: var(--text-color);
}

.btn.btn-secondary:hover {
    background-color: #D1D5DB;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px var(--shadow-medium);
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .d-flex {
        flex-direction: column;
        align-items: flex-start !important;
    }
}
</style>

<div class="user-management-container">
    <div class="page-header">
        <h2>Edit Department</h2>
        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Back to Departments</a>
    </div>

    <div class="card">
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
    </div>
</div>
@endsection

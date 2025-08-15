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

.back-btn {
    display: inline-block;
    background-color: var(--card-bg);
    border: 1px solid var(--border-color);
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    color: var(--label-color);
    transition: all 0.3s ease;
    box-shadow: 0 1px 2px var(--shadow-light);
}

.back-btn:hover {
    background-color: var(--secondary-color);
    box-shadow: 0 2px 4px var(--shadow-medium);
}

/* Card styling for the form */
.card {
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow-medium);
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    color: #fff;
    padding: 20px;
    border-bottom: 1px solid var(--primary-color);
}

.card-header h3 {
    font-size: 1.5rem;
    font-weight: 600;
}

.card-body {
    padding: 20px;
}

/* Form layout and input styling */
.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.form-group {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--label-color);
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
}

.form-group small {
    font-size: 0.8rem;
    color: #9CA3AF;
    margin-top: 4px;
}

/* Action buttons styling */
.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 30px;
}

.cancel-btn,
.primary-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.cancel-btn {
    background-color: var(--border-color);
    color: var(--text-color);
}

.cancel-btn:hover {
    background-color: #D1D5DB;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px var(--shadow-medium);
}

.primary-btn {
    background: var(--primary-color);
    color: #fff;
    background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
    box-shadow: 0 4px 6px rgba(76, 175, 80, 0.2);
}

.primary-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .form-row {
        flex-direction: column;
    }
}
</style>

<div class="user-management-container">
    <div class="page-header">
        <h2>Edit User</h2>
        <a href="{{ route('admin.users.index') }}" class="back-btn">
            &larr; Back to Users
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Edit User Information</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password (leave blank to keep current)</label>
                        <input type="password" id="password" name="password">
                        <small>Leave blank to keep current password.</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" name="role" required>
                            <option value="">Select Role</option>
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="manager" {{ old('role', $user->role) === 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select id="department_id" name="department_id">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="active" {{ old('status', $user->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $user->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.users.index') }}" class="cancel-btn">Cancel</a>
                    <button type="submit" class="primary-btn">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

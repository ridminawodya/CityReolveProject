@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-2xl font-bold">Edit User</h1>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
</div>

<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Password (leave blank to keep current)</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="role" class="form-label">Role</label>
        <select id="role" name="role" class="form-control" required>
            <option value="">Select Role</option>
            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="manager" {{ old('role', $user->role) === 'manager' ? 'selected' : '' }}>Manager</option>
            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
        </select>
    </div>

    <div class="form-group">
        <label for="department_id" class="form-label">Department</label>
        <select id="department_id" name="department_id" class="form-control">
            <option value="">Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status" class="form-control" required>
            <option value="active" {{ old('status', $user->status) === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $user->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Update User</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection


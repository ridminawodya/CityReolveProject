@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-2xl font-bold">Department Details</h1>
    <div>
        <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Back to Departments</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $department->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $department->name }}</td>
            </tr>
            <tr>
                <th>Complaints Assigned</th>
                <td>{{ $department->complaints_assigned }}</td>
            </tr>
            <tr>
                <th>Staff Count</th>
                <td>{{ $department->staff_count }}</td>
            </tr>
            <tr>
                <th>Actions</th>
                <td>{{ $department->actions ?: 'N/A' }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $department->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $department->updated_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        </table>
    </div>
</div>

@if($department->users->count() > 0)
<div class="mt-4">
    <h3 class="text-lg font-bold mb-3">Users in this Department</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($department->users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <span class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection


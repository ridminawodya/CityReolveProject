@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-2xl font-bold">User Details</h1>
    <div>
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $user->role }}</td>
            </tr>
            <tr>
                <th>Department</th>
                <td>{{ $user->department ? $user->department->name : 'N/A' }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <span class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($user->status) }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection


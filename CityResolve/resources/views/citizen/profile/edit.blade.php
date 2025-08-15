@extends('layouts.citizen')

@section('content')
<style>
    /* Define CSS variables for consistency */
    :root {
        --primary-color: #4CAF50;
        --primary-hover: #43A047;
        --secondary-color: #F8F9FA;
        --card-bg: #FFFFFF;
        --text-color: #333333;
        --label-color: #6B7280;
        --border-color: #E5E7EB;
        --shadow-medium: rgba(0, 0, 0, 0.1);
        --error-color: #EF4444;
        --success-color: #10B981;
    }

    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-color);
        background-color: var(--secondary-color);
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-card {
        background-color: var(--card-bg);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 12px var(--shadow-medium);
        max-width: 800px;
        margin: 40px auto;
    }

    /* Styles for the new card and form */
    .card {
        background-color: var(--card-bg);
        border-radius: 12px;
        box-shadow: 0 4px 12px var(--shadow-medium);
        max-width: 800px;
        margin: 40px auto;
    }

    .card-body {
        padding: 40px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label, .block {
        display: block;
        font-weight: 600;
        color: var(--label-color);
        margin-bottom: 8px;
    }

    .form-input, .form-select, .mt-1 {
        width: 100%;
        padding: 12px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 1rem;
        transition: border-color 0.2s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
    }
    
    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: var(--primary-color);
        color: #fff;
        background: linear-gradient(135deg, var(--primary-color) 0%, #81C784 100%);
        box-shadow: 0 4px 6px rgba(76, 175, 80, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
    }

    .btn-secondary {
        background: #F3F4F6;
        color: #4B5563;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* Utility classes from the original template */
    .d-flex { display: flex; }
    .justify-content-between { justify-content: space-between; }
    .align-items-center { align-items: center; }
    .mb-4 { margin-bottom: 1.5rem; }
</style>

<div class="page-header">
    <h1 class="text-2xl font-bold">Edit Profile</h1>
    <a href="{{ route('citizen.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('citizen.profile.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-input mt-1 block w-full rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-input mt-1 block w-full rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $user->profile->address ?? '') }}" class="form-input mt-1 block w-full rounded-md">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->profile->phone ?? '') }}" class="form-input mt-1 block w-full rounded-md">
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
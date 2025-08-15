@extends('layouts.citizen') {{-- Or your main layout file --}}

@section('content')
<div class="container mt-5">
    <h2>Edit Complaint #{{ $complaint->id }}</h2>
    <hr>
    <form action="{{ route('complaints.update', $complaint->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-group">
            <label class="form-label">
                <i class="bi bi-person"></i> First Name
            </label>
            <input type="text" class="form-control" name="first_name" value="{{ $complaint->first_name }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="bi bi-person"></i> Last Name
            </label>
            <input type="text" class="form-control" name="last_name" value="{{ $complaint->last_name }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="bi bi-envelope"></i> Email Address
            </label>
            <input type="email" class="form-control" name="email" value="{{ $complaint->email }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="bi bi-phone"></i> Contact No
            </label>
            <input type="tel" class="form-control" name="contact_no" value="{{ $complaint->contact_no }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="bi bi-tag"></i> Category
            </label>
            <select class="form-select" name="category" required>
                <option value="">Select Category</option>
                <option value="road" @if($complaint->category === 'road') selected @endif>Road & Transportation</option>
                <option value="water" @if($complaint->category === 'water') selected @endif>Water & Sanitation</option>
                <option value="electricity" @if($complaint->category === 'electricity') selected @endif>Electricity</option>
                <option value="garbage" @if($complaint->category === 'garbage') selected @endif>Garbage Collection</option>
                <option value="noise" @if($complaint->category === 'noise') selected @endif>Noise Pollution</option>
                <option value="street-lights" @if($complaint->category === 'street-lights') selected @endif>Street Lights</option>
                <option value="parks" @if($complaint->category === 'parks') selected @endif>Parks & Recreation</option>
                <option value="building" @if($complaint->category === 'building') selected @endif>Building & Construction</option>
                <option value="other" @if($complaint->category === 'other') selected @endif>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="bi bi-pencil-square"></i> Description
            </label>
            <textarea class="form-control" rows="5" name="description" required>{{ $complaint->description }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="bi bi-geo-alt"></i> Location
            </label>
            <input type="text" class="form-control" name="location" value="{{ $complaint->location }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">
                <i class="bi bi-camera"></i> Change Photo (optional)
            </label>
            @if($complaint->photo_path)
                <img src="{{ asset('storage/' . $complaint->photo_path) }}" class="img-fluid rounded my-2" style="max-height: 150px;" alt="Current Photo">
                <p>Current Photo</p>
            @endif
            <input type="file" class="form-control" name="photo" accept="image/*">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update Complaint</button>
            <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

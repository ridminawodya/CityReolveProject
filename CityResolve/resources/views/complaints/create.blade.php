<form id="complaintForm" action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="form-label">
            <i class="bi bi-person"></i> First Name
        </label>
        <input type="text" name="first_name" class="form-control" placeholder="Enter your first name" required>
        @error('first_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="bi bi-person"></i> Last Name
        </label>
        <input type="text" name="last_name" class="form-control" placeholder="Enter your last name" required>
        @error('last_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="bi bi-envelope"></i> Email Address
        </label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="bi bi-phone"></i> Contact No
        </label>
        <input type="tel" name="contact_no" class="form-control" placeholder="Enter your contact number" required>
        @error('contact_no')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="bi bi-tag"></i> Category
        </label>
        <select name="category" class="form-select" required>
            <option value="">Select Category</option>
            <option value="road">Road & Transportation</option>
            <option value="water">Water & Sanitation</option>
            <option value="electricity">Electricity</option>
            <option value="garbage">Garbage Collection</option>
            <option value="noise">Noise Pollution</option>
            <option value="street-lights">Street Lights</option>
            <option value="parks">Parks & Recreation</option>
            <option value="building">Building & Construction</option>
            <option value="other">Other</option>
        </select>
        @error('category')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="bi bi-pencil-square"></i> Description
        </label>
        <textarea name="description" class="form-control" rows="5" placeholder="Describe your issue..." required></textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="bi bi-geo-alt"></i> Location
        </label>
        <input type="text" name="location" class="form-control" placeholder="Enter location">
        @error('location')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="bi bi-camera"></i> Attach Photo (optional)
        </label>
        <input type="file" name="photo" class="form-control" accept="image/*">
        @error('photo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="text-center">
        <button type="submit" class="submit-btn">
            <i class="bi bi-send"></i> Submit Complaint
        </button>
    </div>
</form>

@if (session('success'))
    <div class="success-message" id="successMessage">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif
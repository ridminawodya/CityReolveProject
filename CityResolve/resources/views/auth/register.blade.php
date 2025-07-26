<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- Link to your custom CSS file --}}
    <link rel="stylesheet" href="{{ asset('css/styles9.css')}}">
</head>
<body>
    <div class="animated-bg"></div>
    
    <div class="signup-container">
        <div class="brand-header">
            <div class="brand-logo">
                <i class="bi bi-buildings"></i>
            </div>
            <h1 class="brand-title">Join CityResolve</h1>
            <p class="brand-subtitle">Create your account to start resolving community issues</p>
        </div>

        {{-- Registration Form --}}
        <form method="POST" action="{{ route('register') }}" id="signupForm">
            @csrf {{-- Laravel CSRF token for security --}}

            {{-- Display general session messages (e.g., from successful registration) --}}
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {{-- Display validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-row">
                <div class="form-floating">
                    {{-- For Breeze, 'name' is the default. You'll need to adjust backend for first_name/last_name. --}}
                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>
                    <label for="firstName">
                        <i class="bi bi-person me-2"></i>First Name
                    </label>
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                    <label for="lastName">
                        <i class="bi bi-person me-2"></i>Last Name
                    </label>
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                <label for="email">
                    <i class="bi bi-envelope me-2"></i>Email Address
                </label>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-floating">
                    {{-- Custom field: phone --}}
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                    <label for="phone">
                        <i class="bi bi-telephone me-2"></i>Phone Number
                    </label>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating">
                    {{-- Custom field: user_type --}}
                    <select class="form-select" id="userType" name="user_type" required>
                        <option value="" disabled {{ old('user_type') == '' ? 'selected' : '' }}>Select Account Type</option>
                        <option value="citizen" {{ old('user_type') == 'citizen' ? 'selected' : '' }}>Citizen</option>
                        <option value="business" {{ old('user_type') == 'business' ? 'selected' : '' }}>Business Owner</option>
                        <option value="organization" {{ old('user_type') == 'organization' ? 'selected' : '' }}>Organization</option>
                    </select>
                    <label for="userType">
                        <i class="bi bi-person-badge me-2"></i>Account Type
                    </label>
                    @error('user_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-floating">
                {{-- Custom field: username. If you want this to be the login field, ensure User model and LoginRequest are updated. --}}
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                <label for="username">
                    <i class="bi bi-at me-2"></i>Username
                </label>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                <label for="password">
                    <i class="bi bi-lock me-2"></i>Password
                </label>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password Strength Indicator (Frontend only, requires script9.js) --}}
            <div class="password-strength">
                <div class="strength-bar">
                    <div class="strength-fill" id="strengthFill"></div>
                </div>
                <div class="strength-text" id="strengthText">Password strength will appear here</div>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                <label for="confirmPassword">
                    <i class="bi bi-lock-fill me-2"></i>Confirm Password
                </label>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-floating">
                {{-- Custom field: address --}}
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address') }}" required>
                <label for="address">
                    <i class="bi bi-geo-alt me-2"></i>Address
                </label>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-floating">
                    {{-- Custom field: city --}}
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ old('city') }}" required>
                    <label for="city">
                        <i class="bi bi-building me-2"></i>City
                    </label>
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating">
                    {{-- Custom field: postal_code --}}
                    <input type="text" class="form-control" id="postalCode" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code') }}" required>
                    <label for="postalCode">
                        <i class="bi bi-mailbox me-2"></i>Postal Code
                    </label>
                    @error('postal_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="terms-checkbox">
                <input class="form-check-input" type="checkbox" id="agreeTerms" name="terms" value="1" {{ old('terms') ? 'checked' : '' }} required>
                <label class="form-check-label" for="agreeTerms">
                    I agree to the <a href="#" id="termsLink">Terms of Service</a> and <a href="#" id="privacyLink">Privacy Policy</a>. I understand that my information will be used to improve municipal services and community engagement.
                </label>
                @error('terms')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-signup">
                <i class="bi bi-person-plus me-2"></i>
                <span class="btn-text">Create Account</span>
            </button>
        </form>

        <div class="login-link">
            <p>Already have an account? 
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">Sign In</a>
                @endif
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/script9.js')}}"></script>
    <script>
    </script>
</body>
</html>

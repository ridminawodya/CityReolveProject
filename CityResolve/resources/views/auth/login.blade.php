<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityResolve - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- Link to your custom CSS file --}}
    <link rel="stylesheet" href="{{ asset('css/styles10.css')}}">
</head>
<body>
    <div class="animated-bg"></div>
    
    <div class="login-container">
        <div class="brand-header">
            <div class="brand-logo">
                <i class="bi bi-buildings"></i>
            </div>
            <h1 class="brand-title">CityResolve</h1>
            <p class="brand-subtitle">Municipal Complaint Resolution System</p>
        </div>

        {{-- The form action points to Laravel's login route --}}
        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf {{-- Laravel CSRF token for security --}}

            {{-- Display general session messages (e.g., from failed login attempts) --}}
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-floating">
                {{-- IMPORTANT: Changed 'username' to 'email' --}}
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                <label for="email">
                    <i class="bi bi-person me-2"></i>Email Address
                </label>
                @error('email') {{-- Display error for email field --}}
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                <label for="password">
                    <i class="bi bi-lock me-2"></i>Password
                </label>
                @error('password') {{-- Display error for password field --}}
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                <span class="btn-text">Sign In</span>
            </button>

            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" id="forgotPassword">Forgot your password?</a>
                @endif
            </div>
        </form>

        <div class="signup-link">
            <p>Don't have an account? 
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Create Account</a>
                @endif
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Link to your custom JS file --}}
</body>
</html>

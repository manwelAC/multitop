<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login - Multi-top</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('venton/assets/images/favicon.ico') }}">

    <!-- CSS -->
    <link href="{{ asset('venton/assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('venton/assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('venton/assets/css/app.min.css') }}" rel="stylesheet">
    
    <style>
        .logo-white-bg {
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
        }
        .is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
        .remember-me {
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow">
                    <div class="row g-0">
                        <!-- Left Side - Logo & Description -->
                        <div class="col-md-6 d-none d-md-flex p-4" style="background: linear-gradient(135deg, #0d6efd 0%, #084298 100%);">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center w-100 p-3 text-white">
                                <div class="logo-white-bg mb-4">
                                    <img src="{{ asset('venton/assets/images/logo-light.png') }}" alt="Multi-top Logo" class="img-fluid" style="height: 200px;">
                                </div>
                                <h4 class="mb-3">Welcome to Multi-top</h4>
                                <p class="small mb-4" style="max-width: 350px;">
                                    Log in to manage and review your Multi-top services with ease. 
                                    Enter your credentials to access your account.
                                </p>
                                <div class="d-flex align-items-center small">
                                    <i class="bi bi-shield-check me-2"></i>
                                    <span>Enterprise-grade security</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Side - Login Form -->
                        <div class="col-md-6">
                            <div class="card-body p-4 p-md-5">
                                <div class="text-center mb-4 d-md-none">
                                    <div class="logo-white-bg d-inline-block mb-3">
                                        <img src="{{ asset('venton/assets/images/logo-light.png') }}" alt="Multi-top Logo" class="img-fluid" style="height: 150px;">
                                    </div>
                                    <h5 class="text-primary">Admin Login</h5>
                                </div>
                                
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <form method="POST" action="{{ route('login.submit') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label small text-muted">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill text-muted"></i></span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                name="email" value="{{ old('email') }}" required autofocus>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label small text-muted">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock-fill text-muted"></i></span>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                                name="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label remember-me" for="remember">Remember me</label>
                                    </div>
                                    
                                    <div class="d-grid mb-3">
                                        <button type="submit" class="btn btn-primary py-2">
                                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   
</body>
</html>
@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', 'Login')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0 rounded-4 p-4">
                    <div class="card-body">
                        <h2 class="text-center fw-bold mb-4">Welcome Back </h2>
                        <p class="text-center text-muted mb-4">Login to your account to continue</p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="form-floating mb-3">
                                <input type="email" id="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="name@example.com" value="{{ old('email') }}"   autofocus>
                                <label for="email"><i class="bi bi-envelope-fill me-2"></i>Email address</label>
                                @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input type="password" id="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password"  >
                                <label for="password"><i class="bi bi-lock-fill me-2"></i>Password</label>
                                @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>

                            <!-- Submit -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                                </button>
                            </div>

                            <!-- Forgot Password -->
                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        Forgot your password?
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Optional: Register Prompt -->
                <div class="text-center mt-4">
                    <small class="text-muted">Don't have an account?</small>
                    <a href="{{ route('register') }}" class="fw-bold">Sign up</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Add some animation or hover effect -->
    <style>
        .card {
            background: #fff;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
        }

        .btn-primary {
            background-color: #4a6cf7;
            border: none;
        }

        .btn-primary:hover {
            background-color: #3d5ee3;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #4a6cf7;
        }
    </style>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

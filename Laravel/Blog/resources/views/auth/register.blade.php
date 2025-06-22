@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('title', 'Register')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card shadow-sm border-0 rounded-4 p-4">
                    <div class="card-body">
                        <h2 class="text-center fw-bold mb-4">Create Account</h2>
                        <p class="text-center text-muted mb-4">Join our bold community in just a few seconds!</p>

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Name --}}
                            <div class="form-floating mb-3">
                                <input id="name" type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Your Full Name" value="{{ old('name') }}" required>
                                <label for="name"><i class="bi bi-person-fill me-2"></i>Name</label>
                                @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="form-floating mb-3">
                                <input id="email" type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="name@example.com" value="{{ old('email') }}" required>
                                <label for="email"><i class="bi bi-envelope-fill me-2"></i>Email address</label>
                                @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Username --}}
                            <div class="form-floating mb-3">
                                <input id="username" type="text" name="username"
                                       class="form-control @error('username') is-invalid @enderror"
                                       placeholder="username" value="{{ old('username') }}" required>
                                <label for="username"><i class="bi bi-at me-2"></i>Username</label>
                                @error('username')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Profile Image --}}
                            <div class="mb-3">
                                <label for="profile_image" class="form-label fw-semibold">Profile Image</label>
                                <input id="profile_image" type="file"
                                       class="form-control @error('profile_image') is-invalid @enderror"
                                       name="profile_image" accept="image/*">
                                @error('profile_image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="form-floating mb-3">
                                <input id="password" type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password" required>
                                <label for="password"><i class="bi bi-lock-fill me-2"></i>Password</label>
                                @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="form-floating mb-4">
                                <input id="password-confirm" type="password" name="password_confirmation"
                                       class="form-control" placeholder="Confirm Password" required>
                                <label for="password-confirm"><i class="bi bi-shield-lock-fill me-2"></i>Confirm Password</label>
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                    <i class="bi bi-person-plus-fill me-1"></i> Register
                                </button>
                            </div>

                            {{-- Already have an account --}}
                            <div class="text-center mt-4">
                                <small class="text-muted">Already have an account?</small>
                                <a href="{{ route('login') }}" class="fw-bold">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Optional Custom Styles --}}
    <style>
        .card {
            background-color: #fff;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.06);
        }

        .form-control:focus {
            border-color: #4a6cf7;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #4a6cf7;
            border: none;
        }

        .btn-primary:hover {
            background-color: #3d5ee3;
        }
    </style>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

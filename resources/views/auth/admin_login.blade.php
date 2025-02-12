@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="mb-3">Admin Login</h3>
        <form method="POST" action="{{ route('login.admin.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger w-100">Login as Admin</button>
        </form>

        <!-- Signup Link -->
        <div class="text-center mt-3">
            <p>Don't have an admin account? <a href="{{ route('register.admin') }}">Sign up here</a></p>
        </div>
    </div>
</div>
@endsection

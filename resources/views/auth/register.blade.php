@extends('layout')

@section('content')
    <div class="register row g-0">
        <div class="col-12 col-md-6 d-md-flex d-none align-items-md-start align-items-center justify-content-center p-4">
            <figure class="w-100 text-center">
                <img src="{{ asset('img/login-bg.png') }}" alt="Background Image" class="img-fluid" style="max-height: 450px;">
            </figure>
        </div>

        <div class="col-12 col-md-6 d-flex align-items-md-start align-items-center justify-content-center p-4">
            <div class="w-100" style="max-width: 450px;">
                <br>
                <form id="registerForm" action="/registerUser" method="POST" class="w-100 mt-5">
                    @csrf
                    <h2 class="mb-4 fw-bold text-center">Create an account</h2>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>


                    <div class="mb-3">
                        <label for="email_address" class="form-label">Email Address</label>
                        <input type="email" name="email_address" class="form-control" id="email_address" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-secondary w-100 fw-bold">
                        <i class="fa-solid fa-sign-in-alt me-2"></i> Register
                    </button>
                    <div class="mt-3 d-flex align-items-center justify-content-center">
                        <a class="text-dark fw-bold text-center" href="{{route('auth.loginView')}}">Already have an account? Login instead</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
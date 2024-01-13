@extends('frontend.auth.page')
@section('form-content')
    <div class="col-md-12 col-lg-6 login-right">
        <div class="login-header">
            <h3>Forgot Password?</h3>
            <p class="small text-muted">Enter your email to get a password reset link</p>
        </div>

        <!-- Forgot Password Form -->
        <form action="#">
            <div class="form-group form-focus">
                <input type="email" class="form-control floating">
                <label class="focus-label">Email</label>
            </div>
            <div class="text-right">
                <a class="forgot-link" href="{{ url('/auth/login') }}">Remember your password?</a>
            </div>
            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Reset Password</button>
        </form>
        <!-- /Forgot Password Form -->

    </div>
@endsection

@extends('frontend.auth.page')
@section('form-content')
    <div class="col-md-12 col-lg-6 login-right">
        <div class="login-header">
            <h3>Login <span>Apex Clinic</span></h3>
        </div>
        <form action="{{ url('/auth/login-me') }}" method="post">
            @csrf
            <!-- Add a hidden input field for intended URL -->
            <input type="hidden" name="redirect_url" value="{{ url('/') }}">

            <div class="form-group form-focus">
                <input type="email" name="email" class="form-control floating">
                <label class="focus-label">Email</label>
            </div>
            <div class="form-group form-focus">
                <input type="password" name="password" class="form-control floating">
                <label class="focus-label">Password</label>
            </div>
            <div class="text-right">
                <a class="forgot-link" href="{{ url('/auth/forgot-password') }}">Forgot Password ?</a>
            </div>
            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
            <div class="login-or">
                <span class="or-line"></span>
                <span class="span-or">or</span>
            </div>
            <div class="row form-row social-login">
                <div class="col-6">
                    <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                </div>
                <div class="col-6">
                    <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                </div>
            </div>
            <div class="text-center dont-have">Don't have an account? <a href="{{ url('/auth/register') }}">Register</a>
            </div>
        </form>
    </div>
@endsection

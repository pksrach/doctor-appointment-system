@extends('frontend.auth.page')
@section('form-content')
    <div class="col-md-12 col-lg-6 login-right">
        <div class="login-header">
            <h3>Login <span>Apex Clinic</span></h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ url('/auth/login-me') }}" method="post" id="loginForm" class="needs-validation" novalidate>
            @csrf
            <!-- Add a hidden input field for intended URL -->
            <input type="hidden" name="redirect_url" value="{{ url('/') }}">

            <div class="form-group form-focus">
                <input type="email" name="email" class="form-control floating" id="email" required>
                <label class="focus-label">Email</label>
                <div class="invalid-feedback">Email is required.</div>
            </div>
            <div class="form-group form-focus">
                <input type="password" name="password" class="form-control floating" id="password" required minlength="6">
                <label class="focus-label">Password</label>
                <div class="invalid-feedback">Password is required.</div>
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
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    var password = document.getElementById('password');
                    var feedback = password.parentNode.querySelector('.invalid-feedback');

                    // validate password as the user types
                    password.oninput = function() {
                        if (password.value.length < 6) {
                            feedback.textContent = 'Password must be at least 6 characters long.';
                        } else {
                            feedback.textContent = '';
                        }
                    }

                    // validate form before submit
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        /* (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    // validate password before submit
                    form.addEventListener('submit', function(event) {
                        var password = document.getElementById('password');
                        var feedback = password.parentNode.querySelector('.invalid-feedback');

                        password.oninput = function() {
                            if (password.value.length < 6) {
                                feedback.textContent =
                                    'Password must be at least 6 characters long.';
                            } else {
                                feedback.textContent = 'Password is required.';
                            }
                        }

                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })(); */
    </script>
@endsection

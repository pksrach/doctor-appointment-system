@extends('frontend.auth.page')
@section('form-content')
    <div class="col-md-12 col-lg-6 login-right">
        <div class="login-header">
            <h3>Patient Register</h3>
        </div>

        <!-- Register Form -->
        <form action="{{ url('/auth/register/save') }}" method="post" id="registerForm" class="needs-validation" novalidate>
            @csrf
            <div class="form-group form-focus input-group">
                <input type="text" class="form-control" id="name" name="name" required>
                <label for="name" class="focus-label">Name</label>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group form-focus input-group">
                <input type="email" class="form-control" id="email" name="email" required>
                <label class="focus-label">Email</label>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group form-focus input-group">
                <input type="password" class="form-control floating" id="password" name="password" required>
                <label class="focus-label">Create Password</label>
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-eye" id="togglePassword"></i>
                    </span>
                </div>
                <div class="invalid-feedback">Password is required.</div>
            </div>
            <div class="form-group form-focus input-group">
                <input type="password" class="form-control floating" id="password_confirmation" name="password_confirmation"
                    required>
                <label class="focus-label">Confirm Create Password</label>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="text-right">
                <a class="forgot-link" href="{{ url('/auth/login') }}">Already have an account?</a>
            </div>
            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
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
        </form>
        <!-- /Register Form -->
    </div>
    <script>
        window.addEventListener('load', function() {
            var form = document.getElementById('registerForm');
            var name = document.getElementById('name');
            var email = document.getElementById('email');
            var password = document.getElementById('password');
            var passwordConfirmation = document.getElementById('password_confirmation');

            var nameError = document.getElementById('nameError');
            var emailError = document.getElementById('emailError');
            var passwordError = document.getElementById('passwordError');

            form.addEventListener('submit', function(event) {
                var isValid = true;

                // Clear previous error messages
                nameError.textContent = '';
                emailError.textContent = '';
                passwordError.textContent = '';

                // Validate name
                if (name.value.trim() === '') {
                    nameError.textContent = 'Name is required.';
                    isValid = false;
                }

                // Validate email
                else if (email.value.trim() === '') {
                    emailError.textContent = 'Email is required.';
                    isValid = false;
                }

                // Validate password
                else if (password.value.length < 6) {
                    passwordError.textContent = 'Password must be at least 6 characters long.';
                    isValid = false;
                }

                // Validate password confirmation
                else if (password.value !== passwordConfirmation.value) {
                    passwordError.textContent = 'Passwords do not match.';
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });

        // show/hide password
        document.getElementById('togglePassword').addEventListener('click', function(e) {
            var passwordInput = document.getElementById('password');
            var passwordConInput = document.getElementById('password_confirmation');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordConInput.type = 'text';
                e.target.classList.add('fa-eye-slash'); // Change the eye icon to eye slash
            } else {
                passwordInput.type = 'password';
                passwordConInput.type = 'password';
                e.target.classList.remove('fa-eye-slash'); // Change the eye slash back to eye
            }
        });
    </script>
@endsection

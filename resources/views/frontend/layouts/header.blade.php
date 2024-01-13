<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apex Clinic</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free-6.5.1-web/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free-6.5.1-web/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Override style --}}
    @yield('style')
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="{{ url('/') }}" class="navbar-brand logo">
                        <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>

                {{-- Menu --}}
                @include('frontend.layouts.menu')
                {{-- End of menu --}}

                <ul class="nav header-navbar-rht">
                    <li class="nav-item contact-item">
                        <div class="header-contact-img">
                            <i class="far fa-hospital"></i>
                        </div>
                        <div class="header-contact-detail">
                            <p class="contact-header">Contact</p>
                            <p class="contact-info-header"><a href="tel:+855 886963482">+855 886963482</a></p>
                        </div>
                    </li>
                    @auth
                        <!-- User Menu -->
                        <li class="nav-item dropdown has-arrow logged-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <img class="rounded-circle" src="assets/img/patients/patient.jpg" width="31"
                                        alt="Ryan Taylor">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="user-header">
                                    <div class="avatar avatar-sm">
                                        <img src="assets/img/patients/patient.jpg" alt="User Image"
                                            class="avatar-img rounded-circle">
                                    </div>
                                    <div class="user-text">
                                        <h6>Richard Wilson</h6>
                                        <p class="text-muted mb-0">Patient</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{ url('/patient-dashboard') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ url('/profile-setting') }}">Profile Settings</a>
                                <a class="dropdown-item" href="{{ url('/login') }}">Logout</a>
                            </div>
                        </li>
                        <!-- /User Menu -->
                    @else
                        <li class="nav-item">
                            <a class="nav-link header-login" href="{{ url('/auth/login') }}">login / Signup </a>
                        </li>
                    @endauth
                </ul>
            </nav>
        </header>
        <!-- /Header -->

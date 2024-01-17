@extends('frontend.layouts.master')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            @if (Request::is('patient-dashboard'))
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            @elseif(Request::is('favorite'))
                                <li class="breadcrumb-item active" aria-current="page">Favorite</li>
                            @elseif(Request::is('profile-setting'))
                                <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
                            @elseif(Request::is('change-password'))
                                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                            @endif
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">
                        @if (Request::is('patient-dashboard'))
                            Dashboard
                        @elseif(Request::is('favourites'))
                            Favorite
                        @elseif(Request::is('profile-setting'))
                            Profile Setting
                        @elseif(Request::is('change-password'))
                            Change Password
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="assets/img/patients/patient.jpg" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>Richard Wilson</h3>
                                    <div class="patient-details">
                                        <h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li class="{{ Request::is('patient-dashboard') ? 'active' : '' }}">
                                        <a href="{{ url('/patient-dashboard') }}">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('favorite') ? 'active' : '' }}">
                                        <a href="{{ url('/favorite') }}">
                                            <i class="fas fa-bookmark"></i>
                                            <span>Favourites</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('profile-setting') ? 'active' : '' }}">
                                        <a href="{{ url('/profile-setting') }}">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('change-password') ? 'active' : '' }}">
                                        <a href="{{ url('/change-password') }}">
                                            <i class="fas fa-lock"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
                <!-- / Profile Sidebar -->

                {{-- Content --}}
                <div class="col-md-7 col-lg-8 col-xl-9">
                    @yield('content-dashboard')
                </div>
                {{-- End of Content --}}

            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection

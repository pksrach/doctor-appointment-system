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
                            <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Terms and Conditions</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="terms-content">
                        <div class="terms-text">
                            <h4>Acceptance of Terms:</h4>
                            <p>By using the Doctor's Appointment System, users agree to comply with and be bound by these
                                terms and conditions.
                                The service provider reserves the right to update, modify, or change these terms at any time
                                without prior notice.</p>
                        </div>
                        <div class="terms-text">
                            <h4>User Registration:</h4>
                            <p>Users must register an account to access the Doctor's Appointment System. They agree to
                                provide accurate, current, and complete information during the registration process and to
                                update this information to keep it accurate, current, and complete.</p>
                        </div>
                        <div class="terms-text">
                            <h4>Appointment Booking:</h4>
                            <li>
                                Users can book appointments with available healthcare providers through the system.
                            </li>
                            <li>
                                Appointment availability is subject to the healthcare provider's schedule.
                            </li>
                            <li>
                                Users are responsible for ensuring the accuracy of the information provided during the
                                appointment booking process.
                            </li>
                        </div>
                        <div class="terms-text">
                            <h4>Cancellation and Rescheduling:</h4>
                            <li>Users may cancel or reschedule appointments within the specified time frame, as
                                determined by the healthcare provider's policy.</li>
                            <li> Late cancellations or no-shows may result in penalties or fees, as specified by the
                                healthcare provider.</li>
                        </div>
                        <div class="terms-text">
                            <h4>Privacy and Confidentiality:</h4>
                            <li>The system will handle user data in accordance with privacy laws and regulations.</li>
                            <li>Users understand and agree that their health information may be shared with the healthcare
                                provider for the purpose of the appointment.</li>
                        </div>
                        <div class="terms-text">
                            <h4>System Availability:</h4>
                            <li>The service provider will make reasonable efforts to ensure the availability of the Doctor's
                                Appointment System.</li>
                            <li>The service provider is not liable for any disruptions, delays, or unavailability of the
                                system due to technical issues, maintenance, or other unforeseen circumstances.</li>
                        </div>
                        <div class="terms-text">
                            <h4>User Conduct:</h4>
                            <li>Users agree to use the system in a manner consistent with all applicable laws and
                                regulations.</li>
                            <li>Users are prohibited from engaging in any activity that may disrupt the operation of the
                                system or compromise its security.</li>
                        </div>
                        <div class="terms-text">
                            <h4>Liability:</h4>
                            <li>The service provider is not liable for any damages or losses arising from the use of the
                                Doctor's Appointment System.</li>
                            <li>Users acknowledge that the system is provided "as is" and without warranties of any kind.
                            </li>
                        </div>
                        <div class="terms-text">
                            <h4>Termination:</h4>
                            <p>The service provider reserves the right to terminate or suspend user accounts at its
                                discretion, with or without cause.</p>
                        </div>
                        <div class="terms-text">
                            <h4>Governing Law:</h4>
                            <p>These terms and conditions are governed by the laws of <b>ISO2024<b>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection

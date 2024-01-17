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
                            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Privacy Policy</h2>
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
                            <h4>1. Introduction</h4>
                            <p>Thank you for choosing our Doctor Appointment Website. This Privacy Policy is meant to help you understand how we collect, use, disclose, and safeguard your personal information when you use our website and services.</p>
                        </div>
                        <div class="terms-text">
                            <h4>2. Information We Collect</h4>
                            <ol type="A">
                                <li>Personal Information: When you register for an account or make a doctor appointment, we may collect personal information such as your name, email address, phone number, and other relevant details.</li>
                                <li>Health Information: In the process of booking a doctor appointment, you may provide information about your health condition, medical history, and related details. This information is crucial for facilitating the appointment and ensuring appropriate healthcare services.</li>
                                <li>Usage Information: We collect information about how you interact with our website, including the pages you visit, the time and date of your visits, and the duration of your sessions.</li>
                                <li>Device Information: We may collect information about the device you are using, including its type, model, operating system, and unique identifiers.</li>
                            </ol>
                        </div>
                        <div class="terms-text">
                            <h4>3. How We Use Your Information</h4>
                            <ol>
                                <li>Appointment Processing: We use your personal and health information to facilitate the scheduling of doctor appointments and to ensure that healthcare providers have the necessary information to provide appropriate services.</li>
                                <li>Communication: We may use your contact information to send you appointment reminders, updates, and other relevant communications.</li>
                                <li>Improving Services: We analyze the information collected to improve the functionality and user experience of our website.</li>
                                <li>Legal Compliance: We may use your information to comply with legal obligations, such as responding to legal requests and preventing fraudulent activities.</li>
                            </ol>
                        </div>
                        <div class="terms-text">
                            <h4>pulvinar</h4>
                            <p>Sed sollicitudin, diam nec tristique tincidunt, nulla ligula facilisis nunc, non condimentum
                                tortor leo id ex.</p>

                            <p>Vivamus consectetur metus at nulla efficitur mattis. Aenean egestas eu odio vestibulum
                                vestibulum. Duis nulla lectus, lacinia vitae nibh vitae, sagittis interdum lacus. Mauris
                                lacinia leo odio, eget finibus lectus pharetra ut. Nullam in semper enim, id gravida nulla.
                            </p>

                            <p>Donec posuere dictum enim, vel sollicitudin orci tincidunt ac. Maecenas mattis ex eu elit
                                tincidunt egestas. Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit
                                lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.Donec posuere dictum enim,
                                vel sollicitudin orci tincidunt ac. Maecenas mattis ex eu elit tincidunt egestas. Vivamus
                                posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed
                                dapibus arcu eget egestas hendrerit.</p>
                        </div>
                        <div class="terms-text">
                            <h4>efficitur</h4>

                            <p>Fusce gravida auctor justo, vel lobortis sem efficitur id. Cras eu eros vitae justo dictum
                                tempor.</p>

                            <p><strong>Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a
                                    aliquam. Sed dapibus arcu eget egestas hendrerit.Donec posuere dictum enim, vel
                                    sollicitudin orci tincidunt ac.</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection

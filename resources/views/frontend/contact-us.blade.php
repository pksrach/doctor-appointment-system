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
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Contact Us</h2>


                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    {{-- Contain --}}
    <div class="top-content container">
    <style>
        .google-maps {
            position: relative;
            padding-bottom: 75%; // This is the aspect ratio
            height: 0;
            overflow: hidden;
        }
        .google-maps iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 30% !important;
            height: 30% !important;
        }

    </style>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h4 class="mt-5 text-info text-bold">FOR MORE INFORMATION PLEASE CONTACT US</h4>
                <hr />
                <h4 class="mt-5 text-info">APEX CLINIC</h4>
                            <p>
                                <i class="fas fa-phone-alt"></i>
                                +855 886963482
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope"></i>
                                doctor.support@gmail.com
                            </p>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <img src="https://static.ips-cambodia.com/wp-content/uploads/2019/09/Sihanouk-Hospital-Center-of-HOPE-1024x679.jpg"
                    alt="APEX CLINIC" class="img-fluid img-border" />
        </div>    
        <br></br>
        <br></br>
        <div class="col-lg-12 col-md-12 col-12">
            <div class="google-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804" frameborder="0" style="border:0"></iframe>
            </div>  
            <div class="footer-address">
                <p><i class="fas fa-map-marker-alt"></i>
                    No. 86A, Street 110, Russian Federation Boulevard,
                    Sangkat Teuk Laak I, Khan Toul Kork, Phnom Penh, Cambodia </p>
            </div>
        </div>         
    </div>

    {{-- End of Contain --}}
@endsection

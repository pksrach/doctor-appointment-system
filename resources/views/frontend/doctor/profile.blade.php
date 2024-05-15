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
                            <li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Doctor Profile</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Doctor Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{ asset('assets/img/doctors/doctor-thumb-02.jpg') }}" class="img-fluid"
                                    alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">Dr. Darren Elder</h4>
                                <p class="doc-speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
                                <p class="doc-department"><img
                                        src="{{ asset('assets/img/specialities/specialities-05.png') }}" class="img-fluid"
                                        alt="Speciality">Dentist</p>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(35)</span>
                                </div>
                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a
                                            href="javascript:void(0);">Get Directions</a></p>
                                </div>
                                <div class="clinic-services">
                                    <span>Dental Fillings</span>
                                    <span>Teeth Whitneing</span>
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                                    <li><i class="far fa-money-bill-alt"></i> $100 per hour </li>
                                </ul>
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{ url('/booking') }}">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

        </div>
    </div>
    <!-- /Page Content -->
@endsection

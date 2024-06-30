@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.search-contain')

    <div class="col-md-12 col-lg-12 col-xl-12">

        @foreach($data['doctors'] as $doctor)
            <!-- Doctor Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <a href="{{ url('/doctor-profile') }}">
                                    <img src="{{ asset($doctor->image ? 'uploads/' . $doctor->image : 'doctor_default.png') }}" class="img-fluid" alt="User Image">
                                </a>
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name"><a href="{{ url('/doctor-profile') }}">{{ $doctor->name }}</a></h4>
                                <h5 class="doc-department"><img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">{{ $doctor->speciality }}</h5>
                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-money-bill-alt"></i> ${{ $doctor->fee }} <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i></li>
                                </ul>
                            </div>
                            <div class="clinic-booking">
                                <a class="view-pro-btn" href="{{ url('/doctor-profile') }}">View Profile</a>
                                <a class="apt-btn" href="{{ url('/booking') }}">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->
        @endforeach

        <div class="load-more text-center">
            <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>
        </div>
    </div>
@endsection

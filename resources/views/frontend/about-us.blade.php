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
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">About Us</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    {{-- Contain --}}
    <div class="top-content container">
        <h4 class="mt-5 text-info text-bold">Our Vision & Mission</h4> <hr />
            <div class="custom-card row pt-4 mb-5" style="height: 270px;">
                <div class="col-12 d-flex justify-content-center flex-wrap-reverse">
                    <div class="col-lg-5 col-md-6 col-12 shadow p-5" style="z-index: 200;border-radius: 0px 0px 5px 5px;">
                        <div class="row">
                            <div class="col-10">
                                <p style="font-size:10.7px;color:gray;">
                                    We aim to offer the same quality of service and medical excellence just like Japan Hospitals.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-12 p-0 d-inline">
                        <img src="assets\img\hospital-01.jpg" alt="" style="width:100%" />
                    </div>
                </div>
            </div>
    </div>
    {{-- End of Contain --}}
@endsection

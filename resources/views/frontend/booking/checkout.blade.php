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
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Checkout</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <!-- Checkout Form -->
                            <form action="#">

                                <!-- Personal Information -->
                                <div class="info-widget">
                                    <h4 class="card-title">Personal Information</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group card-label">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" name="firstName"
                                                       value="{{!empty($customer->firstname) ? $customer->firstname : ''}}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group card-label">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" name="lastName"
                                                       value="{{!empty($customer->lastname) ? $customer->lastname: ''}}"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group card-label">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email"
                                                       value="{{Auth::user()->email}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group card-label">
                                                <label>Phone</label>
                                                <input class="form-control" type="text" name="phone"
                                                       value="{{!empty($customer->phone) ? $customer->phone : ''}}"
                                                       disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Personal Information -->

                                <div class="payment-widget">
                                    <h4 class="card-title">Payment Method</h4>

                                    <!-- Payment Method -->
                                    <div class="payment-list">
                                        <label for="payment-method">Payment Method</label>
                                        <select id="payment-method" name="payment-method" class="form-control">
                                            <option value="aba">ABA Bank</option>
                                            <option value="chipmong">Chipmong Bank</option>
                                            <option value="acleda">Acleda Bank</option>
                                            <option value="canadia">Canadia Bank</option>
                                        </select>
                                    </div>
                                    <!-- /Payment Method -->

                                    <br/>
                                    <!-- Terms Accept -->
                                    <div class="terms-accept">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="terms_accept">
                                            <label for="terms_accept">I have read and accept <a
                                                    href="{{ url('/term-condition') }}">Terms &amp;
                                                    Conditions</a></label>
                                        </div>
                                    </div>
                                    <!-- /Terms Accept -->

                                    <!-- Submit Section -->
                                    <div class="submit-section mt-4">
                                        <button type="submit" class="btn btn-primary submit-btn">Confirm and Pay
                                        </button>
                                    </div>
                                    <!-- /Submit Section -->

                                </div>
                            </form>
                            <!-- /Checkout Form -->

                        </div>
                    </div>

                </div>

                <div class="col-md-5 col-lg-4 theiaStickySidebar">

                    <!-- Booking Summary -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h4 class="card-title">Booking Summary</h4>
                        </div>
                        <div class="card-body">

                            <!-- Booking Doctor Info -->
                            <div class="booking-doc-info">
                                <a href="{{ url('/doctor-profile') }}" class="booking-doc-img">
                                    <img
                                        src="{{asset($doctor->attachment ? 'uploads/'.$doctor->attachment : 'doctor_default.png')}}"
                                        alt="">
                                </a>
                                <div class="booking-info">
                                    <h4>
                                        <a href="{{ url('/doctor-profile') }}">{{!empty($doctor->name) ? $doctor->name : 'N/A'}}</a>
                                    </h4>
                                    <div class="clinic-details">
                                        <p class="doc-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{!empty($doctor->address) ? $doctor->address : 'N/A'}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Booking Doctor Info -->

                            <div class="booking-summary">
                                <div class="booking-item-wrap">
                                    <ul class="booking-date">
                                        <li>Date <span id="selectedDate">{{ session('date', 'N/A') }}</span></li>
                                        <li>Time <span id="selectedTime">{{ session('time', 'N/A') }}</span></li>
                                    </ul>
                                    <ul class="booking-fee">
                                        <li>Booking Fee <span>${{$doctor->fee}}</span></li>
                                    </ul>
                                    <div class="booking-total">
                                        <ul class="booking-total-list">
                                            <li>
                                                <span>Total</span>
                                                <span class="total-cost">${{$doctor->fee}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Booking Summary -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection

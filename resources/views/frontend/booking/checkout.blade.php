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

            <form action="{{route('make.checkout')}}" method="post" autocomplete="off"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-7 col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <!-- Checkout Form -->
                                <!-- Personal Information -->
                                <div class="info-widget">
                                    <h4 class="card-title">Personal Information</h4>
                                    <input type="hidden" id="customerId" name="customerId"
                                           value="{{!empty($customer->id) ? $customer->id : ''}}">
                                    <input type="hidden" id="doctorId" name="doctorId"
                                           value="{{!empty($doctor->id) ? $doctor->id : ''}}">
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
                                        <label for="paymentMethod">Payment Method</label>
                                        <select id="paymentMethod" name="paymentMethod" class="form-control">
                                            <option value="ABA Bank">ABA Bank</option>
                                            <option value="Chipmong Bank">Chipmong Bank</option>
                                            <option value="Acleda Bank">Acleda Bank</option>
                                            <option value="Canadia Bank">Canadia Bank</option>
                                        </select>
                                    </div>
                                    <!-- /Payment Method -->

                                    {{--Image Upload--}}
                                    <div class="image-upload">
                                        <label for="attachment">Upload Image</label>
                                        <input class="form-control form-control-md" name="attachment" id="attachment" type="file"
                                               accept="image/*" onchange="previewImage(event)">
                                    </div>
                                    <!-- /Image Upload -->

                                    <!-- Image Preview -->
                                    <div class="card-body text-center">
                                        <img id="preview" src="{{asset('bank_default.png')}}" alt="Image Preview"
                                             style="max-width: 200px; max-height: 200px;">
                                    </div>
                                    <!-- /Image Preview -->

                                    <br/>
                                    <!-- Terms Accept -->
                                    <div class="terms-accept">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="terms_accept">
                                            <label for="terms_accept">I have read and accept <a
                                                    href="{{ url('/term-condition') }}">Terms &amp;
                                                    Conditions</a></label>
                                        </div>
                                        <span id="terms_error" style="color: red; display: none;">Please accept the terms and conditions before proceeding.</span>
                                    </div>
                                    <!-- /Terms Accept -->

                                    <!-- Submit Section -->
                                    <div class="submit-section mt-4">
                                        <button type="submit" class="btn btn-primary submit-btn">Confirm and Pay
                                        </button>
                                    </div>
                                    <!-- /Submit Section -->

                                </div>

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
                                            <input type="hidden" id="selectedDateTimeInput" name="selectedDateTime">
                                            <li>Date <span id="selectedDate">{{ session('date', 'N/A') }}</span>
                                            </li>
                                            <li>Time <span id="selectedTime">{{ session('time', 'N/A') }}</span>
                                            </li>
                                        </ul>
                                        <ul class="booking-fee">
                                            <input type="hidden" id="amount" name="amount"
                                                   value="{{!empty($doctor->fee) ? $doctor->fee : 0}}">
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
            </form>

        </div>

    </div>
    <!-- /Page Content -->
@endsection

@section('script')
    <script type="text/javascript">
        // Preview Image
        function previewImage(event) {
            if (event.target.files && event.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function () {
                    var output = document.getElementById('preview');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            } else {
                console.log('No files selected');
            }
        }

        // Check if terms are accepted before form submission
        document.querySelector('form').addEventListener('submit', function (event) {
            var termsAccepted = document.getElementById('terms_accept').checked;
            var termsError = document.getElementById('terms_error');
            if (!termsAccepted) {
                event.preventDefault();
                termsError.style.display = 'block';
            } else {
                termsError.style.display = 'none';
            }

            // Combine date and time into a single datetime string
            var selectedDate = document.getElementById('selectedDate').innerText;
            var selectedTime = document.getElementById('selectedTime').innerText;
            var selectedDateTime = selectedDate + ' ' + selectedTime;
            document.getElementById('selectedDateTimeInput').value = selectedDateTime;
        });
    </script>
@endsection

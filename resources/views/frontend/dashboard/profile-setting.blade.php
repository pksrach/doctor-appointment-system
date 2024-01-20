@extends('frontend.dashboard.master')
@section('content-dashboard')
    @php
        $locations = $data['locations'];

        // User fields
        $user = $data['user']; // user entity
        $email = $user->email ?? '';

        // Customer fields
        $attachment = $customer->attachment ?? asset('assets/img/profile.png');
        $firstName = $customer->firstname ?? '';
        $lastName = $customer->lastname ?? '';
        $phone = $customer->phone ?? '';
        $dob = $customer->dob ?? '';
        $gender = $customer->gender ?? 0;

        Log::info('user in profile=>' . $user);
    @endphp

    <div class="card">
        <div class="card-body">

            <!-- Profile Settings Form -->
            <form action="/profile-update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ $attachment }}" alt="User Image">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Profile</span>
                                        <input type="file" class="upload" name="attachment">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>First Name</label><label style="color: red">*</label>
                            <input type="text" name="firstname" class="form-control" value="{{ $firstName }}"
                                required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ $lastName }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control datetimepicker"
                                value="{{ $dob }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option value="{{ App\Models\Gender::OTHER }}"
                                    {{ $gender == App\Models\Gender::OTHER ? 'selected' : '' }}>Other</option>
                                <option value="{{ App\Models\Gender::MALE }}"
                                    {{ $gender == App\Models\Gender::MALE ? 'selected' : '' }}>Male</option>
                                <option value="{{ App\Models\Gender::FEMALE }}"
                                    {{ $gender == App\Models\Gender::FEMALE ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Email</label><label style="color: red">*</label>
                            <input type="email" class="form-control" value="{{ $email }}" required disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Mobile</label><label style="color: red">*</label>
                            <input type="text" name="phone" value="{{ $phone }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Location</label>
                            <select class="form-control" name="location_id">
                                <option value="">Select Location</option>
                                @foreach ($locations as $location)
                                    @if ($customer && $customer->location_id == $location->id)
                                        <option value="{{ $customer->location_id }}" selected>
                                            {{ $location->name }}
                                        </option>
                                    @else
                                        <option value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </div>
            </form>
            <!-- /Profile Settings Form -->

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('form').on('submit', function(event) {
                event.preventDefault();

                // Clear previous alerts
                $('.alert').remove();

                // Your AJAX call here
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function() {
                        // On success, show a Bootstrap success alert
                        $('.submit-section').prepend(
                            '<div class="alert alert-success" role="alert">Save successful!</div>'
                        );
                    },
                    error: function() {
                        // On error, show a Bootstrap error alert
                        $('.submit-section').prepend(
                            '<div class="alert alert-danger" role="alert">Save failed!</div>'
                        );
                    }
                });
            });
        });
    </script>
@endsection

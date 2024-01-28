@extends('frontend.dashboard.master')
@section('content-dashboard')
    @php
        $locations = $data['locations'];

        // User fields
        $user = $data['user']; // user entity
        $email = $user->email ?? '';

        // Customer fields
        $attachmentPath = $customer->attachment ?? asset('assets/img/profile.png');
        $attachment = asset('uploads/' . $attachmentPath);
        $firstName = $customer->firstname ?? '';
        $lastName = $customer->lastname ?? '';
        $phone = $customer->phone ?? '';
        $dob = $customer->dob ?? '';
        $gender = $customer->gender ?? 0;
    @endphp

    <div class="card">
        <div class="card-body">
            <!-- Profile Settings Form -->
            <form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ $attachment }}" alt="User Image" id="imagePreview">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Profile</span>
                                        <input type="file" id="attachment" name="attachment" class="upload"
                                            onchange="previewImage(this)">
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
        function previewImage(input) {
            var preview = document.getElementById('imagePreview');
            preview.innerHTML = ''; // Clear previous preview

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var image = new Image();
                    image.src = e.target.result;
                    image.style.maxWidth = '100%'; // Ensure image fits container width
                    preview.appendChild(image);

                    // Set the uploaded image as the src attribute of the profile image
                    var profileImg = document.querySelector('.profile-img img');
                    if (profileImg) {
                        profileImg.src = e.target.result;
                    }
                };

                reader.readAsDataURL(input.files[0]); // Read the selected file as a data URL
            }
        }

        $(document).ready(function() {
            $('form').on('submit', function(event) {
                event.preventDefault();

                // Clear previous alerts
                $('.alert').remove();

                // Your AJAX call here
                var form = $('form')[0]; // You need to use standard javascript object here
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    contentType: false,

                    success: function(res) {
                        // On success, show a Bootstrap success alert
                        $('.submit-section').prepend(
                            '<div class="alert alert-success" role="alert">Save successful!</div>'
                        );
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // On error, show a Bootstrap error alert
                        var message = jqXHR.responseJSON.message;
                        $('.submit-section').prepend(
                            '<div class="alert alert-danger" role="alert">' + message +
                            '</div>'
                        );
                    }
                    /* error: function() {
                        // On error, show a Bootstrap error alert
                        $('.submit-section').prepend(
                            '<div class="alert alert-danger" role="alert">Save failed!</div>'
                        );
                    } */
                });
            });
        });
    </script>
@endsection

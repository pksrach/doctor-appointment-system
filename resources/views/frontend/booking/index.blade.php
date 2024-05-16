@extends('frontend.layouts.master')
@section('style')
    <style>
        .current-date {
            background-color: yellow; /* Change this to your preferred color */
        }

        .timing {
            margin: 10px; /* Adjust this value as needed */
        }
    </style>
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Booking</h2>
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

                    <div class="card">
                        <div class="card-body">
                            <div class="booking-doc-info">
                                <a href="{{ url('/doctor-profile') }}" class="booking-doc-img">
                                    <img
                                        src="{{asset($doctor->attchment ? 'uploads/'.$doctor->attchment : 'doctor_default.png')}}"
                                        alt="{{$doctor->name}}">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="{{ url('/doctor-profile') }}">{{$doctor->name}}</a></h4>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{$doctor->address}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule Widget -->
                    <div class="card booking-schedule schedule-widget">

                        <!-- Schedule Header -->
                        <div class="schedule-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Day Slot -->
                                    <div class="day-slot">
                                        <ul>
                                            <li class="left-arrow">
                                                <a href="#">
                                                    <i class="fa fa-chevron-left"></i>
                                                </a>
                                            </li>
                                            @php
                                                $date = \Carbon\Carbon::now('Asia/Phnom_Penh'); // Replace 'Asia/Phnom_Penh' with your local timezone
                                                $today = \Carbon\Carbon::now('Asia/Phnom_Penh')->startOfDay();
                                            @endphp
                                            @for($i = 0; $i < 7; $i++)
                                                <li>
                                                    <span>{{ $date->format('D') }}</span>
                                                    <span
                                                        class="slot-date {{ $date->startOfDay()->equalTo($today) ? 'current-date' : '' }}">
                                                        {{ $date->format('d M y') }}
                                                    </span>
                                                </li>
                                                @php
                                                    $date->add(new DateInterval('P1D')); // Add 1 day
                                                @endphp
                                            @endfor
                                            <li class="right-arrow">
                                                <a href="#">
                                                    <i class="fa fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /Day Slot -->
                                </div>
                            </div>
                        </div>
                        <!-- /Schedule Header -->

                        <!-- Schedule Content -->
                        <div class="schedule-cont">
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- Time Slot -->
                                    <div class="time-slot">
                                        <ul class="clearfix">
                                            <!-- Time Slot -->
                                        </ul>
                                    </div>
                                    <!-- /Time Slot -->
                                </div>
                            </div>
                        </div>
                        <!-- /Schedule Content -->

                    </div>
                    <!-- /Schedule Widget -->

                    <!-- Submit Section -->
                    <div class="submit-section proceed-btn text-right">
                        <a href="{{ route('checkout', ['id' => request()->route('id')]) }}" class="btn btn-primary submit-btn">Proceed to Pay</a>
                    </div>
                    <!-- /Submit Section -->

                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection

@section('script')
    <script>
        var currentDate = new Date(); // Start with the current date

        function formatDate(date) {
            var day = date.getDate();
            var monthIndex = date.getMonth();
            var year = date.getFullYear();

            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            return day + ' ' + months[monthIndex] + ' ' + year.toString().substr(-2);
        }

        function updateDateDisplay() {
            // Get the date elements
            var dateElements = document.querySelectorAll('.slot-date');

            // Get today's date
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            // Loop over the date elements
            for (var i = 0; i < dateElements.length; i++) {
                // Create a new date based on the current date
                var newDate = new Date(currentDate.getTime() + i * 24 * 60 * 60 * 1000);
                newDate.setHours(0, 0, 0, 0);

                // Format the new date
                var dateString = formatDate(newDate);

                // Update the text content of the date element
                dateElements[i].textContent = dateString;

                // Create a unique ID for the date element
                var dateId = newDate.toISOString().replace(/[^0-9]/g, '');
                dateElements[i].id = dateId;

                // Highlight the current date
                if (+newDate === +today) {
                    dateElements[i].classList.add('current-date');
                } else {
                    dateElements[i].classList.remove('current-date');
                }
            }
        }

        // Function to update the IDs of the time slots
        function updateTimeSlotIds() {
            // Get the day slots
            var daySlots = document.querySelectorAll('.slot-date');

            // Loop over each day slot
            daySlots.forEach(function(daySlot, i) {
                // Get the time slots for this day slot
                var timeSlots = document.querySelectorAll('.timing');

                // Loop over each time slot and update its ID
                timeSlots.forEach(function(timeSlot, j) {
                    // Set the ID based on the day slot and the time slot
                    timeSlot.id = 'slot-' + i + '-' + j;
                });
            });
        }

        // Right arrow click event listener
        document.querySelector('.right-arrow a').addEventListener('click', function (event) {
            event.preventDefault();
            currentDate.setDate(currentDate.getDate() + 7); // Add 7 days
            updateDateDisplay();

            // Update the IDs of the time slots
            updateTimeSlotIds();
        });

        // Left arrow click event listener
        document.querySelector('.left-arrow a').addEventListener('click', function (event) {
            event.preventDefault();
            currentDate.setDate(currentDate.getDate() - 7); // Subtract 7 days
            updateDateDisplay();

            // Update the IDs of the time slots
            updateTimeSlotIds();
        });

        // The time display
        var timeSlots = document.querySelector('.clearfix');

        // Get the current date
        var currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0);

        // Define the times
        var times = ['08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM'];

        for (var i = 0; i < 7; i++) {
            var li = document.createElement('li');

            times.forEach(function (time) {
                var a = document.createElement('a');
                a.className = 'timing';
                a.href = '#';
                a.dataset.time = time;

                // Create a new date object based on the current date
                var slotDate = new Date(currentDate.getTime() + i * 24 * 60 * 60 * 1000);

                // Split the time into hours, minutes, and the AM/PM part
                var timeParts = time.split(' ');
                var hoursMinutes = timeParts[0].split(':');
                var amPm = timeParts[1];

                // Convert the hours to 24-hour format
                var hours = parseInt(hoursMinutes[0]);
                if (amPm === 'PM' && hours !== 12) {
                    hours += 12;
                } else if (amPm === 'AM' && hours === 12) {
                    hours = 0;
                }

                // Set the hours and minutes of the date object
                slotDate.setHours(hours, parseInt(hoursMinutes[1]));

                // Format the date and time into a string and use it as the ID
                var slotId = 'slot-' + slotDate.toISOString().replace(/[^0-9]/g, '');
                a.id = slotId;

                var span = document.createElement('span');
                span.textContent = time;

                a.appendChild(span);
                li.appendChild(a);

                // Add event listener to the time slot
                a.addEventListener('click', function (event) {
                    event.preventDefault();

                    var selectedTime = this.getAttribute('data-time');
                    var selectedDate = new Date(currentDate.getTime()); // Create a new date object based on the current date

                    // Set the hours and minutes of the new date object based on the selected time
                    selectedDate.setHours(selectedTime.split(':')[0], selectedTime.split(':')[1]);

                    if (selectedDate < new Date()) {
                        alert('You cannot select a time in the past.');
                    } else {
                        // The time is not in the past, so you can proceed with your logic here.
                        // For example, you can add the 'selected' class to the selected time slot:
                        document.querySelectorAll('.timing').forEach(function (timing) {
                            timing.classList.remove('selected');
                        });
                        this.classList.add('selected');
                    }
                });
            });

            timeSlots.appendChild(li);
        }

        // Console log choosing time slot
        document.querySelectorAll('.timing').forEach(function (timing, index) {
            timing.addEventListener('click', function () {
                this.dataset.date = currentDate.toISOString().split('T')[0];
                console.log('You have chosen the time slot: ' + this.dataset.time);

                // Get the parent li element
                var parentLi = this.parentElement;

                // Get the day slots
                var daySlots = document.querySelectorAll('.slot-date');

                // Loop over each day slot
                daySlots.forEach(function(daySlot, dayIndex) {
                    // Get the time slots for this day slot
                    var timeSlots = daySlot.querySelectorAll('.timing');

                    // Loop over each time slot and assign the event listener
                    timeSlots.forEach(function(timeSlot) {
                        timeSlot.addEventListener('click', function () {
                            this.dataset.date = currentDate.toISOString().split('T')[0];
                            console.log('You have chosen the time slot: ' + this.dataset.time);

                            // Get the corresponding day slot based on the index of the clicked time slot
                            var daySlot = daySlots[dayIndex].textContent;

                            console.log('The day slot is: ' + daySlot);

                            // Store the selected date and time
                            var selectedDate = this.dataset.date;
                            var selectedTime = this.dataset.time;

                            // Store the selected date and time in the session
                            $.ajax({
                                url: '/store-session',
                                method: 'POST',
                                data: {
                                    date: selectedDate,
                                    time: selectedTime,
                                    _token: '{{ csrf_token() }}' // Add this line to include the CSRF token in the request
                                },
                                success: function(response) {
                                    console.log(response);
                                }
                            });
                        });
                    });
                });
            });
        });
    </script>
    {{--<script>
        var currentDate = new Date(); // Start with the current date

        function formatDate(date) {
            var day = date.getDate();
            var monthIndex = date.getMonth();
            var year = date.getFullYear();

            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            return day + ' ' + months[monthIndex] + ' ' + year.toString().substr(-2);
        }

        function updateDateDisplay() {
            // Get the date elements
            var dateElements = document.querySelectorAll('.slot-date');

            // Get today's date
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            // Loop over the date elements
            for (var i = 0; i < dateElements.length; i++) {
                // Create a new date based on the current date
                var newDate = new Date(currentDate.getTime() + i * 24 * 60 * 60 * 1000);
                newDate.setHours(0, 0, 0, 0);

                // Format the new date
                var dateString = formatDate(newDate);

                // Update the text content of the date element
                dateElements[i].textContent = dateString;

                // Create a unique ID for the date element
                var dateId = newDate.toISOString().replace(/[^0-9]/g, '');
                dateElements[i].id = dateId;

                // Highlight the current date
                if (+newDate === +today) {
                    dateElements[i].classList.add('current-date');
                } else {
                    dateElements[i].classList.remove('current-date');
                }
            }
        }

        document.querySelector('.right-arrow a').addEventListener('click', function (event) {
            event.preventDefault();
            currentDate.setDate(currentDate.getDate() + 7); // Add 7 days
            updateDateDisplay();
        });

        document.querySelector('.left-arrow a').addEventListener('click', function (event) {
            event.preventDefault();
            currentDate.setDate(currentDate.getDate() - 7); // Subtract 7 days
            updateDateDisplay();
        });
    </script>

    <script>
        // The time display
        var timeSlots = document.querySelector('.clearfix');

        // Get the current date
        var currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0);

        // Define the times
        var times = ['08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM'];

        for (var i = 0; i < 7; i++) {
            var li = document.createElement('li');

            times.forEach(function (time) {
                var a = document.createElement('a');
                a.className = 'timing';
                a.href = '#';
                a.dataset.time = time;

                // Create a new date object based on the current date
                var slotDate = new Date(currentDate.getTime() + i * 24 * 60 * 60 * 1000);

                // Split the time into hours, minutes, and the AM/PM part
                var timeParts = time.split(' ');
                var hoursMinutes = timeParts[0].split(':');
                var amPm = timeParts[1];

                // Convert the hours to 24-hour format
                var hours = parseInt(hoursMinutes[0]);
                if (amPm === 'PM' && hours !== 12) {
                    hours += 12;
                } else if (amPm === 'AM' && hours === 12) {
                    hours = 0;
                }

                // Set the hours and minutes of the date object
                slotDate.setHours(hours, parseInt(hoursMinutes[1]));

                // Format the date and time into a string and use it as the ID
                var slotId = 'slot-' + slotDate.toISOString().replace(/[^0-9]/g, '');
                a.id = slotId;

                var span = document.createElement('span');
                span.textContent = time;

                a.appendChild(span);
                li.appendChild(a);

                // Add event listener to the time slot
                a.addEventListener('click', function (event) {
                    event.preventDefault();

                    var selectedTime = this.getAttribute('data-time');
                    var selectedDate = new Date(currentDate.getTime()); // Create a new date object based on the current date

                    // Set the hours and minutes of the new date object based on the selected time
                    selectedDate.setHours(selectedTime.split(':')[0], selectedTime.split(':')[1]);

                    if (selectedDate < new Date()) {
                        alert('You cannot select a time in the past.');
                    } else {
                        // The time is not in the past, so you can proceed with your logic here.
                        // For example, you can add the 'selected' class to the selected time slot:
                        document.querySelectorAll('.timing').forEach(function (timing) {
                            timing.classList.remove('selected');
                        });
                        this.classList.add('selected');
                    }
                });
            });

            timeSlots.appendChild(li);
        }

        // Console log choosing time slot
        document.querySelectorAll('.timing').forEach(function (timing) {
            timing.addEventListener('click', function () {
                this.dataset.date = currentDate.toISOString().split('T')[0];
                console.log('You have chosen the time slot: ' + this.dataset.time);

            });
        });
    </script>--}}
@endsection

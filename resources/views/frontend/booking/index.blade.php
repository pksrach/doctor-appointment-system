@extends('frontend.layouts.master')
@section('style')
    <style>
        .current-date {
            background-color: yellow;
        }

        .timing {
            margin: 10px;
            color: #f0f0f0;
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
                        <a href="{{ route('checkout', ['id' => request()->route('id')]) }}"
                           class="btn btn-primary submit-btn">Proceed to Pay</a>
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
        var days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT']; // Define the days

        function formatDate(date) {
            var day = date.getDate();
            var monthIndex = date.getMonth();
            var year = date.getFullYear();

            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            return day + ' ' + months[monthIndex] + ' ' + year.toString().substr(-2);
        }

        function updateDateDisplay() {
            var dateElements = document.querySelectorAll('.slot-date');
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            for (var i = 0; i < dateElements.length; i++) {
                var newDate = new Date(currentDate.getTime() + i * 24 * 60 * 60 * 1000);
                newDate.setHours(0, 0, 0, 0);

                var dateString = formatDate(newDate);
                dateElements[i].textContent = dateString;

                var dateId = newDate.toISOString().replace(/[^0-9]/g, '');
                dateElements[i].id = dateId;

                if (+newDate === +today) {
                    dateElements[i].classList.add('current-date');
                } else {
                    dateElements[i].classList.remove('current-date');
                }

                // Update the data-day and data-date attributes for each time slot
                var timeSlotsForDay = document.querySelectorAll('.timing[data-date="' + dateElements[i].dataset.date + '"]');
                timeSlotsForDay.forEach(function (timeSlot) {
                    timeSlot.dataset.day = days[newDate.getDay()];
                    timeSlot.dataset.date = newDate.toISOString().split('T')[0];
                });
            }
        }

        function createTimeSlots() {
            var timeSlots = document.querySelector('.clearfix');
            timeSlots.innerHTML = '';
            var times = ['08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM'];

            for (var i = 0; i < 7; i++) {
                var li = document.createElement('li');

                times.forEach(function (time) {
                    var a = document.createElement('a');
                    a.className = 'timing';
                    a.href = '#';
                    a.dataset.time = time;

                    var slotDate = new Date(currentDate.getTime() + i * 24 * 60 * 60 * 1000);
                    a.dataset.day = days[slotDate.getDay()]; // Set the data-day attribute to the day of the week

                    // Set the data-date attribute to the date
                    var options = {timeZone: 'Asia/Phnom_Penh', year: 'numeric', month: '2-digit', day: '2-digit'};
                    a.dataset.date = slotDate.toLocaleString('en-GB', options).split('/').reverse().join('-');

                    var timeParts = time.split(' ');
                    var hoursMinutes = timeParts[0].split(':');
                    var amPm = timeParts[1];

                    var hours = parseInt(hoursMinutes[0]);
                    if (amPm === 'PM' && hours !== 12) {
                        hours += 12;
                    } else if (amPm === 'AM' && hours === 12) {
                        hours = 0;
                    }

                    slotDate.setHours(hours, parseInt(hoursMinutes[1]));

                    var slotId = 'slot-' + slotDate.toISOString().replace(/[^0-9]/g, '');
                    a.id = slotId;

                    var span = document.createElement('span');
                    span.textContent = time;

                    a.appendChild(span);
                    li.appendChild(a);

                    a.addEventListener('click', function (event) {
                        event.preventDefault();

                        var selectedTime = this.getAttribute('data-time');
                        var selectedDate = this.getAttribute('data-date'); // Retrieve the date

                        console.log('You have chosen the time slot: ' + selectedTime + ' on date: ' + selectedDate);

                        // Remove the class, styles, and icon from all time slots
                        document.querySelectorAll('.timing').forEach(function (timing) {
                            timing.classList.remove('selected');
                        });

                        // Add the class, styles, and icon to the clicked time slot
                        this.classList.add('selected');

                        // Store the selected time and date in a session
                        fetch('/store-session', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                // Add the CSRF token to the request header
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                time: selectedTime,
                                date: selectedDate
                            })
                        })
                            .then(response => response.json())
                            .then(data => console.log(data))
                            .catch((error) => {
                                console.error('Error:', error);
                            });
                    });
                });

                timeSlots.appendChild(li);
            }
        }

        createTimeSlots();

        // Call this function every time the day changes
        document.querySelector('.right-arrow a').addEventListener('click', function (event) {
            event.preventDefault();
            currentDate.setDate(currentDate.getDate() + 7);
            updateDateDisplay();
            createTimeSlots();
        });

        document.querySelector('.left-arrow a').addEventListener('click', function (event) {
            event.preventDefault();
            currentDate.setDate(currentDate.getDate() - 7);
            updateDateDisplay();
            createTimeSlots();
        });
    </script>
@endsection

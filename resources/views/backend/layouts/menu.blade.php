<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{route('backend.dashboard')}}" class="logo">
            <img src="{{asset('admin/assets/img/logo.png')}}" alt="Logo">
        </a>
        <a href="{{route('backend.dashboard')}}" class="logo logo-small">
            <img src="{{asset('admin/assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">

        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle"
                         src="{{asset('no_image_person.png')}}"
                         width="31" alt="">
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{asset('no_image_person.png')}}" alt="User Image"
                             class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{Auth::user()->email}}</h6>
                        <p class="text-muted mb-0">{{ ucfirst(Auth::user()->role) }}</p>
                    </div>
                </div>
                <a class="dropdown-item" href="#">My Profile</a>
                <form action="{{route('backend.logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>

                {{--Dashboard--}}
                <li class="{{Request::is('backend/dashboard') ? 'active' : ''}}">
                    <a href="{{route('backend.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                {{--Appointment--}}
                <li {{Request::is('backend/appointment') ? 'active' : ''}}>
                    <a href="{{route('backend.appointment')}}"><i class="fe fe-layout"></i>
                        <span>Appointments</span></a>
                </li>

                {{--Doctor--}}
                <li class="{{Request::is('backend/doctor') ? 'active' : ''}}">
                    <a href="{{url('backend/doctor')}}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>

                {{--Patient--}}
                <li class="{{Request::is('backend/patient') ? 'active' : ''}}">
                    <a href="{{route('backend.patient')}}"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>

                {{--Transaction--}}
                <li {{Request::is('backend/transaction') ? 'active' : ''}}>
                    <a href="#"><i class="fe fe-activity"></i> <span>Transactions</span></a>
                </li>

                {{--Report--}}
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li {{Request::is('backend/report/invoice') ? 'active' : ''}}>
                            <a href="#">Invoice Reports</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

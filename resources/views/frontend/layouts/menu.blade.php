<div class="main-menu-wrapper">
    <div class="menu-header">
        <a href="{{ url('/') }}" class="menu-logo">
            <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
        </a>
        <a id="menu_close" class="menu-close" href="javascript:void(0);">
            <i class="fas fa-times"></i>
        </a>
    </div>
    <ul class="main-nav">
        <li {{-- class="active" --}}>
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li>
            <a href="{{ url('/doctor') }}">Doctors</a>
        </li>
        <li>
            <a href="{{ url('/contact-us') }}">Contact Us</a>
        </li>
        <li>
            <a href="{{ url('/about-us') }}">About Us</a>
        </li>
    </ul>
</div>

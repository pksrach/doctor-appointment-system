<!-- Footer -->
<footer class="footer">

    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <img src="{{ asset('assets/img/footer-logo.png') }}" alt="logo">
                        </div>
                        <div class="footer-about-content">
                            <p>Your privacy is our priority. Read our [Privacy Policy] and learn about our security
                                measures. </p>
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">
                    {{-- Tuk oy nv blank --}}
                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">For Patients</h2>
                        <ul>
                            <li><a href="{{ url('/doctor') }}"><i class="fas fa-angle-double-right"></i> Search for
                                    Doctors</a></li>
                            <li><a href="{{ url('/auth/login') }}"><i class="fas fa-angle-double-right"></i> Login</a>
                            </li>
                            <li><a href="{{ url('/auth/register') }}"><i class="fas fa-angle-double-right"></i>
                                    Register</a>
                            </li>
                            <li><a href="{{ url('/booking') }}"><i class="fas fa-angle-double-right"></i> Booking</a>
                            </li>
                            <li><a href="{{ url('/patient-dashboard') }}"><i class="fas fa-angle-double-right"></i>
                                    Patient Dashboard</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title"><a href="{{ url('/contact-us') }}" style="color: white">Contact Us</a></h2>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <p> No. 86A, Street 110, Russian Federation Boulevard,
                                    Sangkat Teuk Laak I, Khan Toul Kork, Phnom Penh, Cambodia </p>
                            </div>
                            <p>
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:+855 886963482" style="color: white">+855 886963482</a>
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:doctor.support@gmail.com" style="color: white">doctor.support@gmail.com</a>
                            </p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">

            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="copyright-text">
                            <p class="mb-0"><a href="{{ url('/') }}">Apex Clinic</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">

                        <!-- Copyright Menu -->
                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="{{ url('/term-condition') }}">Terms and Conditions</a></li>
                                <li><a href="{{ url('/privacy-policy') }}">Policy</a></li>
                            </ul>
                        </div>
                        <!-- /Copyright Menu -->

                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

</footer>
<!-- /Footer -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Slick JS -->
<script src="{{ asset('assets/js/slick.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>

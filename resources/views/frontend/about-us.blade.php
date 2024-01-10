@extends('frontend.layouts.master')
@section('style')
    <style>
        .img-border {
            margin: 30px auto;
            border-radius: 20px;
            border: 1px solid #000;
            display: block;
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
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">About Apex Clinic</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    {{-- Contain --}}
    <div class="top-content container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h4 class="mt-5 text-info text-bold">Our Vision & Mission</h4>
                <hr />
            </div>
        </div>
        <div class="row custom-card pt-4 mb-5">
            <div class="col-lg-12 col-md-12 col-12">
                <p>Welcome to Apex Clinic, where your health takes center stage. We are a premier healthcare facility
                    committed
                    to delivering unparalleled medical services with a focus on innovation, patient-centered care, and
                    continuous improvement.</p>
                <img src="https://img.freepik.com/free-photo/business-meeting_1098-18221.jpg?w=996&t=st=1704910612~exp=1704911212~hmac=15d1050f17ee090c61bec3c9525a2f82d7daa7f34f82e12865df11b7856a44f3"
                    alt="" class="img-fluid img-border" />
                <h4>Our State-of-the-Art Facility</h4>
                <p>Discover a welcoming and modern environment designed to provide comfort and convenience. Our cutting-edge
                    facility is equipped with the latest medical technologies to ensure accurate diagnostics and effective
                    treatments.</p>

                <h4>Our Dedicated Team</h4>
                <p>Meet our team of skilled healthcare professionals who embody the core values of Apex Clinic. Our doctors,
                    nurses, and support staff are committed to providing personalized and compassionate care, making your
                    healthcare journey a positive and uplifting experience.</p>
                <img src="https://img.freepik.com/free-photo/asian-female-physician-consulting-woman-office_1098-20395.jpg?w=996&t=st=1704910273~exp=1704910873~hmac=0f9e85ddaf1e64f1da95e0b569d200ff4a70ef2f76da398064edc645a1e9dbe7"
                    alt="" class="img-fluid img-border" />

                <h4>Our Vision</h4>
                <p>At Apex Clinic, we aspire to be the hallmark of excellence in healthcare. Our vision is to set new
                    standards
                    in patient-centric, innovative, and comprehensive medical services. We envision a community where health
                    is
                    a shared priority, contributing to a healthier and happier society.</p>

                <h4>Patient-Centered Care</h4>
                <p>We believe in the uniqueness of each individual. Our team takes the time to understand your needs,
                    concerns,
                    and aspirations, crafting personalized care plans that align with your specific health goals.</p>

                <h4>Embracing Innovation and Technology</h4>
                <p>Innovation is at the heart of Apex Clinic. We invest in cutting-edge technology and stay abreast of the
                    latest medical advancements to offer you the most effective and efficient healthcare solutions.</p>
                <img src="https://img.freepik.com/free-photo/serious-asia-male-doctor-wear-protective-mask-using-tablet-is-delivering-great-news-talk-discuss-results_7861-3124.jpg?w=1060&t=st=1704910160~exp=1704910760~hmac=c95d22d8e1028e8f158715f0f2ddab1fbfb9cf45dd933ee37b33fb6dde4f84e2"
                    alt="" class="img-fluid img-border" />
                <h4>Fostering a Culture of Continuous Improvement</h4>
                <p>To provide the best care, we prioritize ongoing learning and development. Our team engages in regular
                    training, stays updated on medical research, and collaborates to bring you the latest and most effective
                    healthcare practices.</p>

                <p>Discover the Apex Clinic difference - where your well-being is our priority, and every step we take is a
                    step
                    towards a healthier, happier life. Join us on this journey towards optimal health.</p>

                <p>For appointments and inquiries, contact us at <a
                        href="mailto: doctor.support@gmail.com">contact@apexclinic.com</a> or call <a
                        href="tel:+855 886963482">+855 886963482</a>.</p>
            </div>
        </div>
    </div>

    {{-- End of Contain --}}
@endsection

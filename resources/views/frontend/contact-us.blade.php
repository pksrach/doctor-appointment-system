@extends('frontend.layouts.master')
@section('content')
<style>
        /* Add your custom styles here */
        .responsive-map{
            overflow: hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
            }
            .responsive-map iframe{
            left:0;
            top:0;
            height:100%;
            width: 100%;
            position:absolute;
        }
    </style>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Contact Us</h2>


                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    {{-- Contain --}}
    <div class="container mt-6">
        <div id="photoCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="border-radius: 0 0 10px 10px">
                <div class="carousel-item active">
                    <img src="https://plus.unsplash.com/premium_photo-1681995277879-42e0d91897e0?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Njl8fGhvc3BpdGFsfGVufDB8fDB8fHww" class="d-block w-100" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1613377512409-59c33c10c821?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzJ8fGhvc3BpdGFsfGVufDB8fDB8fHww" class="d-block w-100" alt="Image 2">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzB8fGhvc3BpdGFsfGVufDB8fDB8fHww" class="d-block w-100" alt="Image 3">
                </div>
                <!-- Add more carousel items as needed -->
            </div>
            <a class="carousel-control-prev" href="#photoCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#photoCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br/>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Form Section -->
                <h2>Contact Us</h2>
                <form>
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label for="text">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-bottom:30px;">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Company Information Section -->
                <h2>Company Information</h2>
                <p>
                    APEX CLINIC<br>
                    No. 86A, Street 110, Russian Federation Boulevard,<br> Sangkat Teuk Laak I, Khan Toul Kork, Phnom Penh, Cambodia.
                    <br>Tel : +855 19 545 545 / +855 454 454
                </p>

                <!-- Google Map Section -->
                <div class="responsive-map" style="margin-bottom: 30px;">
                    <!-- <iframe src="https://maps.app.goo.gl/aGGHnJAqfLUTJuwM6" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15635.09413627128!2d104.8947315!3d11.5680861!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095173761d4a53%3A0xcd09ff2f4d326e3f!2sSETEC%20Institute!5e0!3m2!1sen!2skh!4v1705493849589!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <br/>

    {{-- End of Contain --}}
@endsection

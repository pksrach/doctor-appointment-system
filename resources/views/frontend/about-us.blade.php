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
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">About Us</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    {{-- Contain --}}
    <h1 style="padding: 50px 20px">Contain here</h1>
    {{-- End of Contain --}}
@endsection

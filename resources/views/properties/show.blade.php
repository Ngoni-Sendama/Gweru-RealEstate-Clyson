@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Property List</h1>
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Property List</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="{{ asset('storage/' . $house->image) }}" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->


    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ $house->name }}</h1>
                        <span class="color-text-a">{{ $house->location }}</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('welcome')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('properties')}}">Properties</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $house->name }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel header-carousel">
                        @foreach ($house->additional_image_link as $image)
                            <div class="owl-carousel-item">
                                <img class="img-fluid" src="{{ asset('storage/' . $image) }}" alt=""
                                    style="width: 100%; height: 500px;">
                            </div>
                        @endforeach
                    </div>
                    <div class="property-single-carousel-pagination carousel-pagination"></div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-12 container">

                    <div class="row justify-content-between">
                        <div class="col-12">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-title-c align-self-center">
                                    <h5 class="text-primary mb-3">${{ number_format($house->price_per_month) }}</h5>
                                </div>
                            </div>
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">Quick Summary</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>Property ID:</strong>
                                            <span>ABS{{ $house->id }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Location:</strong>
                                            <span>{{ $house->location }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Property Type:</strong>
                                            <span>{{ $house->category->name }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Status:</strong>
                                            <span>Sale</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Area:</strong>
                                            <span>{{ $house->area }}
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Beds:</strong>
                                            <span>{{ $house->number_of_bedrooms }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Baths:</strong>
                                            <span>{{ $house->number_of_bathrooms }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Property Description</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                <p class="description color-text-a">
                                    {{ $house->description }}
                                </p>
                            </div>


                        </div>
                    </div>
                </div>
                <div>
                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <div class="title-box-d">
                                <h3 class="title-d">Amenities</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            @if ($house->solar_system == true)
                                <h6><i class="fa fa-check text-primary" aria-hidden="true"></i> Solar System</h6>
                            @endif
                        </div>
                        <div class="col-12 col-md-3">

                            @if ($house->cctv_available == true)
                                <h6><i class="fa fa-check text-primary" aria-hidden="true"></i> CCTV</h6>
                            @endif
                        </div>
                        <div class="col-12 col-md-3">
                            @if ($house->borehole_available == true)
                                <h6><i class="fa fa-check text-primary" aria-hidden="true"></i> Borehole</h6>
                            @endif
                        </div>
                        <div class="col-12 col-md-3">
                            @if ($house->parking_available == true)
                                <h6><i class="fa fa-check text-primary" aria-hidden="true"></i> Parking</h6>
                            @endif
                        </div>
                        <div class="col-12 col-md-3">
                            @if ($house->internet_connection == true)
                                <h6><i class="fa fa-check text-primary" aria-hidden="true"></i> Internet Connection</h6>
                            @endif
                        </div>
                        <div class="col-12 col-md-3">
                            @if ($house->fridge == true)
                                <h6><i class="fa fa-check text-primary" aria-hidden="true"></i> Fridge</h6>
                            @endif
                        </div>
                        <div class="col-12 col-md-3">
                            @if ($house->swimming_pool == true)
                                <h6><i class="fa fa-check text-primary" aria-hidden="true"></i> Swimming Pool</h6>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 mt-5">
                    <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                        {{-- <li class="nav-item">
                            <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video"
                                role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
                        </li> --}}
                        @if (!empty($house->floor_plan))
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-plans-tab" data-bs-toggle="pill"
                                    href="#pills-plans" role="tab" aria-controls="pills-plans"
                                    aria-selected="false">Floor Plans</a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        {{-- <div class="tab-pane fade show active" id="pills-video" role="tabpanel"
                            aria-labelledby="pills-video-tab">
                            <iframe src="{{ asset('storage/' . $house->video) }}" width="100%" height="460"
                                frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div> --}}
                        @if (!empty($house->floor_plan))
                            <div class="tab-pane fade show active" id="pills-plans" role="tabpanel"
                                aria-labelledby="pills-plans-tab">
                                <img src="{{ asset('storage/' . $house->floor_plan) }}" alt=""
                                    class="img-fluid">
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

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
                <img class="img-fluid" src="{{ asset('real/img/header.jpg') }}" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Search Start -->

    <!-- Search End -->


    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Property Listing</h1>
                        <p>Check out our Latest Properties</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($houses as $house)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('houses.show', $house->slug) }}"><img class="img-fluid"
                                                src="{{ asset('storage/' . $house->image) }}" alt=""></a>
                                        <div
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            For Sell</div>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            {{ $house->category->name }}</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">${{ number_format($house->price_per_month) }}</h5>

                                        <a class="d-block h5 mb-2"
                                            href="{{ route('houses.show', $house->slug) }}">{{ $house->name }}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $house->location }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-ruler-combined text-primary me-2"></i>{{ $house->area }}
                                            Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-bed text-primary me-2"></i>{{ $house->number_of_bedrooms }}
                                            Bed</small>
                                        <small class="flex-fill text-center py-2"><i
                                                class="fa fa-bath text-primary me-2"></i>{{ $house->number_of_bathrooms }}
                                            Bath</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12 text-center  wow fadeInUp" data-wow-delay="0.1s">
                            <!-- Display your houses here -->
                            <div class="pagination gap-4 align-items-center">
                                {{-- Previous Page Link --}}
                                @if ($houses->onFirstPage())
                                    <span class="btn btn-primary py-1 px-3 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                        &laquo;
                                    </span>
                                @else
                                    <a href="{{ $houses->previousPageUrl() }}" class="btn btn-primary py-1 px-3" rel="prev" aria-label="@lang('pagination.previous')">
                                        &laquo;
                                    </a>
                                @endif
                            
                                {{-- Next Page Link --}}
                                @if ($houses->hasMorePages())
                                    <a href="{{ $houses->nextPageUrl() }}" class="btn btn-primary py-1 px-3" rel="next" aria-label="@lang('pagination.next')">
                                        &raquo;
                                    </a>
                                @else
                                    <span class="btn btn-primary py-1 px-3 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                        &raquo;
                                    </span>
                                @endif
                            
                                {{-- Showing results information --}}
                                <span class="pagination-info">
                                    Showing {{ $houses->firstItem() }} to {{ $houses->lastItem() }} of {{ $houses->total() }} results
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
@endsection

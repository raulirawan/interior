@extends('layouts.front')

@section('title', 'Our Clients - PT. Wahana Cipta Selaras Abudaya')

@section('content')
    <main>
        <!-- slider Area Start-->
        <div class="slider-area ">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('/frontend') }}/assets/img/hero/img-menu.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>Our Client</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Client</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Client Area Start -->
        <section class="client-area  section-padding30">
            <div class="container">
                <div class="client-heading mb-35">
                    <div class="row align-items-end">
                        <div class="col-lg-12">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle3">
                                <div class="front-text">
                                    <h2 class="">Our Clients</h2>
                                </div>
                                <span class="back-text">Client</span>

                                <ul>
                                    @foreach ($clients as $client)
                                        <li class="mb-2">- {{ $client->client }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Client Area End -->
    </main>
@endsection

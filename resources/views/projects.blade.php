@extends('layouts.front')

@section('title', 'Our Projects - PT. Wahana Cipta Selaras Abudaya')

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
                                <h2>Our projects</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Project</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Project Area Start -->
        <section class="project-area  section-padding30">
            <div class="container">
                <div class="project-heading mb-35">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle3">
                                <div class="front-text">
                                    <h2 class="">Our Projects</h2>
                                </div>
                                <span class="back-text">Gellary</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">
                                            Show all </a>
                                        @foreach ($categories as $category)
                                            <a class="nav-item nav-link" id="{{ Str::slug($category->name) }}-tab"
                                                data-toggle="tab" href="#{{ Str::slug($category->name) }}" role="tab"
                                                aria-controls="{{ Str::slug($category->name) }}" aria-selected="false">
                                                {{ $category->name }}</a>
                                        @endforeach

                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content active" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="project-caption">
                                    <div class="row">
                                        @foreach ($projects as $project)
                                            @php
                                                $image = json_decode($project->image);
                                            @endphp
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-project mb-30">
                                                    <div class="project-img">
                                                        <img src="{{ asset('image/projects/' . ($image[0] ?? '')) }}"
                                                            alt="{{ $project->name }}">
                                                    </div>
                                                    <div class="project-cap">
                                                        <a href="{{ route('projectsDetail', [$project->id, $project->slug]) }}"
                                                            class="plus-btn"><i class="ti-plus"></i></a>
                                                        <h4><a
                                                                href="{{ route('projectsDetail', [$project->id, $project->slug]) }}">{{ $project->name }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @foreach ($categories as $category)
                                <div class="tab-pane fade" id="{{ Str::slug($category->name) }}" role="tabpanel"
                                    aria-labelledby="{{ Str::slug($category->name) }}-tab">
                                    <div class="project-caption">
                                        <div class="row">
                                            @foreach ($category->projects as $project)
                                                @php
                                                    $image = json_decode($project->image);
                                                @endphp
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="single-project mb-30">
                                                        <div class="project-img">
                                                            <img src="{{ asset('image/projects/' . ($image[0] ?? '')) }}"
                                                                alt="{{ $project->name }}">
                                                        </div>
                                                        <div class="project-cap">
                                                            <a href="{{ route('projectsDetail', [$project->id, $project->slug]) }}"
                                                                class="plus-btn"><i class="ti-plus"></i></a>
                                                            <h4><a
                                                                    href="{{ route('projectsDetail', [$project->id, $project->slug]) }}">{{ $project->name }}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <!-- End Nav Card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Project Area End -->
    </main>
@endsection

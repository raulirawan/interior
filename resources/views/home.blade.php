@extends('layouts.front')

@section('title', 'PT. Wahana Cipta Selaras Abyudaya')
@section('content')
    @push('styles')
        <style>
            /* .slider-area2 {
                                        background-image: url(../img/hero/hero2.jpg);
                                        background-repeat: no-repeat;
                                        background-size: cover;
                                    } */

            /* line 43, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */

            .slider-area {
                position: relative;
                background-image: url({{ asset('frontend/assets/img/hero/h1_hero2.jpg') }});
                background-repeat: no-repeat;
                /* background-position: center center; */
                background-size: cover;
            }

            /* line 50, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */

            .slider-area .hero__caption {
                overflow: hidden;
            }

            @media only screen and (min-width: 576px) and (max-width: 767px) {

                /* line 50, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */
                .slider-area .hero__caption {
                    padding-top: 50px;
                }
            }

            @media (max-width: 575px) {

                /* line 50, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */
                .slider-area .hero__caption {
                    padding-top: 50px;
                }
            }

            /* line 58, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */

            .slider-area .hero__caption span {
                color: #fff;
                font-size: 25px;
                line-height: 1.2;
                font-weight: 300;
                margin-bottom: 30px;
                position: relative;
                display: inline-block;
                font-style: italic;
                text-transform: uppercase;
            }

            /* line 68, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */

            .slider-area .hero__caption span::before {
                position: absolute;
                content: "";
                background-image: url({{ asset('frontend/assets/img/hero/hero_line.png') }});
                background-repeat: no-repeat;
                height: 35%;
                bottom: -20px;
                left: 0;
                background-size: 75%;
                right: 0;
            }

            /* line 81, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */

            .slider-area .hero__caption h1 {
                font-size: 80px;
                font-weight: 600;
                margin-bottom: 14px;
                color: #fff;
                line-height: 95px;
                text-transform: capitalize;
                /* margin-bottom: 40px; */
            }

            @media only screen and (min-width: 992px) and (max-width: 1199px) {

                /* line 81, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */
                .slider-area .hero__caption h1 {
                    font-size: 60px;
                    line-height: 1.2;
                }
            }

            @media only screen and (min-width: 768px) and (max-width: 991px) {

                /* line 81, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */
                .slider-area .hero__caption h1 {
                    font-size: 50px;
                    line-height: 1.2;
                }
            }

            @media only screen and (min-width: 576px) and (max-width: 767px) {

                /* line 81, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */
                .slider-area .hero__caption h1 {
                    font-size: 35px;
                    line-height: 1.2;
                }
            }

            @media (max-width: 575px) {

                /* line 81, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */
                .slider-area .hero__caption h1 {
                    font-size: 32px;
                    line-height: 1.2;
                }
            }

            /* line 105, ../../../sponDon TI/Running Project/263.InteriorDesign_HTML/HTML/assets/scss/_h1-hero.scss */

            .slider-area .hero__caption h1 span {
                color: #ff1313;
            }

            .slider-area .sub-text {
                font-size: 1.1rem;
                text-transform: uppercase;
                color: rgba(255, 255, 255, 0.7);
                letter-spacing: .2em;
            }

            .slider-area h1 {
                font-weight: 900;
                color: #fff;
                font-size: 3rem;
            }

            .slider-area h1 strong {
                font-weight: 900;
            }

            @media (min-width: 768px) {
                .slider-area h1 {
                    font-size: 5rem;
                }
            }
        </style>
    @endpush
    <main>

        <!-- slider Area Start-->
        {{-- <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                    data-background="{{ asset('/frontend') }}/assets/img/hero/img-hero.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="hero__caption">
                                    <div class="hero-text1">
                                        <span data-animation="fadeInUp" data-delay=".3s">Interior Constractor</span>
                                    </div>
                                    <h1 data-animation="fadeInUp" data-delay=".5s">PT WAHANA</h1>
                                    <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                        <h2>CIPTA SELARAS ABYUDAYA</h2>
                                        <h2>CIPTA SELARAS ABYUDAYA</h2>
                                    </div>
                                    <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                        <span><a href="{{ route('services') }}">Our Services</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                    data-background="{{ asset('/frontend') }}/assets/img/hero/img-hero.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="hero__caption">
                                    <div class="hero-text1">
                                        <span data-animation="fadeInUp" data-delay=".3s">Interior Constractor</span>
                                    </div>
                                    <h1 data-animation="fadeInUp" data-delay=".5s">advanced</h1>
                                    <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                        <h2>CIPTA SELARAS ABYUDAYA</h2>
                                        <h2>CIPTA SELARAS ABYUDAYA</h2>
                                    </div>
                                    <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                        <span><a href="{{ route('services') }}">Our Services</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="slider-area">
            <div class="slider-active dot-style">
                <!-- Single Slider -->
                <div class="single-slider slider-height hero-overly d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".4s">Welcome to our company</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s">
                                        INTERIOR<br>
                                        CONTRACTOR
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".7s" class="sub-text">PT. Wahana Cipta
                                        Selaras Abyudaya</p>
                                    <a href="{{ $setting->link_whatsapp }}" data-animation="fadeInLeft" data-delay=".8s"
                                        target="_blank" class="btn">Get In Touch</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="container">
                        <div class="row align-items-center text-center justify-content-center">
                            <div class="col-md-12">
                                <p data-animation="fadeInLeft" data-delay=".4s" class="sub-text" >PT. Wahana Cipta Selaras Abyudaya</p>
                                <h1 data-animation="fadeInLeft" data-delay=".6s">Interior Contractor</h1>
                                <a href="{{ $setting->link_whatsapp }}" data-animation="fadeInLeft" data-delay=".8s" target="_blank" class="btn">Get In Touch</a>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
        <!-- slider Area End-->
        <!-- Services Area Start -->
        @if ($services->isNotEmpty())
            <div class="services-area1 section-padding30">
                <div class="container">
                    <!-- section tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-55">
                                <div class="front-text">
                                    <h2 class="">Our Services</h2>
                                </div>
                                <span class="back-text">Services</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-service-cap mb-30">
                                    <div class="service-img">
                                        <img src="{{ $service->image }}" alt="{{ $service->name }}">
                                    </div>
                                    <div class="service-cap">
                                        <h4><a
                                                href="{{ route('servicesDetail', [$service->id, $service->slug]) }}">{{ $service->name }}</a>
                                        </h4>
                                        <a href="{{ route('servicesDetail', [$service->id, $service->slug]) }}"
                                            class="more-btn">Read More <i class="ti-plus"></i></a>
                                    </div>
                                    <div class="service-icon">
                                        <img src="{{ asset('/frontend') }}/assets/img/icon/services_icon1.png"
                                            alt="{{ $service->name }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-service-cap mb-30">
                            <div class="service-img">
                                <img src="{{ asset('/frontend') }}/assets/img/service/servicess2.png" alt="">
                            </div>
                            <div class="service-cap">
                                <h4><a href="services_details.html">Engineering techniques & implementation</a></h4>
                                <a href="services_details.html" class="more-btn">Read More <i class="ti-plus"></i></a>
                            </div>
                            <div class="service-icon">
                                <img src="{{ asset('/frontend') }}/assets/img/icon/services_icon1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-service-cap mb-30">
                            <div class="service-img">
                                <img src="{{ asset('/frontend') }}/assets/img/service/servicess3.png" alt="">
                            </div>
                            <div class="service-cap">
                                <h4><a href="services_details.htmlaa">Engineering techniques & implementation</a></h4>
                                <a href="services_details.html" class="more-btn">Read More <i class="ti-plus"></i></a>
                            </div>
                            <div class="service-icon">
                                <img src="{{ asset('/frontend') }}/assets/img/icon/services_icon1.png" alt="">
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
            </div>
        @endif
        <!-- Services Area End -->
        <!-- About Area Start -->
        <section class="support-company-area fix pt-10">
            <div class="support-wrapper align-items-end">
                <div class="left-content">
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-55">
                        <div class="front-text">
                            <h2 class="">Who we are</h2>
                        </div>
                        <span class="back-text">About us</span>
                    </div>
                    <div class="support-caption">
                        <p>
                            {!! $setting->about_us !!}
                        </p>
                        <a href="{{ route('about-us') }}" class="btn red-btn2">read more</a>
                    </div>
                </div>
                <div class="right-content">
                    <!-- img -->
                    <div class="right-img">
                        <img src="{{ asset('/frontend') }}/assets/img/gallery/safe_in.png" alt="Image About">
                    </div>
                    <div class="support-img-cap text-center">
                        <span>2000</span>
                        <p>Since</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
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
                                        {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                            href="#nav-profile" role="tab" aria-controls="nav-profile"
                                            aria-selected="false"> Intorior</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                            href="#nav-contact" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">Recent</a>
                                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab"
                                            href="#nav-last" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">Big building</a>
                                        <a class="nav-item nav-link" id="nav-technology" data-toggle="tab"
                                            href="#nav-techno" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">Park</a> --}}
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
        <!-- contact with us Start -->
        <section class="contact-with-area" data-background="{{ asset('/frontend') }}/assets/img/gallery/section-bg2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 offset-xl-1 offset-lg-1">
                        <div class="contact-us-caption">
                            <div class="team-info mb-30 pt-45">
                                <!-- Section Tittle -->
                                <div class="section-tittle section-tittle4">
                                    <div class="front-text">
                                        <h2 class="">Lats talk with us</h2>
                                    </div>
                                    <span class="back-text">Lat`s chat</span>
                                </div>
                                <p>PT. Wahana Cipta Selaras Abyudaya is an Interior Contractor and Design company based in
                                    Jakarta, Indonesia. The company was established in 2000, and has been serving thousands
                                    of clients since its establishment.</p>
                                <a href="{{ asset('frontend/assets/file/WCSA COMPANY PROFILE 2022.pdf') }}"
                                    target="blank" class="white-btn">Download Our Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact with us End-->
        <!-- CountDown Area Start -->
        {{-- <div class="count-area">
            <div class="container">
                <div class="count-wrapper count-bg"
                    data-background="{{ asset('/frontend') }}/assets/img/gallery/section-bg3.jpg">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter">34</span>
                                    </div>
                                    <div class="count-text">
                                        <p>Machinery</p>
                                        <h5>Tools</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter">76</span>
                                    </div>
                                    <div class="count-text">
                                        <p>Machinery</p>
                                        <h5>Tools</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="count-clients">
                                <div class="single-counter">
                                    <div class="count-number">
                                        <span class="counter">08</span>
                                    </div>
                                    <div class="count-text">
                                        <p>Machinery</p>
                                        <h5>Tools</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- CountDown Area End -->
        <!-- Team Start -->
        <div class="team-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle5 mb-50">
                            <div class="front-text">
                                <h2 class="">Our team</h2>
                            </div>
                            <span class="back-text">exparts</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single Tem -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="{{ asset('/frontend') }}/assets/img/team/team1.png" alt="Team 1">
                            </div>
                            <div class="team-caption">
                                <span>UX Designer</span>
                                <h3>Ethan Welch</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="{{ asset('/frontend') }}/assets/img/team/team2.png" alt="Team 2">
                            </div>
                            <div class="team-caption">
                                <span>UX Designer</span>
                                <h3>Ethan Welch</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                        <div class="single-team mb-30">
                            <div class="team-img">
                                <img src="{{ asset('/frontend') }}/assets/img/team/team3.png" alt="Team 3">
                            </div>
                            <div class="team-caption">
                                <span>UX Designer</span>
                                <h3>Ethan Welch</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
        <!-- Testimonial Start -->
        @if ($testimonials->isNotEmpty())
            <div class="testimonial-area t-bg testimonial-padding">
                <div class="container ">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle6 mb-50">
                                <div class="front-text">
                                    <h2 class="">Testimonial</h2>
                                </div>
                                <span class="back-text">Feedback</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-10 col-lg-11 col-md-10 offset-xl-1">
                            <div class="h1-testimonial-active">
                                <!-- Single Testimonial -->
                                @foreach ($testimonials as $testimoni)
                                    <div class="single-testimonial">
                                        <!-- Testimonial Content -->
                                        <div class="testimonial-caption ">
                                            <div class="testimonial-top-cap">
                                                <!-- SVG icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="86px" height="63px">
                                                    <path fill-rule="evenodd" stroke-width="1px"
                                                        stroke="rgb(255, 95, 19)" fill-opacity="0" fill="rgb(0, 0, 0)"
                                                        d="M82.623,59.861 L48.661,59.861 L48.661,25.988 L59.982,3.406 L76.963,3.406 L65.642,25.988 L82.623,25.988 L82.623,59.861 ZM3.377,25.988 L14.698,3.406 L31.679,3.406 L20.358,25.988 L37.340,25.988 L37.340,59.861 L3.377,59.861 L3.377,25.988 Z" />
                                                </svg>
                                                <p>{{ $testimoni->testimoni }}</p>
                                            </div>
                                            <!-- founder -->
                                            <div class="testimonial-founder d-flex align-items-center">
                                                <div class="founder-text">
                                                    <span>{{ $testimoni->name }}</span>
                                                    <p>{{ $testimoni->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Testimonial End -->
        <!--latest Nnews Area start -->
        @if ($blogs->isNotEmpty())
            <div class="latest-news-area section-padding30">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle7 mb-50">
                                <div class="front-text">
                                    <h2 class="">latest news</h2>
                                </div>
                                <span class="back-text">Our Blog</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <!-- single-news -->
                                <div class="single-news mb-30">
                                    <div class="news-img">
                                        <img src="{{ $blog->image }}" alt="{{ $blog->name }}">
                                        <div class="news-date text-center">
                                            <span>{{ Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                                            <p>{{ Carbon\Carbon::parse($blog->created_at)->format('F') }}</p>
                                        </div>
                                    </div>
                                    <div class="news-caption">
                                        <ul class="david-info">
                                            <li>{{ Carbon\Carbon::parse($blog->created_at)->format('d F Y H:i') }}</li>
                                        </ul>
                                        <h2><a
                                                href="{{ route('blogsDetail', [$blog->id, $blog->slug]) }}">{{ $blog->name }}</a>
                                        </h2>
                                        <a href="{{ route('blogsDetail', [$blog->id, $blog->slug]) }}"
                                            class="d-btn">Read more »</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @endif
        <!--latest News Area End -->

    </main>
@endsection

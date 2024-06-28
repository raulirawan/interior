<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Construction HTML-5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/logo-wcsa.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/slicknav.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/style.css">
    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            /* Adjust the distance from the bottom edge */
            right: 20px;
            /* Adjust the distance from the right edge */
            z-index: 1000;
            /* Ensure it's above other content */
        }

        .whatsapp-button img {
            width: 60px;
            /* Adjust the size of the WhatsApp icon */
            border-radius: 50%;
            /* Makes the icon circular */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            /* Optional: Adds shadow */
        }

        #scrollUp {
            right: 25px;
            position: fixed;
            z-index: 2147483647;
            bottom: 90px;
        }
    </style>
</head>

<body>
    <div class="whatsapp-button">
        <a href="{{ $setting->link_whatsapp }}" target="_blank">
            <img src="{{ asset('frontend/assets/img/icon/whatsapp.png') }}" alt="WhatsApp">
        </a>
    </div>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('frontend/assets/img/logo-wcsa.png') }}" style="width: 60px" alt="Loader Logo">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li>{{ $setting->phone }}</li>
                                        <li>Mon - Sat 8:00 - 17:30, Sunday - CLOSED</li>
                                    </ul>
                                </div>
                                {{-- <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                    <!-- logo-1 -->
                                    <a href="{{ route('home') }}" class="big-logo"><img
                                            src="{{ asset('frontend/assets/img/logo-wcsa.png') }}" style="width: 60px"
                                            alt="Logo"></a>
                                    <!-- logo-2 -->
                                    <a href="{{ route('home') }}" class="small-logo"><img
                                            src="{{ asset('frontend/assets/img/logo-wcsa.png') }}" style="width: 60px"
                                            alt="Loader Logo"></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('about-us') }}">About</a></li>
                                            <li><a href="{{ route('projects') }}">Projects</a></li>
                                            <li><a href="{{ route('services') }}">Services</a></li>
                                            <li><a href="{{ route('blogs') }}">Blog</a></li>
                                            <li><a href="{{ route('contact-us') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="{{ $setting->link_whatsapp }}" target="_blank" class="btn">Contact
                                        Now</a>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    @yield('content')
    <footer>
        <!-- Footer Start-->
        <div class="footer-main">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row  justify-content-between">
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{ route('home') }}"><img
                                            src="{{ asset('frontend/assets/img/logo-wcsa.png') }}"
                                            style="width: 60px; " alt="Logo Footer"></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">PT. Wahana Cipta Selaras Abyudaya is an Interior Contractor
                                            and Design company based in Jakarta, Indonesia. The company was established
                                            in 2000, and has been serving thousands of clients since its establishment.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="{{ route('about-us') }}">About</a></li>
                                        <li><a href="{{ route('services') }}">Services</a></li>
                                        <li><a href="{{ route('projects') }}">Projects</a></li>
                                        <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contact</h4>
                                    <div class="footer-pera">
                                        <p class="info1">{{ $setting->address }}</p>
                                    </div>
                                    <ul>
                                        <li><a href="#">Phone: {{ $setting->phone }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Copy-Right -->
                    <div class="row align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('/frontend') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('/frontend') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('/frontend') }}/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('/frontend') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="{{ asset('/frontend') }}/assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('/frontend') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/animated.headline.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('/frontend') }}/assets/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/jquery.counterup.min.js"></script>

    <!-- contact js -->
    <script src="{{ asset('/frontend') }}/assets/js/contact.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/jquery.form.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/jquery.validate.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/mail-script.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('/frontend') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/main.js"></script>
    @include('sweetalert::alert')
</body>

</html>

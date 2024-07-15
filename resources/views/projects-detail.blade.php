@extends('layouts.front')


@section('title', $project->name . ' - PT. Wahana Cipta Selaras Abudaya')

@section('content')
    <style>
        @media (max-width: 575px) {
            .slider-area .hero-cap h2 {
                font-size: 30px !important;
            }
        }

        img,
        figure {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        img {
            max-width: 100%;
        }

        /*PRODUCT DETAILS*/

        .detail-gallery {
            position: relative;
        }

        .detail-gallery .zoom-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 2;
        }

        .slider-nav-thumbnails .slick-slide {
            opacity: 0.5;
            position: relative;
        }

        .slider-nav-thumbnails .slick-slide.slick-current {
            opacity: 1;
        }

        .slider-nav-thumbnails .slick-slide.slick-current::before {
            border-bottom: 5px solid #333;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            content: "";
            height: 0;
            left: 50%;
            margin-left: -5px;
            position: absolute;
            top: -6px;
            width: 0;
        }

        .slider-nav-thumbnails .slick-slide.slick-current img {
            border: 2px solid #a2d2c9;
        }

        .slider-nav-thumbnails div.slick-slide {
            margin: 0 3px;
        }

        .slider-nav-thumbnails button.slick-arrow {
            margin: 0;
        }

        .slider-nav-thumbnails .slick-prev {
            left: 0;
        }

        .slider-nav-thumbnails .slick-next {
            right: 0;
        }

        .slider-nav-thumbnails .slick-prev,
        .slider-nav-thumbnails .slick-next {
            font-size: 12px;
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }


        .detail-gallery .slick-slider {
            background-color: #000;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .detail-gallery .slick-slider img {
            opacity: 0.96;
        }

        .detail-gallery .slick-slider.slider-nav-thumbnails {
            background: none;
            border-radius: 0;
        }

        .detail-gallery .slick-slider button.slick-arrow {
            background: none;
            border: 0;
            padding: 0;
            font-size: 14px;
        }

        .detail-gallery .slick-slider button.slick-arrow i {
            color: #90908e;
        }

        .product-image-slider figure img {
            width: 100%;
        }
    </style>
    @php
        $image = json_decode($project->image);
    @endphp
    <main>
        <!-- slider Area Start-->
        <div class="slider-area ">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('/frontend') }}/assets/img/hero/img-menu.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap pt-100">
                                <h2>{{ $project->name }}</h2>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">projects Details</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Services Details Start -->
        <div class="services-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single-services section-padding2">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    @foreach ($image as $value)
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('image/projects/' . $value) }}" alt="{{ $project->name }}">
                                        </figure>
                                    @endforeach
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    @foreach ($image as $value)
                                        <div><img src="{{ asset('image/projects/' . $value) }}" alt="product image"></div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="details-caption">
                                {!! $project->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Details End -->
    </main>

    @push('scripts')
        <script src="/assets/js/plugins/slick.js"></script>
        <script src="/assets/js/plugins/jquery.elevatezoom.js"></script>
        <script>
            (function($) {
                'use strict';
                /*Product Details*/
                var productDetails = function() {
                    $('.product-image-slider').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        fade: false,
                        touchMove: false,
                        asNavFor: '.slider-nav-thumbnails',
                    });

                    $('.slider-nav-thumbnails').slick({
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        asNavFor: '.product-image-slider',
                        dots: false,
                        focusOnSelect: true,
                        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>'
                    });

                    // Remove active class from all thumbnail slides
                    $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

                    // Set active class to first thumbnail slides
                    $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

                    // On before slide change match active thumbnail to current slide
                    $('.product-image-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                        var mySlideNumber = nextSlide;
                        $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
                        $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
                    });

                    // $('.product-image-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                    //     var img = $(slick.$slides[nextSlide]).find("img");
                    //     $('.zoomWindowContainer,.zoomContainer').remove();
                    //     $(img).elevateZoom({
                    //         zoomType: "inner",
                    //         cursor: "crosshair",
                    //         zoomWindowFadeIn: 500,
                    //         zoomWindowFadeOut: 750
                    //     });
                    // });
                    //Elevate Zoom
                    // if ($(".product-image-slider").length) {
                    //     $('.product-image-slider .slick-active img').elevateZoom({
                    //         zoomType: "inner",
                    //         cursor: "crosshair",
                    //         zoomWindowFadeIn: 500,
                    //         zoomWindowFadeOut: 750
                    //     });
                    // }
                    //Filter color/Size
                    $('.list-filter').each(function() {
                        $(this).find('a').on('click', function(event) {
                            event.preventDefault();
                            $(this).parent().siblings().removeClass('active');
                            $(this).parent().toggleClass('active');
                            $(this).parents('.attr-detail').find('.current-size').text($(this).text());
                            $(this).parents('.attr-detail').find('.current-color').text($(this).attr(
                                'data-color'));
                        });
                    });
                    //Qty Up-Down
                    $('.detail-qty').each(function() {
                        var qtyval = parseInt($(this).find('.qty-val').text(), 10);
                        $('.qty-up').on('click', function(event) {
                            event.preventDefault();
                            qtyval = qtyval + 1;
                            $(this).prev().text(qtyval);
                        });
                        $('.qty-down').on('click', function(event) {
                            event.preventDefault();
                            qtyval = qtyval - 1;
                            if (qtyval > 1) {
                                $(this).next().text(qtyval);
                            } else {
                                qtyval = 1;
                                $(this).next().text(qtyval);
                            }
                        });
                    });

                    $('.dropdown-menu .cart_list').on('click', function(event) {
                        event.stopPropagation();
                    });
                };
                /* WOW active */
                new WOW().init();

                //Load functions
                $(document).ready(function() {
                    productDetails();
                });

            })(jQuery);
        </script>
    @endpush
@endsection

@extends('layouts.front')

@section('title' ,'Blogs - PT. Wahana Cipta Selaras Abudaya')

@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background="{{ asset('/frontend') }}/assets/img/hero/img-menu.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap pt-100">
                            <h2> Blog</h2>
                            <nav aria-label="breadcrumb ">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#"> Blog</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <div class="row">
                            @foreach ($blogs as $blog)
                                <div class="col-lg-6">
                                    <article class="blog_item">
                                        <div class="blog_item_img">
                                            <img class="card-img rounded-0" src="{{ $blog->image }}" alt="{{ $blog->name }}">
                                            <a href="#" class="blog_item_date">
                                                <h3>{{ Carbon\Carbon::parse($blog->created_at)->format('d') }}</h3>
                                                <p>{{ Carbon\Carbon::parse($blog->created_at)->format('F') }}</p>
                                            </a>
                                        </div>

                                        <div class="blog_details" style="min-height: 200px !important">
                                            <a class="d-inline-block" href="{{ route('blogsDetail', [$blog->id, $blog->slug]) }}">
                                                <h2>{{ $blog->name }}</h2>
                                            </a>

                                            <ul class="blog-info-link">
                                                <li><a href="#"><i class="fa fa-user"></i>
                                                        {{ ucfirst($blog->user->name) }}</a></li>
                                                <li><a href="#"><i class="fa fa-clock"></i>
                                                        {{ Carbon\Carbon::parse($blog->created_at)->format('d F Y H:i') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                            @endforeach

                        </div>


                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection

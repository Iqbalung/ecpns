@extends('layouts.sitelayout')

@section('content')
    <style>
        .hhbimg {
            background: url({{ IMAGE_PATH_SETTINGS . $home_back_image }}) center center no-repeat;
        }

        .hhfr {
            float: right;
        }
    </style>
    <!-- Hero Header -->
    <header class="hero-header hhbimg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-content">
                        <center>
                            <br><br><br><br>
                        <h1 class="cs-hero-title">Bergabung Bersama</h1>
                        <h2 class="cs-hero-title">Komunitas Belajar Terbesar</h2>
                        <div><a href="{{ $home_link }}" class="btn btn-primary btn-hero" target="_blank">Get Started</a>
                        </center>    
                    </div>
                    </div>
                </div>
              
            </div>
        </div>
    </header>
    <!-- Hero Header -->

    <!-- Call to action -->

    <!-- Call to action -->

    {{-- Quizzes --}}
    <section class="cs-gray-bg">
        <div class="container">
            <div class="cs-row">
                <div class="row">
                    <div class="col-sm-12 text-center clearfix">
                        <h2 class="cs-section-head">{{ getPhrase('practice_exams_and_exam_categories') }}</h2>
                    </div>
                </div>

               



                @if (!empty($exam_series))
                    <div class="row ">
                        @foreach ($exam_series as $exam)
                            <div class="col-md-3 col-sm-6 princing-item yellow">
                                <div class="pricing-divider m-auto text-center w-75">
                                            <h3 class="text-light">
                                            {{ ucfirst($exam->name) }}
                                            </h3>
                                                        <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3"></span>  {{ getCurrencyCode() }} {{ idrFormat((int) $exam->amount) }} 
                                                        <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
                                                    <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                                                c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
                                                    <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                                                c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
                                                    <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                                                H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
                                                    <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                                                c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
                                                    </svg>
                                </div>

                                    <div class="card-body cs-white-bg mt-0 shadow">
                                        <ul class="mb-5 position-relative list-group">
                                            
                                            <li class="text-center"> {!! $exam->description !!}<li>

                                           

                                            <div class="text-center mt-2">
                                                <a href="{{ url('payments/checkout/subscribe/' . $exam->slug) }}"
                                                    class="btn btn-blue btn-sm btn-block btn-radius">
                                                    {{ getPhrase('start_exam') }}
                                                </a>
                                            </div>
                                        </ul>
                                       
                                    </div>
                            </div>
                        @endforeach

                    </div>
                @endif
       


                                            


                @if (count($categories))
                    <div class="row text-center">
                        <ul class="list-inline top40">
                            <li><a href="{{ URL_VIEW_ALL_EXAM_CATEGORIES }}"
                                    class="btn btn-primary btn-shadow">{{ getPhrase('Browse_all_exams') }}</a></li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- /End Quizzes -->

    {{-- LMS Categories --}}

    <section class="cs-gr-bg">
        <div class="container">
            <div class="cs-row">
                <div class="row">
                    <div class="col-sm-12 text-center clearfix">
                        <h2 class="cs-section-head">LMS {{ getPhrase('categories') }}</h2>

                        <ul class="nav nav-pills cs-nav-pills lms-cats text-center">
                            @if (isset($lms_cates))

                                @foreach ($lms_cates as $lms_category)
                                    <li><a
                                            href="{{ URL_VIEW_ALL_LMS_CATEGORIES . '/' . $lms_category->slug }}">{{ $lms_category->category }}</a>
                                    </li>
                                @endforeach
                            @else
                                <h4>{{ getPhrase('no_categories_are_available') }}</h4>

                            @endif

                        </ul>

                    </div>
                </div>




                <div class="row">

                    @if (isset($lms_series))

                        @foreach ($lms_series as $series)
                            <div class="col-md-3 col-sm-6">
                                <!-- Product Single Item -->
                                <div class="cs-product cs-animate">

                                    <div class="info-box ribbon_box same_height">
                                        @if ($series->is_paid)
                                            <div class="ribbon green"><span> Paid Series </span></div>
                                        @else
                                            <div class="ribbon yellow"><span> Free Series </span></div>
                                        @endif

                                        <a href="{{ URL_VIEW_LMS_CONTENTS . $series->slug }}">
                                            <div class="cs-product-img">
                                                @if ($series->image)
                                                    <img src="{{ IMAGE_PATH_UPLOAD_LMS_SERIES . $series->image }}"
                                                        alt="exam" class="img-responsive">
                                                @else
                                                    <img src="{{ IMAGE_PATH_EXAMS_DEFAULT }}" alt="exam"
                                                        class="img-responsive">
                                                @endif
                                            </div>
                                        </a>
                                        <ul class="cs-product-content mt-0">


                                            <li> <a href="{{ URL_VIEW_LMS_CONTENTS . $series->slug }}"
                                                    class="cs-product-title">{{ ucfirst($series->title) }}</a></li>


                                            @if ($series->is_paid)
                                                <li><a href="#" class="hhfr">{{ getPhrase('price') }} :
                                                        {{ getCurrencyCode() }} {{ idrFormat((int) $series->cost) }}
                                                    </a></li>
                                            @endif

                                            <li>Total Items : {{ $series->total_items }}</li>

                                            <div class="text-center mt-2">
                                                <a href="{{ URL_VIEW_LMS_CONTENTS . $series->slug }}"
                                                    class=" btn btn-blue btn-sm btn-radius">View </a>
                                            </div>
                                        </ul>

                                    </div>

                                </div>
                                <!-- /Product Single Item -->
                            </div>
                        @endforeach
                    @endif

                </div>







                @if (isset($lms_cates))
                    <div class="row text-center">
                        <ul class="list-inline top40">
                            <li><a href="{{ URL_VIEW_ALL_LMS_CATEGORIES }}"
                                    class="btn btn-primary btn-shadow">{{ getPhrase('Browse_all_categories') }}</a></li>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </section>

    {{-- End LMS Categories --}}





    <!--Testmonies-->
    @if ($testimonies)
        <!-- TESTIMONIALS -->
        <section class="testimonials">
            <div class="container">

                <div class="cs-row">
                    <div class="row">
                        <div class="col-sm-12 text-center clearfix">
                            <h2 class="cs-section-head">Hear it Directly from our Students</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">



                            <div id="customers-testimonials" class="owl-carousel">


                                <!--TESTIMONIAL 1 -->
                                @foreach ($testimonies as $testmony)
                                    <div class="item">
                                        <div class="shadow-effect">
                                            <img class="img-circle" src="{{ getProfilePath($testmony->image, 'thumb') }}"
                                                alt="{{ $testmony->name }}">
                                            <p>{{ $testmony->description }}</p>
                                        </div>
                                        <div class="testimonial-name">{{ $testmony->name }}</div>
                                    </div>
                                @endforeach
                                <!--END OF TESTIMONIAL 1 -->

                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </section>
        <!-- END OF TESTIMONIALS -->
    @endif
    <!--Testmonies-->









    <!-- Info Boxes -->
    <section class="cs-gray-bg">
        <div class="container">
            <div class="row cs-row">
                <div class="col-sm-4 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <!-- Info Box  Centered Single Item -->
                    <div class="cs-info-box-center">
                        <img src="{{ IMAGES }}icn-cup.png" alt="" class="wow scaleIn"
                            data-wow-duration="500ms" data-wow-delay="300ms">
                        <h4>{{ getPhrase('free_exams') }}</h4>

                    </div>
                    <!-- /Info Box Centered  Single Item -->
                </div>
                <div class="col-sm-4 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <!-- Info Box  Centered Single Item -->
                    <div class="cs-info-box-center">
                        <img src="{{ IMAGES }}icn-computer.png" alt="" class="wow scaleIn"
                            data-wow-duration="500ms" data-wow-delay="600ms">
                        <h4>{{ getPhrase('paid_exams') }}</h4>

                    </div>
                    <!-- /Info Box Centered  Single Item -->
                </div>
                <div class="col-sm-4 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <!-- Info Box  Centered Single Item -->
                    <div class="cs-info-box-center">
                        <img src="{{ IMAGES }}icn-sett.png" alt="" class="wow scaleIn"
                            data-wow-duration="500ms" data-wow-delay="900ms">
                        <h4>{{ getPhrase('learning_management_system') }}</h4>

                    </div>
                    <!-- /Info Box Centered  Single Item -->
                </div>
            </div>
        </div>
    </section>
    <!-- /Info Boxes -->

@stop

@section('footer_scripts')


    <script>
        $(".cs-nav-pills li").first().addClass("active");
        $(".lms-cats li").first().addClass("active");
    </script>


    <script src="{{ JS }}jquery.min.js"></script>
    <script src="{{ themes('site/js/testimonies/owl.carousel.min.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {
            "use strict";
            //  TESTIMONIALS CAROUSEL HOOK
            $('#customers-testimonials').owlCarousel({
                loop: true,
                center: true,
                items: 3,
                margin: 0,
                autoplay: true,
                dots: true,
                autoplayTimeout: 8500,
                smartSpeed: 450,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1170: {
                        items: 3
                    }
                }
            });
        });
    </script>

@stop

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{IMAGE_PATH_SETTINGS.getSetting('site_favicon', 'site_settings')}}" type="image/x-icon" />
    <title>@yield('title') {{ isset($title) ? $title : getSetting('site_title','site_settings') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{themes('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{themes('front/css/bootstrap.offcanvas.css')}}" rel="stylesheet">
    <!--Owl Carousel-->
     <link href="{{themes('front/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
     <link href="{{themes('front/vendor/owl.carousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">
     <link href="{{themes('front/vendor/owl.carousel/assets/owl.theme.green.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
     <link href="{{themes('front/fonts/proxima-nova/proximanova.css')}}" rel="stylesheet">
     <link href="{{themes('front/css/style.css')}}" rel="stylesheet">

    <!--FontAwesome-->
     <link href="{{themes('front/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">


    <!-- RESPONSIVE STYLES -->
     <link href="{{themes('css/landing-css/responsive.css')}}" rel="stylesheet">
     <link href="{{themes('css/landing-css/colors.css')}}" rel="stylesheet">
     <link href="{{themes('css/landing-css/custom.css')}}" rel="stylesheet">
     <link href="{{themes('css/landing-css/style.css')}}" rel="stylesheet">


</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top">
    <!-- Navigation -->


    <!-- NAVIGATION -->
    <nav class="navbar navbar-default st-navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand page-scroll" href="{{PREFIX}}"><img src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="{{getSetting('site_title','site_settings')}}"></a>
                <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                    <span class="sr-only">Toggle navigation</span>
                    <span>
                        <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </span>
                </button>
            </div>
            <div class="navbar-offcanvas navbar-offcanvas-touch" id="js-bootstrap-offcanvas">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a

                        @if($active_class=='home')
                            class="page-scroll active"
                        @else
                            class="page-scroll"
                        @endif

                        href="{{PREFIX}}">Home</a>
                    </li>


                     <li>
                        <a

                        @if($active_class=='exams')
                            class="page-scroll active"
                        @else
                            class="page-scroll"
                        @endif

                        href="{{URL_FRONTEND_EXAMS_LIST}}">{{getPhrase('practice_exams')}}</a>
                    </li>

                    <li>
                        <a
                        @if($active_class=='terms-conditions')
                            class="page-scroll active"
                        @else
                            class="page-scroll"
                        @endif

                        href="{{SITE_PAGES_TERMS}}">Terms and Conditions
                        </a>
                    </li>
                    <li>
                        <a
                        @if($active_class=='privacy-policy')
                            class="page-scroll active"
                        @else
                            class="page-scroll"
                        @endif
                        href="{{SITE_PAGES_PRIVACY}}"
                        >Privacy and Policy
                    </a> </li>
                    <li>
                        <a

                        @if($active_class=='login')
                            class="page-scroll active"

                        @else
                            class="page-scroll"

                        @endif
                         href="{{URL_USERS_LOGIN}}">Login</a> </li>

                    <li>
                        <a

                        @if($active_class=='register')
                            class="page-scroll active"

                        @else
                            class="page-scroll"

                        @endif href="{{URL_USERS_REGISTER}}">Register</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /NAVIGATION -->


    @yield('content')




    <div class="st-copyright-section">
        <div class="container">
            <div class="clearfix text-center">
                <div class="st-copyright">{{getSetting('copyrights','site_pages')}}</div>
                <div class="st-social-links">
                    <?php $social_url = getSetting('facebook','site_pages'); ?>
                    @if($social_url && $social_url!='Invalid Setting')
                    <a href="{{$social_url}}" target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    @endif

                    <?php $social_url = getSetting('twitter','site_pages'); ?>
                    @if($social_url && $social_url!='Invalid Setting')
                    <a href="{{$social_url}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    @endif

                    <?php $social_url = getSetting('twitter','site_pages'); ?>
                    @if($social_url && $social_url!='Invalid Setting')
                    <a href="{{$social_url}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    @endif
                    <?php $social_url = getSetting('twitter','site_pages'); ?>
                    @if($social_url && $social_url!='Invalid Setting')
                    <a href="{{$social_url}}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true">
                    @endif
                    </i></a>
                </div>
            </div>
        </div>
    </div>
    <!--scroll to top-->
    <a href="javascript:void(0);" class="st-scrollToTop"><i class="fa fa-angle-up"></i></i></a>
    <!-- /scroll to top-->
    <!-- jQuery -->
      <script src="{{JS}}jquery.min.js"></script>
      <script src="{{themes('front/js/jquery.easing.min.js')}}"></script>
      <script src="{{themes('front/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{themes('front/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
      <script src="{{themes('front/js/bootstrap.offcanvas.js')}}"></script>
      <script src="{{themes('front/js/main.js')}}"></script>
      <script src="{{themes('js/landing-js/all.js')}}"></script>
      <script src="{{themes('js/landing-js/custom.js')}}"></script>
      <script src="{{themes('js/landing-js/mason_03.js')}}"></script>





</body>

</html>
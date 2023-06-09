<!DOCTYPE html>

<html lang="en" dir="{{ (App\Language::isDefaultLanuageRtl()) ? 'rtl' : 'ltr' }}">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{getSetting('meta_description', 'seo_settings')}}">

    <meta name="keywords" content="{{getSetting('meta_keywords', 'seo_settings')}}">

        <meta name="csrf_token" content="{{ csrf_token() }}">


    <link rel="icon" href="{{IMAGE_PATH_SETTINGS.getSetting('site_favicon', 'site_settings')}}" type="image/x-icon" />

    <title>@yield('title') {{ isset($title) ? $title : getSetting('site_title','site_settings') }}</title>

    <!-- Bootstrap Core CSS -->

 @yield('header_scripts')


 <!-- Bootstrap Core CSS -->
    <link href="{{FRONT_ASSETS}}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{FRONT_ASSETS}}css/bootstrap.offcanvas.css" rel="stylesheet">
    <!--Owl Carousel-->
    <link rel="stylesheet" href="{{FRONT_ASSETS}}vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{FRONT_ASSETS}}vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{FRONT_ASSETS}}vendor/owl.carousel/assets/owl.theme.green.min.css">
    <!-- Custom CSS -->
    <link href="{{FRONT_ASSETS}}fonts/proxima-nova/proximanova.css" rel="stylesheet">
    <link href="{{FRONT_ASSETS}}css/style.css" rel="stylesheet">
    <!--FontAwesome-->
    <link rel="stylesheet" href="{{FRONT_ASSETS}}vendor/font-awesome/css/font-awesome.min.css">

    
    <link href="{{CSS}}sweetalert.css" rel="stylesheet" type="text/css">

     <!-- Morris Charts CSS -->

    <link href="{{CSS}}plugins/morris.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="{{CSS}}front-exam.css" rel="stylesheet">

        <!-- <link href="{{FRONT_ASSETS}}css/style.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->

    <!-- <link href="{{CSS}}custom-fonts.css" rel="stylesheet" type="text/css"> -->

    <link href="{{CSS}}materialdesignicons.css" rel="stylesheet" type="text/css">

    <!-- <link href="{{FONTAWSOME}}font-awesome.min.css" rel="stylesheet" type="text/css"> -->

  

    

    
</head>





<body ng-app="academia">

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

                        href="{{URL_FRONTEND_EXAMS_LIST}}">{{getPhrase('exams')}}</a> 
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
                    <li> <a class="page-scroll" href="{{URL_USERS_LOGIN}}">Login</a> </li>
                    <li> <a class="page-scroll" href="{{URL_USERS_REGISTER}}">Register</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /NAVIGATION -->

    

 @yield('custom_div')

 <?php 

 $class = '';

 if(!isset($right_bar))

    $class = 'no-right-sidebar';

$block_class = '';

if(isset($block_navigation))

    $block_class = 'non-clickable';

 ?>

    <div id="wrapper" class="{{$class}}">

        <!-- Navigation -->

        <nav role="navigation">
            
        


        </nav>

         

        
        @if(isset($right_bar))

            

        <aside class="right-sidebar" id="rightSidebar">

            {{-- <button class="sidebat-toggle" id="sidebarToggle" href='javascript:'><i class="mdi mdi-menu"></i></button> --}}

            <?php $right_bar_class_value = ''; 

            if(isset($right_bar_class))

                $right_bar_class_value = $right_bar_class;

            ?>

            <div class="panel panel-right-sidebar {{$right_bar_class_value}}">

            <?php $data = '';

            if(isset($right_bar_data))

                $data = $right_bar_data;

            ?>

                @include($right_bar_path, array('data' => $data))

            </div>

        </aside>

        

    @endif

        @yield('content')

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="{{JS}}jquery.min.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="{{JS}}bootstrap.min.js"></script>



 

    <!--JS Control-->

    <script src="{{JS}}main.js"></script>

    <script src="{{JS}}sweetalert-dev.js"></script>
    <script src="{{JS}}mousetrap.js"></script>

     <script src="{{JS}}landing-js/all.js"></script>
    <script src="{{JS}}landing-js/custom.js"></script>
    <script src="{{JS}}landing-js/mason_03.js"></script>

    
    
    <script>
            var csrfToken = $('[name="csrf_token"]').attr('content');

            setInterval(refreshToken, 600000); // 1 hour 

            function refreshToken(){
                $.get('refresh-csrf').done(function(data){
                    csrfToken = data; // the new token
                });
            }

            setInterval(refreshToken, 600000); // 1 hour 

        </script>

    

    @include('common.alertify')

    

    @yield('footer_scripts')

    @include('errors.formMessages')

    @yield('custom_div_end')
    {!!getSetting('google_analytics', 'seo_settings')!!}
</body>



</html>
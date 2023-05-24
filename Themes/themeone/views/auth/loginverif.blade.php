
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{IMAGE_PATH_SETTINGS.getSetting('site_favicon', 'site_settings')}}" type="image/x-icon" />
    <title>
    @yield('title') {{ isset($title) ? $title : getSetting('site_title','site_settings') }}
    </title>


    @yield('header_scripts')


     <link href="{{themes('site/css/main.css')}}" rel="stylesheet">
     <link href="{{themes('css/notify.css')}}" rel="stylesheet">
     <link href="{{themes('css/angular-validation.css')}}" rel="stylesheet">
      <link href="{{themes('css/sweetalert.css')}}" rel="stylesheet">


<!--Testimonies css-->
<link href="{{themes('site/css/testimonies/normalize.min.css')}}" rel="stylesheet">
<link href="{{themes('site/css/testimonies/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{themes('site/css/testimonies/owl.theme.default.min.css')}}" rel="stylesheet">
<link href="{{themes('site/css/testimonies/style.css')}}" rel="stylesheet">
<!--Testimonies css-->




</head>

<body ng-app="academia">
    <!-- Navigation -->

     <style>
        .nh-hei{
            height: 40px;
        }
        .nv-mt{
            margin-top: 5px;
        }
        .brbc{
            border-radius: 50px; background-color:#ff9800;
        }.brbcfl{
            float:left;
        }
</style>
 <!-- NAVIGATION -->
    <nav class="navbar navbar-default pw-navbar-default navbar-fixed-top">
        <!-- /TOP BAR -->
        <div class="cs-topbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home"><img src="/uploads/settings/4xtxWTHg9xmyQPk.png" alt="logo" class="cs-logo" class="img-responsive nh-hei"></a>
                </div>
                <ul class="nav navbar-nav navbar-right nv-mt" >
                    
                                        
                    <li><a href="/register" class="cs-nav-btn visible-lg"> Create Account</a></li>
                    <li><a href="/login" class="cs-nav-btn cs-responsive-menu"><span>Sign In</span><i class="icon icon-User " aria-hidden="true"></i></a></li>
                                    </ul>
            </div>
        </div>
        <!-- /TOP BAR -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle offcanvas-toggle pull-right brbcfl" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                    <span class="sr-only">Toggle navigation</span>
                    <span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </span>
                </button>
            </div>
            <div class="navbar-offcanvas navbar-offcanvas-touch" id="js-bootstrap-offcanvas">

                <ul class="nav navbar-nav navbar-left navbar-main myheader">

                    <li  ><a href="/home">Home</a></li>
                    <li  > <a href="/practice-exams">Practice Exams</a></li>
                    <li  ><a href="/LMS/all-categories">LMS</a></li>
                    <li  ><a href="/site/courses">Courses</a></li>
                    <li  ><a href="/site/pattren">Pattern</a></li>
                    <li  ><a href="/site/pricing">Pricing</a></li>
                    <li  ><a href="/site/syllabus">Syllabus</a></li>
                    
                    <li  ><a href="/site/about-us">About Us</a></li>

                    <li  ><a href="/contact-us">Contact Us</a></li>

                    
                    
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> More <span class="caret"></span></a>

                        <ul class="dropdown-menu">
                                                                                    <li><a href="/page/why-us" alt="Why us?"> Why us? </a></li>
                                                            <li><a href="/page/our-mission-1" alt="Our Mission"> Our Mission </a></li>
                                                    

                        <li><a href="/blogs" alt="Blogs"> Blogs </a></li>

                        <li><a href="/faqs" alt="FAQs"> FAQS </a></li>


                        

                        </ul>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- /NAVIGATION -->



      
<style type="text/css">
  /*Demo Credentials */
.cf-sty{
  margin-top: 180px;
}
.cf-styphead{
  max-width: 700px; padding:30px; 
}
.login-content {
    position: relative;
}
.login-user-details {
    display: none;
}
.back-image{
  background-image: url(/images/login-bg.png);background-repeat: no-repeat;background-color: #f8fafb;
}
.mg-left{
  margin-left:150px;
.mg-center{
  margin-left:auto;
}.mg-leftt{
  margin-left: 75px;
}
@media(min-width:768px) {
    .login-user-details {

        background-color: #d9edf7;
        padding: 15px 15px;
        display: block;
    }
    .login-user-details li {
        text-align: center;
        font-size: 18px;
    }
    .login-user-details li.title {
        color: #44a1ef;
        margin-bottom: 10px;
        font-weight: bold;
    }
    .login-user-details li + li {
        margin-top: 5px;
    }
    .login-user-details li a {
        padding: 5px 10px;
        display: block;
        text-decoration: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .login-user-details li a.positive {
        border: 1px solid #44a1ef;
        background: #44a1ef;
        color: #fff;
    }
    .login-user-details li a:hover {
        color: #44a1ef;
        background: #FFF;
        border-color: #44a1ef;
    }
}
@media(min-width:1367px) {
    .login-user-details {
        top: 280px;
    }
</style>


       <!-- Login Section -->
       <div  class="back-image">
    <div class="container">
        <div class="row cs-row cf-sty">


            <div class="col-md-12">



                <div class="cs-box-resize  login-box row cf-styphead" >

                  
                                      <div class="col-sm-6 mg-left" >
                      



                 @if ($record->is_verified == 1) 
                 
                 <h4 class="text-center login-head">Registrasi Berhasil</h4>
                    <div class="alert alert-info ">
                        <strong class="mg-leftt">Silahkan login <br></strong>
                    </div>
                        <a href="{{ url('login') }}" class="btn btn-primary mg-leftt">Login</a>  
                 @else
                 
                 <h4 class="text-center login-head">Registrasi Gagal</h4>
                    <div class="alert alert-info">
                        <strong class="mg-center">Silahkan klik ulang aktivasi code Anda. Cek pada email<br></strong>
                    </div>
                        <a href="{{ env('APP_URL') }}" class="btn btn-primary btn-lg mg-leftt">Cek Email</a>
                @endif
                 
                   

                         
                    
                    </div>
        </div>
        <br>
        

  <div class="col-sm-1" >
  </div>

 


            </div>
        </div>
    </div>
    <!-- Login Section -->


  <!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">

  <div class="modal-dialog">

  <form method="POST" action="http://127.0.0.1:8000/users/forgot-password" accept-charset="UTF-8" name="passwordForm" novalidate="" class="loginform"><input name="_token" type="hidden" value="CytWJntkQF67pg6cMakyjOYJ4AQQvYdTMbKbocEQ">

    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Forgot Password</h4>

      </div>

      <div class="modal-body">

        <div class="form-group">
          <label>Email Address</label>





          <input class="form-control" ng-model="email" required="true" placeholder="Email"  name="email" type="email">

  <div class="validation-error" ng-messages="passwordForm.email.$error" >

    <p ng-message="required">This Field Is Required</p>

    <p ng-message="email">Please Enter Valid Email</p>

  </div>



      </div>

      </div>

      <div class="modal-footer">

      <div class="pull-right">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary" ng-disabled='!passwordForm.$valid'>Submit</button>

        </div>

      </div>

    </div>

  </form>

  </div>

</div>
</div>



    <style>
    .ft-hei{
        height: 75px;
    }
</style>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div >
                        <img src="/uploads/settings/4xtxWTHg9xmyQPk.png" alt="logo" class="img-responsive ft-hei">
                    </div>
                 
                    <h4 class="cs-footer-title">Follow Us On</h4>
                                        <ul class="cs-social-share">
                        <li><a href="https://www.facebook.com/" target="_blank" class="brand-facebook"><i class="fa brand-color fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" target="_blank" class="brand-twitter"><i class="fa brand-color fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/discover" target="_blank" class="brand-pinterest"><i class="fa brand-color fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <h4 class="cs-footer-title">Need Help?</h4>
                            <ul class="cs-footer-links">
                                <li><a href="/practice-exams">Practice Exams</a></li>
                                <li><a href="/LMS/all-categories">LMS</a></li>
                                <li><a href="/site/about-us">About Us</a></li>
                                <li><a href="/contact-us">Contact Us</a></li>
                                <li><a href="/site/terms-conditions">Terms And Conditions</a></li>
                                <li><a href="/site/privacy-policy">Privacy And Policy</a></li>
                            </ul>
                        </div>
                      
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">

                    <h4 class="cs-footer-title">Email Newsletter</h4>
                   
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Address" id="email1" required>
                        </div>

                    <button class="btn btn-primary btn-shadow btn-block"  >Subscribe</button>
                   
                </div>
            </div>
        </div>
    </footer>
    <div class="cs-copyrights">
        <div class="container">
            &copy;  Copyright © 2009 - 2019  DigiSamaritan .  All Rights Reserved.
        </div>
    </div>
    



</body>

</html>
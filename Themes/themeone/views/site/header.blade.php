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
                    <a class="navbar-brand" href="{{URL_HOME }}"><img src="{{IMAGE_PATH_SETTINGS.getSetting('site_logo', 'site_settings')}}" alt="logo" class="cs-logo" class="img-responsive nh-hei"></a>
                </div>
               
                <ul class="nav navbar-nav navbar-right nv-mt" >
                    @if(Auth::check())

                    <li><a href="{{PREFIX}}" class="cs-nav-btn visible-lg"> {{getPhrase('dashboard')}}</a></li>
                    <li><a href="{{URL_USERS_LOGOUT}}" class="cs-nav-btn visible-lg"> {{getPhrase('logout')}}</a></li>
                    @else

                    @if(env('DEMO_MODE')) 
                    <li><a href="https://codecanyon.net/item/menorahoes-online-learning-and-examination-system/19361996" class="cs-nav-btn visible-lg yellow-buy brbc"> {{getPhrase('Buy_Now')}}</a></li>
                    @endif
                    
                    <li><a href="{{URL_USERS_REGISTER}}" class="cs-nav-btn visible-lg"> {{getPhrase('create_account')}}</a></li>
                    <li><a href="{{URL_USERS_LOGIN}}" class="cs-nav-btn cs-responsive-menu"><span>{{getPhrase('sign_in')}}</span><i class="icon icon-User " aria-hidden="true"></i></a></li>
                    @endif
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

                    <li {{ isActive($active_class, 'home') }} ><a href="{{ URL_HOME }}">{{getPhrase('home')}}</a></li>
                    <li {{ isActive($active_class, 'practice_exams') }} > <a href="{{ URL_VIEW_ALL_PRACTICE_EXAMS }}">{{getPhrase('practice_exams')}}</a></li>
                    <li {{ isActive($active_class, 'lms') }} ><a href="{{ URL_VIEW_ALL_LMS_CATEGORIES }}">LMS</a></li>
                    <li {{ isActive($active_class, 'courses') }} ><a href="{{ URL_VIEW_SITE_COURSES }}">{{getPhrase('courses')}}</a></li>
                    <li {{ isActive($active_class, 'pattren') }} ><a href="{{ URL_VIEW_SITE_PATTREN }}">{{getPhrase('pattern')}}</a></li>
                    <li {{ isActive($active_class, 'pricing') }} ><a href="{{ URL_VIEW_SITE_PRICING }}">{{getPhrase('pricing')}}</a></li>
                    <li {{ isActive($active_class, 'syllabus') }} ><a href="{{ URL_VIEW_SITE_SYALLABUS }}">{{getPhrase('syllabus')}}</a></li>
                    {{-- <li {{ isActive($active_class, 'practice_exams') }} ><a href="{{ SITE_PAGES_PRIVACY }}">{{ getPhrase('privacy_and_policy') }}</a></li>
                    <li {{ isActive($active_class, 'practice_exams') }} ><a href="{{ SITE_PAGES_TERMS }}">{{getPhrase('terms_and_conditions')}}</a></li> --}}
                    <li {{ isActive($active_class, 'about-us') }} ><a href="{{ SITE_PAGES_ABOUT_US }}">{{getPhrase('about_us')}}</a></li>

                    <li {{ isActive($active_class, 'contact-us') }} ><a href="{{ URL_SITE_CONTACTUS }}">{{getPhrase('contact_us')}}</a></li>

                    @php
                    $pages = \App\Page::where('status', 1)->get();
                    @endphp

                    
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{getPhrase('more')}} <span class="caret"></span></a>

                        <ul class="dropdown-menu">
                        @if (count($pages)>0)
                            @foreach ($pages as $page)
                                <li><a href="{{URL_PAGE}}{{$page->slug}}" alt="{{$page->name}}"> {{$page->name}} </a></li>
                            @endforeach
                        @endif


                        <li><a href="{{URL_HOME_BLOGS}}" alt="Blogs"> {{getPhrase('blogs')}} </a></li>

                        <li><a href="{{URL_FAQS}}" alt="FAQs"> {{strtoupper(getPhrase('faqs'))}} </a></li>


                        

                        </ul>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- /NAVIGATION -->
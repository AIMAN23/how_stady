<!DOCTYPE html>
{{-- <html lang="zxx" class="no-js"> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
   {{-- start --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            {{-- config('app.name', 'Laravel') --}}
            {{__('lang.NotesApp')}}
        </title>

        <!-- Scripts -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        
        <!-- app.css -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- end --}}
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ url('img/logo.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    {{-- <meta charset="UTF-8"> --}}
    <!-- Site Title -->
    {{-- <title>Dope - Creative Multipurpose HTML Template</title> --}}

    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet"> --}}

   <!--CSS ============================================= -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

@php
    $dir = (app()->getLocale()=='ar') ? 'rtl' : 'lte'; 
    @endphp

<body>

        <!-- Preloader -->
        {{-- <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div> --}}

        <!-- Start header section -->
        <header class="header-area" id="header-area">
            <div class="dope-nav-container breakpoint-off">
                <div dir="{{  $dir }}" class="container">
                    <div class="row">
                        <!-- dope Menu -->
                        <nav class="dope-navbar justify-content-between" id="dopeNav">

                            <!-- Logo -->
                            <a class="text-uppercase nav-brand"  href="{{ route('welcome') }}" style="color: #000;height:100%;">
                                    <img src="{{ url('img/logo3.png') }}" height="100%" alt="{{ __('lang.NotesApp') }}">
                            </a>

                            <!-- Navbar Toggler -->
                            <div class="dope-navbar-toggler">
                                <span class="navbarToggler">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                                <div class="algnt-left">
                                    <a href="#">{{ __('lang.NotesApp') }}</a>
                                </div>
                            </div>

                            <!-- Menu -->
                            <div class="dope-menu">

                                <!-- close btn -->
                                <div class="dopecloseIcon">
                                    <div class="cross-wrap">
                                        <span class="top"></span>
                                        <span class="bottom"></span>
                                    </div>
                                </div>

                                <!-- Nav Start -->
                                <div class="dopenav">
                                    <ul id="nav">
                                        @include('includes.li')
                                        <li>
                                            <a href="#">{{ __('lang.lang') }}</a>
                                            <ul class="dropdown">
                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li > <!-- <li class="list-group-item"> -->
                                                    <a  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Nav End -->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header section -->
        
        <!-- Start banner section -->
        <section class="banner-section relative section-gap-full" id="banner-section">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div dir="{{ $dir }}" class="col-md-6 banner-left">
                        <h1 class="text-uppercase">{{ __('lang.welcome.hi') }}</h1>
                        <p>{{ __('lang.welcome.descrption')}} </p>
                        <a class="video-btn primary-btn" href="#login">{{ __('lang.Login') }}</a>
                    </div>
                    <div class="col-md-6 banner-right text-center">
                        <img class="img-fluid" src="img/screen1.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner section -->
                
        <!-- Start page-top-banner section -->
        <section id="login" dir="{{ $dir }}"  class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row section-gap-half">
                    <div class="col-lg-12 text-center">
                        <h1>{{ __('lang.Login') }}</h1>
                        {{-- <h4>product</h4> --}}
                    </div>
                </div>
                <div class="align-items-center">
                    <form method="POST" action="{{ route('switch.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="usercode" class="col-md-3 col-form-label text-md-right">
                                <h3 class="text-center">{{ __('lang.usre tayp') }}</h3>
                            </label>
                            
                            
                            <div class="col-md-6">
                                <div class="input-group input-group-sm">
                                    <select id="usercode" class="form-control" name="tayp-login">
                                        <option value="nell" selected>{{ __('lang.usre tayp') }}</option>
                                        <option value="student">{{ __('lang.Student') }}</option>
                                        <option value="pareent">{{ __('lang.Parent') }}</option>
                                        <option value="teacher">{{ __('lang.Teacher') }}</option>
                                        <option value="supervisor">{{ __('lang.Supervisor') }}</option>
                                        <option value="secretary">{{ __('lang.Secretary') }}</option>
                                        <option value="financial">{{ __('lang.Financial') }}</option>
                                        <option value="specialist">{{ __('lang.Specialist') }}</option>
                                        <option value="admin">{{ __('lang.Admin') }}</option>
                                        <option value="agent">{{ __('lang.Agent') }}</option>
                                        <option value="manager">{{ __('lang.Manager') }}</option>
                                    </select>
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-info btn-flat">
                                            {{ __('lang.welcome.next') }}
                                        </button>
                                    </span>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="col-md-3 offset-md-4">
                                    <button type="submit" class="btn btn-primary" >
                                            {{ __('lang.welcome.next') }}
                                    </button>
                                </div>
                            </div> --}}
                        </div>

                        

                    
                        
                    </form>                
                </div>
            </div>
        </section>
        <!-- End about-top-banner section -->


        <!-- Start about section -->
        <section style=" text-align:{{ $dir == 'rtl'?'right':'' }};" class="about-section section-gap-full relative" id="about-section">
            <div dir="{{  $dir }}" class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-12 about-left">
                        <img class="img-fluid" src="img/app-img.png" alt="">
                    </div>
                    <div class="col-lg-5 col-md-7 about-right">
                        <h3>{{ __('lang.welcome.What Is Dope App?') }}</h3>
                        <h1>The Most Beautiful Theme For Your App</h1>
                        <ul>
                            <li class="d-flex">
                                <div class="icon ml-3">
                                    <span class="ti-layout-media-center-alt"></span>
                                </div>
                                <div class="details">
                                    <h4>Retina Ready</h4>
                                    <p>
                                        {{__('lang.welcome.descrption')}}
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="icon ml-3">
                                    <span class="ti-crown"></span>
                                </div>
                                <div class="details">
                                    <h4>Premium Quality</h4>
                                    <p>
                                        A wonderful serenity has taken possession of my entire soul, like these sweet
                                        mornings of spring which I enjoyed.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="icon ml-3">
                                    <span class="ti-headphone-alt"></span>
                                </div>
                                <div class="details">
                                    <h4>Excellent Support</h4>
                                    <p>
                                        A wonderful serenity has taken possession of my entire soul, like these sweet
                                        mornings of spring which I enjoyed.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="floating-shapes">
                <span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'>
                    <img src="img/shape/fl-shape-1.png" alt="">
                </span>
                <span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'>
                    <img src="img/shape/fl-shape-2.png" alt="">
                </span>
                <span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'>
                    <img src="img/shape/fl-shape-3.png" alt="">
                </span>
                <span data-parallax='{"x": -20, "y": 180}'>
                    <img src="img/shape/fl-shape-4.png" alt="">
                </span>
                <span data-parallax='{"x": 300, "y": 70}'>
                    <img src="img/shape/fl-shape-5.png" alt="">
                </span>
                <span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'>
                    <img src="img/shape/fl-shape-6.png" alt="">
                </span>
                <span data-parallax='{"x": 180, "y": 10, "rotateZ":2000}'>
                    <img src="img/shape/fl-shape-7.png" alt="">
                </span>
                <span data-parallax='{"x": 60, "y": -100}'>
                    <img src="img/shape/fl-shape-9.png" alt="">
                </span>
                <span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'>
                    <img src="img/shape/fl-shape-10.png" alt="">
                </span>
            </div>
        </section>
        <!-- End about section -->

        <!-- Start contact section -->
        <section class="contact-section contact-page-section padding-top-120" id="contact-section">
            <div class="container">
                <div class="row address-wrap justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6 single-address-col">
                        <div class="div">
                            <i class="ti ti-mobile"></i>
                            <p><br>+967772540888</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 single-address-col">
                        <div class="div">
                            <i class="ti ti-map-alt"></i>
                            <p>1234 hail <br> sana'a,yemen</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 single-address-col">
                        <div class="div">
                            <i class="ti ti-email"></i>
                            <p>alyosofi36@gmail.com<br>howstady0@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center form-row">
                    <div class="col-lg-9">
                        <form id="contact-form" action="#">
                            <div class="row contact-form-wrap justify-content-center">
                                <div class="col-md-6 contact-name form-col">
                                    <input name="name" id="name" class="form-control" type="text" placeholder="Name*"
                                        onfocus="this.placeholder=''" onblur="this.placeholder='Name*'">
                                </div>
                                <div class="col-md-6 contact-email form-col">
                                    <input name="mail" id="mail" class="form-control" type="email" placeholder="E-mail*"
                                        onfocus="this.placeholder=''" onblur="this.placeholder='Email*'">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="comment" id="comment" class="form-control" rows="8" placeholder="Message"
                                        onfocus="this.placeholder=''" onblur="this.placeholder='Message*'"></textarea>
                                </div>
                                <input type="submit" class="primary-btn" value="Send Message" id="submit-message">
                                <div id="msg" class="message"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End contact section -->

        <!-- Start footer section -->
        <footer class="footer-section section-gap-half">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 footer-left">
                        <a href="#">
                            <h2 style="color:wheat">{{ __('lang.NotesApp') }}</h2>
                                {{-- <img src="img/logo-w.png" alt=""> --}}
                        </a>
                        <p class="copyright-text">&copy; 2020 {{ __('lang.NotesApp') }}
                            <i class="fa fa-heart" aria-hidden="true"></i> By
                            <a href="#" target="">{{ __('lang.NotesApp') }}</a>
                        </p>
                    </div>
                    <div class="col-lg-7">
                        <ul id="social">
                            <li>
                                <a target="_blank" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                        {{-- <ul class="footer-menu">
                            <li>
                                <a href="#">Affiliate Program</a>
                            </li>
                            <li>
                                <a href="#">Terms & Conditionss</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Refund Policy</a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer section -->
    
    
    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>

    <!--JS ============================================= -->
    {{-- start laravel ls --}}
        {{-- app js  --}}
        {{-- <script src="{{ asset('js/app.js') }}" type="text/javascript" ></script>         --}}
        {{-- CK Editor js --}}
        {{-- <script src="{{ asset('/vendor/unisharp/ckeditor_s/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script> --}}
    {{-- end laravel js  --}}
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.parallax-scroll.js') }}"></script>
    <script src="{{ asset('js/dopeNav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
            $(document).ready(function(){
                // $('#loader-wrapper').fadeOut(4000);
                // $('#loader-wrapper').remove();
            });
        </script>
</body>

</html>
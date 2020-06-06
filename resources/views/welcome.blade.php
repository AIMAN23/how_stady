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
            {{__('lang.namepro')}}
        </title>

        <!-- Scripts -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        
        <!-- app.css -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    {{-- end --}}
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
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

    <!--
CSS
============================================= -->

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
                            <a class="text-uppercase nav-brand"  href="{{ route('welcome') }}" style="color: #000;">
                                 {{ __('lang.NotesApp') }}{{--<imgsrc="img/logo.png" alt=""> --}}
                            </a>

                            <!-- Navbar Toggler -->
                            <div class="dope-navbar-toggler">
                                <span class="navbarToggler">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                                <div class="algnt-left">
                                    <a href="#">Aiman</a>
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
                                        @include('include\li')
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
        <!-- Start header section -->
        
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
            <div class="wave">
                <svg class="nectar-shape-divider" fill="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300"
                    preserveAspectRatio="none">
                    <path d="M 1000 299 l 2 -279 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path>
                    <path d="M 1000 286 l 2 -252 c -157 -43 -302 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -145.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 10.61 v 22.39 z"></path>
                    <path d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path>
                </svg>
            </div>
        </section>
        <!-- End banner section -->
        {{--         
            <!-- Start page-top-banner section -->
            <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row section-gap-half">
                        <div class="col-lg-12 text-center">
                            <h1>Product title</h1>
                            <h4>product</h4>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End about-top-banner section -->
         --}}

        <!-- Start featured section -->
       
            <section id="login" dir="{{ $dir }}" class="section">
                <div class="container">
                    <div class="section-title">
                        <br>
                        <h2 class="text-center">{{ __('lang.Login') }}</h2>
                    </div>
                    <div class="align-items-center">
                        <form method="POST" action="{{ route('switch.login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="usercode" class="col-md-3 col-form-label text-md-right">
                                    <h3 class="text-center">{{ __('lang.usre tayp') }}</h3>
                                </label>

                                <div class="col-md-6">
                                    <select id="usercode" class="form-control" name="tayp-login">
                                        <option value="nell" selected>{{ __('lang.usre tayp') }}</option>
                                        <option value="student">{{ __('lang.Student') }}</option>
                                        <option value="parent">{{ __('lang.Parent') }}</option>
                                        <option value="teacher">{{ __('lang.Teacher') }}</option>
                                        <option value="supervisor">{{ __('lang.Supervisor') }}</option>
                                        <option value="secretary">{{ __('lang.Secretary') }}</option>
                                        <option value="financial">{{ __('lang.Financial') }}</option>
                                        <option value="specialist">{{ __('lang.Specialist') }}</option>
                                        <option value="admin">{{ __('lang.Admin') }}</option>
                                        <option value="agent">{{ __('lang.Agent') }}</option>
                                        <option value="manager">{{ __('lang.Manager') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 offset-md-4">
                                        <button type="submit" class="btn" 
                                        style="
                                            background: #691cff;
                                            color:wheat;
                                        ">
                                                {{ __('lang.welcome.next') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            

                        
                            
                        </form>                
                    </div>
                </div>
            </section>
       
        <!-- End featured section -->

        <!-- Start testimonial section -->
        
        {{-- <section class="testimonial-section section-gap-full" id="testimonial-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 testimonial-left">
                    <h2>{{ __('lang.welcome.What People Says') }}</h2>
                        <p>
                            Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorperi.
                        </p>
                    </div>
                    <div class="col-lg-8 testimonial-right">
                        <div class="testimonial-carusel owtestimonial-carusell-carousel" id="">
                            <div class="single-testimonial item">
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.”
                                </p>
                                <div class="user-details d-flex flex-row align-items-center">
                                    <div class="img-wrap">
                                        <img src="img/avatar1.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4>Alice Johnson</h4>
                                        <p>Business Development</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial item">
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.”
                                </p>
                                <div class="user-details d-flex flex-row align-items-center">
                                    <div class="img-wrap">
                                        <img src="img/avatar2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4>Amber Mcdonald</h4>
                                        <p>Web Developer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial item">
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.”
                                </p>
                                <div class="user-details d-flex flex-row align-items-center">
                                    <div class="img-wrap">
                                        <img src="img/avatar3.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4>Rhonda Barnes</h4>
                                        <p>UI/UX Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial item">
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.”
                                </p>
                                <div class="user-details d-flex flex-row align-items-center">
                                    <div class="img-wrap">
                                        <img src="img/avatar1.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4>Alice Johnson</h4>
                                        <p>Business Development</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial item">
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.”
                                </p>
                                <div class="user-details d-flex flex-row align-items-center">
                                    <div class="img-wrap">
                                        <img src="img/avatar2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4>Amber Mcdonald</h4>
                                        <p>Web Developer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial item">
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.”
                                </p>
                                <div class="user-details d-flex flex-row align-items-center">
                                    <div class="img-wrap">
                                        <img src="img/avatar3.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <h4>Rhonda Barnes</h4>
                                        <p>UI/UX Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End testimonial section -->


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
                                        A wonderful serenity has taken possession of my entire soul, like these sweet
                                        mornings of spring which I enjoyed.
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
    {{-- 
            
            <!-- Start product-detials section -->
            <section class="product-detials-section section-gap-full">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 details-left">
                            <img class="img-fluid" src="img/portfolio4.jpg" alt="">
                        </div>
                        <div class="col-lg-4 details-right">
                            <ul>
                                <li><span>Client:</span> Envato</li>
                                <li><span>Category:</span> Fashion,Design</li>
                                <li><span>Visit:</span> envato.com</li>
                                <li><span>Date:</span> 01.09.2018</li>
                            </ul>
                            <p>                  
                                To shewing another demands to. Marianne property cheerful informed at striking at.
                            </p>
                            <p>
                                Received shutters expenses ye he pleasant. Drift as blind above at up. No up simple county stairs do should praise as. Drawings sir gay together landlord had law smallest. Formerly welcomed attended declared met say unlocked. Jennings outlived no dwelling denoting in peculiar.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End product-detials section -->
--}}
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

    <!--
JS
============================================= -->
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
</body>

</html>

{{-- @extends('layouts.app')

@section('content')
    <style type="text/css">
            html, body {
                    background-color: #fff;
                    color: #636b6f;
                    font-family: 'Nunito', sans-serif;
                    font-weight: 200;
                    height: 100vh;
                    margin: 0;
                }
    </style>
    <div class="">
        <div class="">
            <div class="">
                <div class="card">
                    <div class="card-header">{{__('lang.home')}}</div>

                    <div class="card-body">
            <div class="flex-center position-ref full-height">
            

                <div class="content">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="..." alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="..." alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="..." alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                    <div class="title m-b-md">
                        {{__('lang.home')}}
                    </div>
                    <audio src="Capriccio_in_B_flat_major,_BWV_992(1).mp3" controls=""></audio>
                    

                    <br><a class="btn btn-primary" href="{{ route('login') }}">{{ __('lang.Login') }}</a>
    <br>                <br><a class="btn btn-primary" href="{{ route('new') }}">{{ __('lang.Register') }}</a>
    <br>                <br><a class="btn btn-primary" href="{{ route('d') }}">{{ __('lang.dashbord') }}</a>
    <br>                <br><a class="btn btn-primary" href="{{ route('dashbord') }}">{{ __('lang.dashbord') }}</a>

                <div class="links">
                        <a href="\chart-line">chart-line</a>
                        <span><b><a href="{{route('back')}}">Back to Pages List ></a></b></span>
                    <!--    <a href="https://laravel-news.com">News</a>
                        <a href="https://blog.laravel.com">Blog</a>
                        <a href="https://nova.laravel.com">Nova</a>
                        <a href="https://forge.laravel.com">Forge</a>
                        <a href="https://vapor.laravel.com">Vapor</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>-->
                    </div> 
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
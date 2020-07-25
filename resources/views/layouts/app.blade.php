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
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

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

   <!--CSS============================================= -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @yield('style')

</head>

@php $dir = (app()->getLocale()=='ar') ? 'rtl' : 'lte'; @endphp
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
                                    {{--  --}}
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                    {{--  --}}
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
<div id="errors_and_sacsses" class="row justify-content-center">
    @include('includes.messages')    

 @yield('content')

    </section>
    <!-- End banner section -->

    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>

    <!-- Start footer section -->
    <footer class="footer-section section-gap-half">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 footer-left">
                    <a href="#">
                        <h2 style="color:wheat">{{ __('lang.NotesApp') }}</h2>
                            {{-- <img src="img/logo-w.png" alt=""> --}}
                    </a>
                    <p class="copyright-text">&copy; {{ date("y") }} {{ __('lang.NotesApp') }}
                        <i class="fa fa-heart" aria-hidden="true"></i> By
                        <a href="aimanz.com" target="_blank">aimanz.com</a>
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
    
    
    

   <!--JS============================================= -->
    {{-- start laravel js --}}
        {{-- app js  --}}
        <script src="{{ asset('js/app.js') }}" type="text/javascript" ></script>        
        {{-- CK Editor js --}}
        {{-- <script src="{{ asset('/vendor/unisharp/ckeditor_s/ckeditor.js') }}"></script> --}}
        {{-- <script>
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
    <script type="text/javascript">
        // now = new Date();
        // localtime = now.toString();
        // utctime = now.toGMTString();
        // document.write("<strong>Local time:</strong> " + localtime + "<br/>");
        // document.write("<strong>UTC time:</strong> " + utctime);
        </script>
        <script type="text/javascript">
            // now = new Date();
            // localtime = now.toString();
            // utctime = now.toGMTString();
            // document.write("<strong>Local time:</strong> "
            // + localtime + "<br/>");
            // document.write("<strong>UTC time:</strong> " + utctime);
            // hours = now.getHours();
            // mins = now.getMinutes();
            // secs = now.getSeconds();
            // document.write("<h1>");
            // document.write(hours + ":" + mins + ":" + secs);
            // document.write("</h1>");
        </script>
        <script>
            // جلب كود الهاتف حسب الدولة التي تم اختيارها
            function get_code(cur){
               if(cur.value!=''){ 
                var option = $('option:selected', cur).attr('code');  
                $('#country_code').val(option);
                $('.country_code').html(option);
               }else
                   $('.country_code').html('');
              //alert(option);    
            }
        </script>
        <script>
            $(document).ready(function(){
                // $('#loader-wrapper').fadeOut(4000);
                // $('#loader-wrapper').remove();
            });
        </script>
        @yield('script')
        @yield('ajax')
</body>

</html>

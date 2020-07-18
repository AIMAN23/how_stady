<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--title -->
        <title>{{__('lang.namepro')}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-token2" content="{!! csrf_token() !!}">
        <link rel="shortcut icon" href="{{ url('img/logo.png') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('lte/dist/css/lte.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Fonts laravel app-->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    </head>
    {{-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed"> --}}
    <body class="hold-transition layout-top-nav ">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="dope-navbar justify-content-between" id="dopeNav">

              <!-- Logo -->
              <a class="text-uppercase nav-brand"  href="{{ route('welcome') }}" style="color: #000;">
                      <img src="{{ url('img/logo.png') }}" height="33px" alt="{{ __('lang.NotesApp') }}">
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
                              {{-- <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif --}}
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
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->

            <!-- /.Main Sidebar Container -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                              
                                @yield('content-header')

                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    
                    @include('includes.messages')
                    @yield('content')
                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-white ">
                {{ 'eny' }} 
            </aside>
            <!-- /.control-sidebar -->
            <!-- Main Footer. -->
            <footer class="main-footer text-sm fixed-butom navbar-dark bg-a ">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    {{ __('lang.NotesApp') }}
                </div>
                <!-- Default to the left -->
                <strong>{{ __('lang.Copyright') }} &copy; {{ date('Y') }} <a href="#">howstudy.com</a>.</strong>{{('eny')}}
            </footer>          
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
            <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- SweetAlert2 -->
            <script src="{{ asset('lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
            <!-- AdminLTE for demo purposes -->
            {{-- <script src="{{ asset('lte/dist/js/demo.js') }}"></script> --}}
            <script>
            $(document).ready(function(){
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token2"]').attr('content')
                    }
                });
            });
            </script>
            @include('includes.swets-js')
            @yield('ajax')
    </body>
</html>

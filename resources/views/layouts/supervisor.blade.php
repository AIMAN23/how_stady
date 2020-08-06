
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
        {{-- data table css --}}
        <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
    <body class="hold-transition sidebar-mini sidebar-collapse  layout-navbar-fixed layout-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                    @yield('main-header-li-left')

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-language"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item text-center text-sm" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                            </a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                    <!-- <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        </div>
                    </div>
                    </form>
                -->

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    @guest(session('userguard'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route(session('userguard').'login') }}">{{ __('Login') }}</a>
                    </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route(session('userguard').'register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                    @else
                    
                    {{-- @{{ This will not be processed by Blade }} --}}
                    {{-- {!! Form::selectMonth('month', '6') !!} --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" 
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route(session('userguard').'.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    <li class="nav-item bg-c">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                    {{-- @yield('main-header-li-right') --}}
                    
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-light-primary elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}"
                        alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3"
                        style="opacity: .8" />
                    <span class="brand-text font-weight-light" data-widget="pushmenu">{{ __('lang.NotesApp') }}
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            {{-- <img src="{{ asset('lte/color/img-y.png') }}" class="img-circle elevation-2" alt="User Image"> --}}
                            {{-- 
                                $school
                                 يتم ارسال هاذا المتغير بعد تسجيل الدخول 
                                من الوظيفة الي اسمها 
                                HomeController@home()
                                --}}
                            <img src="{{ url('Images/school/'.session('school.logo') ) }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ session('school.name') ?? __('school name') }}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        {{-- <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column nav-compact nav-flat" data-widget="treeview" role="menu" data-accordion="false"> --}}
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                            {{-- @yield('sidebar-li') --}}
                            <li class="nav-item">
                                <a href="/"  target="s" class="">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        {{ __('supervisor.Dashboard') }}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                </ul></li>
                                    <li class="nav-item">
                                        <a href="#"  target="s"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('المعلمين_') }}</p>
                                        </a>
                                        <ul class="nav nav-treeview"></ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('_المراحل_الدراسية') }}</p>
                                        </a>
                                        <ul class="nav nav-treeview"></ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('_التحضير') }}</p>
                                        </a>
                                        <ul class="nav nav-treeview"></ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('_الملاحظات') }}</p>
                                        </a>
                                        <ul class="nav nav-treeview"></ul>
                                    </li>
                                {{-- </ul>
                            </li> --}}
                            
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
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
                {{-- <iframe src="" name="s" frameborder="1"> --}}
                <section class="content">
                    <div class="card" id="content_loud">
                        <div class="card-body">
                            @include('includes.messages')
                            @yield('content')
                        </div>
                    </div>
                </section>
            {{-- </iframe> --}}
            <style>
                iframe[name='s'] {
                        display: block;
                        width: 100%;
                        height:100vmax ;
                        border: none;
                    }
            </style>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-white ">
                <!-- Control sidebar content goes here -->
                 <div class="p-4 ">
                      {{--  <div class="card-header">
                          <h3 class="card-title">Application Buttons</h3>
                        </div>
                        <div class="card-body">
                          <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> --}}
                        <h3 class="bg-box bg-center bg-gradient-success">{{ "المراحل الدراسية" }}</h3>
                        @if (session('super.levels'))
                        @foreach (session('super.levels') as $level)
                        <a class="btn btn-sm btn-app">
                            <i class="fas fa-user-cog"></i> {{ $level->langname() }}
                           
                        </a>
                        {{-- @foreach ($level->subjctes  as $subjctes)
                        {{ $subjctes->name }} <br>
                        {{ $subjctes->teacher->name }} <hr>

                        @endforeach --}}
                        @endforeach
                        @endif
                        <h3 class="bg-box bg-center bg-gradient-success">{{ "المراحل الدراسية" }}</h3>
                          
                          <a class="btn btn-sm btn-app">
                            <i class="fas fa-user-lock"></i> Edit
                          </a>
                          <a class="btn btn-sm btn-app">
                            <i class="fas fa-user-friends"></i> Play
                          </a>
                          <a class="btn btn-sm btn-app">
                            <i class="fas fa-group"></i> Pause
                          </a>
                          <a class="btn btn-sm btn-app">
                            <i class="fas fa-save"></i> Save
                          </a>
                          <a class="btn btn-sm btn-app">
                            <span class="badge bg-warning">3</span>
                            <i class="fas fa-bullhorn"></i> Notifications
                          </a>
                          <a class="btn btn-sm btn-app">
                            <span class="badge bg-success">300</span>
                            <i class="fas fa-barcode"></i> Products
                          </a>
                          <a class="btn btn-sm btn-app">
                            <span class="badge bg-purple">891</span>
                            <i class="fas fa-users"></i> Users
                          </a>
                          <a class="btn btn-sm btn-app">
                            <span class="badge bg-teal">67</span>
                            <i class="fas fa-inbox"></i> Orders
                          </a>
                          <a class="btn btn-sm btn-app">
                            <span class="badge bg-info">12</span>
                            <i class="fas fa-envelope"></i> Inbox
                          </a>
                          <a class="btn btn-sm btn-app">
                            <span class="badge bg-danger">531</span>
                            <i class="fas fa-heart"></i> Likes
                          </a>
                        {{-- </div>
                        <!-- /.card-body -->--}}
                </div> 
            </aside>
            <!-- /.control-sidebar -->
            <!-- Main Footer. -->
            <footer class="main-footer text-sm fixed-butom navbar-dark bg-a ">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    {{ __('lang.NotesApp') }}
                </div>
                <!-- Default to the left -->
                <strong>{{ __('lang.Copyright') }} &copy; {{ date('Y') }} <a href="#">aimanz.com</a>.</strong>{{('eny')}}
            </footer>
            {{-- <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.5
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer> --}}
            <!-- /.Main Footer. -->

          
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
            <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- DataTables -->
            <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
            <!-- overlayScrollbars -->
            <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
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

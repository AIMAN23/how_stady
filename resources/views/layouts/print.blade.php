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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/lte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Fonts laravel app-->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <style>
        td {
        background-color: honeydew;
        background-image: url("{{ url('img/card-1-L-new-logo.png') }}");
        background-image: url("{{ asset('img/card-123-no-line-nwe-logo-2-1.png') }}");
        
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        width: 8.5cm;
        height: 5cm;
        /* text-align: center; */
    }
    .tdx{
      background-color: honeydew;
      width: 20cm;
      /* height: 5cm; */
    }
        </style>
  </head>

  {{-- <body style="background: #eee;width: 20.9cm;"> --}}
      {{-- <body style="width: 18.46cm;height: 26.96cm ; margin: 0cm;margin-left: auto" > --}}
      <body style="width: 20cm; margin: 0cm;margin-left: auto;margin-right: auto;" >
    {{-- <center> --}}
    <div class="wrapper center" style="width: 20cm;height: 29cm;">
      <!-- Main content -->
      <section class="content" >
          <div class="container-fluid">
            <div class="">
              <div class="">
                 @yield('content')
              </div>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    {{-- </center> --}}

    <script type="text/javascript">
      // window.addEventListener("load", window.print());
    </script>
  </body>

</html>
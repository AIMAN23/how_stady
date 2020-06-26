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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- end --}}
    <!-- Mobile Specific Meta -->
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ url('img/fav.png') }}">
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
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"> --}}

</head>

@php
    $dir = (app()->getLocale()=='ar') ? 'rtl' : 'lte'; 
    @endphp
    <style>
    td {
    background-color: honeydew;
    /* background-image: url('{{ url('images/card-1-L-new-logo.png') }}'); */
    background-image: url('{{ url('images/card-123-no-line-nwe-logo-2-1.png') }}');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    width: 8.5cm;
    height: 5cm;
    /* text-align: center; */
}
    </style>

{{-- <body style="width: 21cm;height: 29.5cm ; margin: 1.27cm;background-color: maroon;" > --}}
<body style="width: 18.46cm;height: 26.96cm ; margin: 0cm;margin-left: auto" >
{{-- <table style="background-color: cadetblue;width: 100%;height: 100%"> --}}

  <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
    <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; "> {{-- style="background-color: mediumblue;" --}}
      <tr style="background-color:gainsboro;">
        <td >
         <div class="row p-0 m-0 text-sm">
           <div class="col-6 bg- p-0 " style="text-align: right" dir="rtl">
              {{-- {{ $school->name ?? 'scomana'}} <br>  --}}
              
              <small class="pl-3 pr-3">{{ __('lang.manager') }}</small>
              <br>
              <b> {{ $manager->name ?? 'ايمن نجيب اليوسفي' }}</b>
              <br>
            <small>{{ __('no') }}:{{ $manager->no ?? 'x2no' }}</small>
            <br>
           </div>
           <div class="col-6">
              <img src="{{ url('Images/school/1592181233.png') }}" class="img-circle w-50 elevation-2 float-right" alt="User Image">
           </div>
           {{-- <div class="col-3">ss</div>
           <div class="col-3">dd</div> --}}

         </div>
         <hr><small>{{ $manager->uuid ?? 'x2uuid' }}</small>
        </td>
        <th></th>
        <td>2</td>
      </tr>
    </table>
  </div>
  <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
    <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; "> {{-- style="background-color: mediumblue;" --}}
      <tr style="background-color:gainsboro;">
        <td >
          <table style="width: 100% ;height: 100%">
            <tr>
              <th>1</th>
              <th>2</th>
              <th>3</th>
            </tr>
            <tr>
              <th>11</th>
              <th>21</th>
              <th>31</th>
            </tr>
          </table>
        </td>
        <th ></th>
        <td >2</td>
      </tr>
    </table>
  </div>
  <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
    <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; "> {{-- style="background-color: mediumblue;" --}}
      <tr style="background-color:gainsboro;">
        <td >
          <table style="width: 100% ;height: 100%">
            <tr>
              <th>1</th>
              <th>2</th>
              <th>3</th>
            </tr>
            <tr>
              <th>11</th>
              <th>21</th>
              <th>31</th>
            </tr>
          </table>
        </td>
        <th ></th>
        <td >2</td>
      </tr>
    </table>
  </div>
  <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
    <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; "> {{-- style="background-color: mediumblue;" --}}
      <tr style="background-color:gainsboro;">
        <td >
          <table style="width: 100% ;height: 100%">
            <tr>
              <th>1</th>
              <th>2</th>
              <th>3</th>
            </tr>
            <tr>
              <th>11</th>
              <th>21</th>
              <th>31</th>
            </tr>
          </table>
        </td>
        <th ></th>
        <td >2</td>
      </tr>
    </table>
  </div>
  <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
    <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; "> {{-- style="background-color: mediumblue;" --}}
      <tr style="background-color:gainsboro;">
        <td >
          <table style="width: 100% ;height: 100%">
            <tr>
              <th>1</th>
              <th>2</th>
              <th>3</th>
            </tr>
            <tr>
              <th>11</th>
              <th>21</th>
              <th>31</th>
            </tr>
          </table>
        </td>
        <th ></th>
        <td >2</td>
      </tr>
    </table>
  </div>
  <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
    <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; "> {{-- style="background-color: mediumblue;" --}}
      <tr style="background-color:gainsboro;">
        <td >
          <table style="width: 100% ;height: 100%">
            <tr>
              <th>1</th>
              <th>2</th>
              <th>3</th>
            </tr>
            <tr>
              <th>11</th>
              <th>21</th>
              <th>31</th>
            </tr>
          </table>
        </td>
        <th ></th>
        <td >2</td>
      </tr>
    </table>
  </div>
  <div style="padding-top: 0.2cm;padding-bottom: 0.2cm; margin: 0 .365cm 0 .365cm;">
    <table style="border-top:black dashed 1px;border-bottom:black dashed 1px; "> {{-- style="background-color: mediumblue;" --}}
      <tr style="background-color:gainsboro;">
        <td >
          <table style="width: 100% ;height: 100%">
            <tr>
              <th>1</th>
              <th>2</th>
              <th>3</th>
            </tr>
            <tr>
              <th>11</th>
              <th>21</th>
              <th>31</th>
            </tr>
          </table>
        </td>
        <th ></th>
        <td >2</td>
      </tr>
    </table>
  </div>





  {{-- <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
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
     --}}
</body>

</html>
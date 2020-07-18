@extends('layouts.admin')
@section('content')
  <section class="content">
    <div class="container col-md-8">
      <div class="card card-widget widget-user">
        <div class="widget-user-header bg-c text-white">
            <h3 class="widget-user-username">{{('قم بتغير كلمة المرور')}}</h3>
            <!-- <h5 class="widget-user-desc">{{('المرحلة')}} &amp; {{('الشعبة')}}</h5> -->
          </div>


        <div id="wrapper" class="clearfix">
          <!-- preloader -->



          <!-- Header -->












          <div class="main-content">

            <br>
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <!--<div class="panel panel-default">-->
                  <!--<div class="panel-heading">Register</div>-->

                  <!--<div class="panel-body">-->

                  <div class="row">
                    <div class="col-md-8 col-xs-12 col-sm-6">
                      <div class="alert alert-danger" style="display:none;">
                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-xs-12 col-sm-6">
                      <div class="alert alert-success" style="display:none;">
                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                      </div>
                    </div>
                  </div>

                  
                  <br>
                  <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                  </form>

                  <!--</div>-->
                  <!--</div>-->
                </div>
              </div>
            </div> <!-- END of Container -->
            <!-- Footer -->




          </div>
          <!--POPUP MODAL-->
          <script>
            function get_code(cur) {
              if (cur.value != '') {
                var option = $('option:selected', cur).attr('code');
                $('#country_code').val(option);
                $('.country_code').html(option);
              } else
                $('.country_code').html('');
              //alert(option);    
            }
            function myFunction() {
              var x = document.getElementById("myTopnav");
              if (x.className === "topnav") {
                x.className += " responsive";
              } else {
                x.className = "topnav";
              }
            }
          </script>


        </div>

      </div>
    </div>
  </section>
@endsection

@section('ajax')
{{--  --}}
@endsection
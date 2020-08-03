@extends('layouts.admin')

@section('content-header')
<h1>{{ __('admin.Profile') }}</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- <div class="col-md-3">
                    
                </div> -->
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#Profile"
                                data-toggle="tab">{{ __('admin.Profile') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#About"
                                data-toggle="tab">{{ __('admin.About Me') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings"
                                data-toggle="tab">{{ __('admin.setting') }}</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">

                        <!-- 1 .tab-pane -->
                        <div class="active tab-pane" id="Profile">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('lte/dist/img/admin-school-128x128.jpg') }}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{ ('name') }}</h3>

                                    <p class="text-muted text-center">{{ ('role') }}</p>

                                    <!-- About Me Box -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ __('admin.image') }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <strong><i class="fas fa-book mr-1"></i>{{ __('Education') }}</strong>

                                            <p class="text-muted">
                                                B.S. in Computer Science from the University of Tennessee at Knoxville
                                            </p>

                                            <hr>

                                            <strong><i
                                                    class="fas fa-map-marker-alt mr-1"></i>{{ __('Location') }}</strong>

                                            <p class="text-muted">Malibu, California</p>

                                            <hr>

                                            <strong><i class="fas fa-pencil-alt mr-1"></i>{{ __('Skills') }}</strong>

                                            <p class="text-muted">
                                                <span class="tag tag-danger">UI Design</span>
                                                <span class="tag tag-success">Coding</span>
                                                <span class="tag tag-info">Javascript</span>
                                                <span class="tag tag-warning">PHP</span>
                                                <span class="tag tag-primary">Node.js</span>
                                            </p>

                                            <hr>

                                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Etiam fermentum enim neque.</p>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card => About Me Box -->

                                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- Profile Image /.card .card-primary .card-outline -->
                        </div>
                        <!-- 1/.tab-pane -->

                        <!-- 2 .tab-pane -->
                        <div class="tab-pane" id="About">
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
        <form method="POST" action="{{ route('admin.password.update',Auth::user()->id) }}">
            @csrf

            {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

            {{-- <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div> --}}

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
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
                            {{--  --}}
                            {{-- {{Form::file('post_image', ['class'=>'btn ' ]) }}
                            {!! Form::date('data', time()) !!}
                            {!! Form::label('J') !!} --}}
                        </div>
                        <!-- 2/.tab-pane -->

                        <!-- 3 .tab-pane -->
                        <div class=" tab-pane" id="settings">
                            <form id="register-form" method="POST" action="{{ route('admin.store', Auth::user()->id) }}"
                                novalidate="novalidate">
                                @csrf
                                {{-- name --}}
                                <fieldset>
                                    <legend>اسم المستخدم</legend>
                                    <div class="row">
                                        <div class="form-group col-6 col-md-3">
                                            <label for="name" class="control-label">Mask Name</label>
                                            <div class="elVal">
                                                <input type="text" name="name" id="name" maxlength="15" class="form-control"
                                                    placeholder="Mask Name" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                        
                        
                        
                                {{-- <!-- 
                                                                  -f_name 
                                                                  -p_name 
                                                                  -l_name --> --}}
                                <fieldset>
                                    <legend>الاسم الرباعي</legend>
                                    <div class="row">
                        
                                        <div class="form-group required col-6 col-md-3" aria-required="true">
                                            <label for="f_name" class="control-label">First Name</label>
                                            <div class="elVal">
                                                <input type="text" name="f_name" id="f_name" minlength="3" maxlength="15"
                                                    class="form-control @error('password') is-invalid @enderror" placeholder="First Name"
                                                    value="{{ auth::user()->f_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group required col-6 col-md-3" aria-required="true">
                                            <label for="p_name" class="control-label">Second Name</label>
                                            <div class="elVal">
                                                <input type="text" name="p_name" id="p_name" minlength="3" maxlength="15"
                                                    class="form-control @error('password') is-invalid @enderror" placeholder="Second Name"
                                                    value="{{ auth::user()->p_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group required col-6 col-md-3" aria-required="true">
                                            <label for="l_name" class="control-label">Third Name</label>
                                            <div class="elVal">
                                                <input type="text" name="l_name" id="l_name" minlength="3" maxlength="15"
                                                    class="form-control @error('password') is-invalid @enderror" placeholder="Third Name"
                                                    value="{{ auth::user()->l_name }}">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                        
                                {{-- <!--
                                                                  - nationality[] 
                                                                  - gender[M-F] 
                                                                  - birthdate --> --}}
                                <fieldset>
                                    <legend>{{('البيانات الشخصية')}}</legend>
                                    <div class="row">
                                        <div class="form-group required col-6  col-md-4" aria-required="true">
                                            <label for="nationality" class="control-label">Nationality</label>
                                            <div class="elVal">
                                                <select name="nationality" id="nationality"
                                                    class="form-control @error('password') is-invalid @enderror">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group required col-6 col-md-4" aria-required="true">
                                            <label for="gender" class="control-label">Gender</label>
                                            <div class="elVal">
                                                <select name="gender" id="gender" class="form-control @error('password') is-invalid @enderror">
                                                    <option value="1" @if( auth::user()->gender =="male" ) {{ "selected='selected'" }} @endif
                                                        >Male</option>
                                                    <option value="2" @if( auth::user()->gender =="female" ) {{ "selected='selected'" }} @endif
                                                        >Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group required col-6  col-md-4" aria-required="true">
                                            <label for="birthdate" class="control-label">Birth date</label>
                                            <div class="elVal">
                                                <!--<input type="text" name='dob' id="dob" class="form-control @error('password') is-invalid @enderror" placeholder="" readonly="true">-->
                                                <input type="date" name="birthdate" id="birthdate" value="{{ auth::user()->birthdate }}"
                                                    class="form-control @error('password') is-invalid @enderror">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                        
                                {{-- <!--
                                                                  - country 
                                                                  - cite 
                                                                  - street 
                                                                  - //zip --> --}}
                                <fieldset>
                                    <legend>{{('address')}}</legend>
                                    <!-- country -->
                                    <div class="row">
                                        <div class="form-group required col-6 col-md-4" aria-required="true">
                                            <label for="country" class="control-label">Country</label>
                                            <div class="elVal">
                                                <select name="country" id="country" class="form-control @error('password') is-invalid @enderror"
                                                    onchange="get_code(this)" aria-required="true" aria-invalid="false">
                        
                                                </select>
                                            </div>
                                        </div>
                                        <!-- cite -->
                                        <div class="form-group  col-6 col-md-4">
                                            <label for="cite" class="control-label">cite</label>
                                            <input id="cite" type="text" class="form-control " value="{{ auth::user()->address->cite  }}"
                                                name="cite" placeholder="City *" required="required">
                                        </div>
                                        <!-- street -->
                                        <div class="form-group  col-6 col-md-4">
                                            <label for="street" class="control-label">street</label>
                                            <input id="street" type="text" class="form-control " value="{{ auth::user()->address->street }}"
                                                name="street" placeholder="Area,Street,befor... *" required="required">
                                        </div>
                                        <!-- Zip -->
                                        <!-- <div class="form-group  col-6 col-md-4">
                                                                      <label for="zip" class="control-label">zip</label>
                                                                      <input id="zip" type="number" class="form-control " value="" name="zip" placeholder="Zip" maxlength="6" min="0" tabindex="0">
                                                                    </div> -->
                                    </div>
                                </fieldset>
                        
                                {{-- <!-- 
                                                                  -email 
                                                                  -confirmation_email 
                                                                  -phone_no 
                                                                  -mobileNumber 
                                                                  -country_code --> --}}
                                <fieldset>
                                    <legend>{{ ('Email - Phone Number') }}</legend>
                                    <div class="row">
                                        <div class="form-group required col-md-6" aria-required="true">
                                            <label for="email" class="control-label">Email</label>
                                            <div class="elVal">
                                                <input type="text" name="email" id="email" maxlength="50" value="{{ auth::user()->email }}"
                                                    class="form-control @error('password') is-invalid @enderror" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group required col-md-6" aria-required="true">
                                            <label for="email" class="control-label">Confirmation Email</label>
                                            <div class="elVal">
                                                <input type="text" name="confirmation_email" id="confirmation_email"
                                                    value="{{ auth::user()->email }}" maxlength="50"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Confirmation Email">
                                            </div>
                                        </div>
                                        <div class="form-group required col-md-6 elVal" aria-required="true">
                                            <label for="phone_no" class="control-label">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text country_code"></span>
                                                <input type="hidden" name="country_code" id="country_code" value="">
                                                <input type="hidden" name="mobile" id="mobile" value="">
                                                <input type="hidden" name="mobileNumber" id="mobileNumber" value="">
                                                <input type="text" name="phone_no" id="phone_no"
                                                    class="form-control @error('password') is-invalid @enderror" maxlength="15"
                                                    placeholder="Phone Number" data-inputmask="&quot;mask&quot;: &quot;(999) 999 999 999&quot;"
                                                    data-mask="" value="{{ Auth::user()->mobile }}">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                {{--  --}}
                                <!--  -->
                        
                        
                                {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}
                                {{-- @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                                {{-- <!-- Preferred Language --> --}}
                                {{-- <div class="row">
                                                                 
                                                                  <div class="form-group required col-6 col-md-6" aria-required="true">
                                                                    <label for="language" class="control-label">Preferred Language</label>
                                                                    <div class="elVal">
                                                                      <select name="language" id="language" class="form-control @error('password') is-invalid @enderror" aria-required="true"
                                                                        aria-invalid="false">
                                                                        <!--<option value="">Select Language</option>-->
                                                                        <option value="f32eddf5-08c7-492f-951f-1df7b2b491fb" selected="selected">Arabic</option>
                                                                        <option value="bb229187-d994-41c8-bfaa-b23e3e7c7190">English</option>
                                                                      </select>
                                                                    </div>
                                                                  </div>
                                                                </div> --}}
                                {{--  --}}
                                {{-- <!--  <div class="row">
                                                                  <div class="form-group required col-md-6" aria-required="true">
                                                                    <label for="subscription_name" class="form-control @error('password') is-invalid @enderror"
                                                                      style="background:#DFDED9;color:#471F45;font-size:25px;font-weight: bold;">الأمان
                                                                      التام</label>
                                                                  </div>
                                                                </div> --> --}}
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                                <input type="submit" name="seve">
                        
                            </form>
                        </div>
                        <!-- 3/.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</div><!-- /.container-fluid -->
@endsection
@section('ajax')
<script>
  {{--  --}}
  function get_code(cur) {
    if (cur.value != '') {
      var option = $('option:selected', cur).attr('code');
      $('#country_code').val(option);
      $('.country_code').html(option);
      $('#mobile').val(option);
    } else
      $('.country_code').html('');
    //alert(option);    
  }
  function set_code(){
      var code="{!! Auth::user()->address->zip !!}";
    var v=$("select").children('option');
    for(i=0;i<v.length-1;i++){
        if($(v[i]).attr('code')==code ){
            $(v[i]).attr('selected','selected');
            var c=$(v[i]).attr('code');
        }
    }
    $('#country_code').val(c);
      $('.country_code').html(c);
    $('#mobile').val(c);
  }
  {{--  --}}
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
    x.className += " responsive";
    } else {
    x.className = "topnav";
    }
  }
</script>
{{-- ready عند التحميل للصفحة --}}
<script>
 $(document).ready(function(){
  // e.preventDefault();
  
  
 


   var url="{{ route('get.Option.Country') }}";
   $.ajax({
            type:"get",
            // enctype: "multipart/form-data",
            url:url,
                    // data: formData,
                    // processData: false,
                    // contentType: 'JSON',
                    // cache: false,
            
            
            
            success:function(databack){
              
              $('#country').append(databack);
              $('#nationality').append(databack);
              set_code();
               // $('#tab').prepend(databack);
                // $('#'+id).html(databack);
                // $('#addcsv').attr("style");
                
                // console.log(databack);
            },
            error:function(xhr,status,error){
                console.log(error);
            }
        });
        
        });
</script>    
@endsection
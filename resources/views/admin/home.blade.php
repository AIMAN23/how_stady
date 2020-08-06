@extends('layouts.admin')

@section('content-header')
<h1>{{ __('admin.Profile') }}</h1>
@endsection

@section('content')
<div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-blue text-white" style="background: url('../dist/img/photo1.png') center center;">
            <h3 class="widget-user-username text-right">{{ auth()->user()->name }}</h3>
            <h5 class="widget-user-desc text-right">{{ __('lang.Admin') }}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="{{ asset('/lte/dist/img/userP-128x128.jpg') }}" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{ '' }}</h5>
                  <span class="description-text">{{ '' }}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{ '' }}</h5>
                  <span class="description-text">{{ '' }}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">{{ '' }}</h5>
                  <span class="description-text">{{ '' }}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
<div class="container-fluid">
    <div class="row">
        <!-- <div class="col-md-3">
                        
                    </div> -->
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link {{ $tab_pane_1 ?? '' }}" href="#Profile" data-toggle="tab">{{ __('admin.Profile') }}</a></li>
                        <li class="nav-item"><a class="nav-link {{ $tab_pane_2 ?? '' }}" href="#About" data-toggle="tab">{{ __('admin.About Me') }}</a></li>
                        <li class="nav-item"><a class="nav-link {{ $tab_pane_3 ?? '' }}" href="#settings" data-toggle="tab">{{ __('admin.setting') }}</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
    
                        <!-- 1 .tab-pane -->
                        <div class="{{ $tab_pane_1 ?? '' }} tab-pane" id="Profile">
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
    
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i>{{ __('Location') }}</strong>
    
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
                        <div class="{{ $tab_pane_2 ?? '' }} tab-pane" id="About">
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
    
                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                            <div class="col-md-6">
                                                <input id="email" type="hidden" name="email" value="{{ old('email') ?? Auth::user()->email }}" required autocomplete="email"> 
                                                <output id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') ?? Auth::user()->email }}" required
                                                    autocomplete="email">{{ auth()->user()->email }}</output>
    
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">{{ __('كلمة المرور الجديدة') }}</label>
    
                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password" autofocus>
    
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
    
                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">{{ __('تاكيد كلمة المرور') }}</label>
    
                                            <div class="col-md-6">
                                                {{--  --}}
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                                {{--  --}}
                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                {{--  --}}
                                            </div>
                                        </div>
    
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('حفظ كلمت المرور') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
    
                                    <!--</div>-->
                                    <!--</div>-->
                                </div>
                                {{-- --}}
                                {{-- {!! Form::file('post_image', ['class'=>'btn ' ]) !!}
                                                                    {!! Form::date('data', time()) !!}
                                                                    {!! Form::label('J') !!} --}}
                            </div>
                        </div>
                        <!-- 2/.tab-pane -->
    
                        <!-- 3 .tab-pane -->
                        <div class="{{ $tab_pane_3 ?? '' }} tab-pane" id="settings">
                            <form id="register-form" method="POST" action="{{ route('admin.store', Auth::user()->id) }}"
                                novalidate="novalidate">
                                @csrf
    
                                {{-- -name --}}
                                <fieldset>
                                    <legend>{{ "اسم المستخدم" }}</legend>
                                    <div class="row">
                                        <div class="form-group col-6 col-md-3">
                                            <label for="name" class="control-label">Mask Name</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <input type="text" name="name" id="name" maxlength="15"
                                                    class="form-control  @error('name') is-invalid @enderror"
                                                    placeholder="Mask Name" value="{{old('name')?? Auth::user()->name }}">
                                                {{--  --}}
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                {{--  --}}
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                {{-- -f_name-p_name-l_name --}}
                                <fieldset>
                                    <legend>الاسم الرباعي</legend>
                                    <div class="row">
    
                                        <div class="form-group required col-6 col-md-3" aria-required="true">
                                            <label for="f_name" class="control-label">First Name</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <input type="text" name="f_name" id="f_name" minlength="3" maxlength="15"
                                                    class="form-control @error('f_name') is-invalid @enderror"
                                                    placeholder="First Name"
                                                    value="{{old('f_name')?? auth::user()->f_name }}">
                                                {{--  --}}
                                                @error('f_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                {{--  --}}
                                            </div>
                                        </div>
                                        <div class="form-group required col-6 col-md-3" aria-required="true">
                                            <label for="p_name" class="control-label">Second Name</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <input type="text" name="p_name" id="p_name" minlength="3" maxlength="15"
                                                    class="form-control @error('p_name') is-invalid @enderror"
                                                    placeholder="Second Name"
                                                    value="{{old('p_name')?? auth::user()->p_name }}">
                                                {{--  --}}
                                                @error('p_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                {{--  --}}
                                            </div>
                                        </div>
                                        <div class="form-group required col-6 col-md-3" aria-required="true">
                                            <label for="l_name" class="control-label">Third Name</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <input type="text" name="l_name" id="l_name" minlength="3" maxlength="15"
                                                    class="form-control @error('l_name') is-invalid @enderror"
                                                    placeholder="Third Name"
                                                    value="{{old('l_name')?? auth::user()->l_name }}">
                                                {{--  --}}
                                                @error('l_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                {{--  --}}
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
    
                                {{--- nationality[] - gender[M-F] - birthdate --}}
                                <fieldset>
                                    <legend>{{('البيانات الشخصية')}}</legend>
                                    <div class="row">
                                        <div class="form-group required col-6  col-md-4" aria-required="true">
                                            <label for="nationality" class="control-label">Nationality</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <select name="nationality" id="nationality"
                                                    class="form-control @error('nationality') is-invalid @enderror">
                                                </select>
                                                {{--  --}}
                                                @error('nationality')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                {{--  --}}
                                            </div>
                                        </div>
                                        <div class="form-group required col-6 col-md-4" aria-required="true">
                                            <label for="gender" class="control-label">Gender</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <select name="gender" id="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                    <option value="1" @if( auth::user()->gender =="male" )
                                                        {{ "selected='selected'" }} @endif
                                                        >Male</option>
                                                    <option value="2" @if( auth::user()->gender =="female" )
                                                        {{ "selected='selected'" }} @endif
                                                        >Female</option>
                                                </select>
                                                {{--  --}}
                                                @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group required col-6  col-md-4" aria-required="true">
                                            <label for="birthdate" class="control-label">Birth date</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <input type="date" name="birthdate" id="birthdate"
                                                    value="{{old('birthdate')?? auth::user()->birthdate }}"
                                                    class="form-control @error('birthdate') is-invalid @enderror">
                                                {{--  --}}
                                                @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                {{--  --}}
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
    
                                {{-- - country - cite - street - //zip --}}
                                <fieldset>
                                    <legend>{{('العنوان')}}</legend>
                                    <!-- country -->
                                    <div class="row">
                                        <div class="form-group required col-6 col-md-4" aria-required="true">
                                            <label for="country" class="control-label">Country</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <select name="country" id="country"
                                                    class="form-control @error('country') is-invalid @enderror"
                                                    onchange="get_code(this)" aria-required="true" aria-invalid="false">
                                                </select>
                                                {{--  --}}
                                                @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- cite -->
                                        <div class="form-group  col-6 col-md-4">
                                            <label for="cite" class="control-label">cite</label>
                                            {{--  --}}
                                            <input id="cite" type="text"
                                                class="form-control @error('cite') is-invalid @enderror"
                                                value="{{old('cite')?? auth::user()->address->cite  }}" name="cite"
                                                placeholder="City *" required="required">
                                            {{--  --}}
                                            @error('cite')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- street -->
                                        <div class="form-group  col-6 col-md-4">
                                            <label for="street" class="control-label">street</label>
                                            {{--  --}}
                                            <input id="street" type="text"
                                                class="form-control @error('street') is-invalid @enderror"
                                                value="{{old('street')?? auth::user()->address->street }}" name="street"
                                                placeholder="Area,Street,befor... *" required="required">
                                            {{--  --}}
                                            @error('street')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        {{-- <!-- Zip --> --}}
                                        {{-- <div class="form-group  col-6 col-md-4">
                                                                                <label for="zip" class="control-label">zip</label>
                                                                                <input id="zip" type="number" class="form-control " value="" name="zip" placeholder="Zip" maxlength="6" min="0" tabindex="0">
                                                                            </div> --}}
                                    </div>
                                </fieldset>
    
                                {{-- -email -confirmation_email -phone_no -mobile -country_code --}}
                                <fieldset>
                                    <legend>{{ ('الايميل - رقم الهاتف') }}</legend>
                                    <div class="row">
                                        <div class="form-group required col-md-6" aria-required="true">
                                            <label for="email" class="control-label">Email</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <input type="text" name="email" id="email" maxlength="50"
                                                    value="{{old('email')?? auth::user()->email }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email">
                                                {{--  --}}
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group required col-md-6" aria-required="true">
                                            <label for="email" class="control-label">Confirmation Email</label>
                                            <div class="elVal">
                                                {{--  --}}
                                                <input type="text" name="confirmation_email" id="confirmation_email"
                                                    value="{{old('confirmation_email')?? auth::user()->email }}"
                                                    maxlength="50"
                                                    class="form-control @error('confirmation_email') is-invalid @enderror"
                                                    placeholder="Confirmation Email">
                                                {{--  --}}
                                                @error('confirmation_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group required col-md-6 elVal" aria-required="true">
                                            <label for="phone_no" class="control-label">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text country_code"></span>
                                                {{--  --}}
                                                <input type="hidden" name="country_code" id="country_code"
                                                    value="{{ old('country_code')?? '' }}">
                                                <input type="hidden" name="mobile" id="mobile"
                                                    value="{{ old('mobile')?? '' }}">
                                                <input type="hidden" name="mobileNumber" id="mobileNumber"
                                                    value="{{ old('mobileNumber')?? '' }}">
                                                {{--  --}}
                                                <input type="text" name="phone_no" id="phone_no"
                                                    class="form-control @error('mobile') is-invalid @enderror"
                                                    maxlength="15" placeholder="Phone Number"
                                                    data-inputmask="&quot;mask&quot;: &quot;(999) 999 999 999&quot;"
                                                    data-mask="" value="{{old('mobile')?? Auth::user()->mobile }}">
                                                {{--  --}}
                                                @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                {{--  --}}
                                <input type="submit" name="seve" value="{{'حفظ البيانات' }}" class="btn btn-sm btn-outline-primary">
                                {{--  --}}
                                <a class=" btn btn-sm btn-outline-primary" href="#Profile" data-toggle="tab">{{ __('admin.Profile') }}</a>
    
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


{{--  --}}
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
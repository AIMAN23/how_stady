@extends('layouts.agent')
@section('content')
  <section class="content">
    <div class="container">
      <div class="card card-widget widget-user">
        <div class="widget-user-header bg-c text-white">
          <h3 class="widget-user-username">{{('البيانات الشخصية')}}</h3>
          <!-- <h5 class="widget-user-desc">{{('المرحلة')}} &amp; {{('الشعبة')}}</h5> -->
        </div>
        <div id="wrapper" class="clearfix">
          <div class="main-content">
            <br>
            <div class="container">
              <div class="row">
                <div class="col-md-12 p-4">
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
                  <form id="register-form" method="POST" action="" novalidate="novalidate">
                    @csrf

                    {{-- <!-- 
                      -first_name 
                      -second_name 
                      -third_name 
                      -last_name --> --}}
                    <fieldset>
                      <legend>الاسم الرباعي</legend>
                      <div class="row">
                        <div class="form-group required col-6 col-md-3" aria-required="true">
                          <label for="first_name" class="control-label">First Name</label>
                          <div class="elVal">
                            <input type="text" name="first_name" id="first_name" minlength="3" maxlength="15"
                              class="form-control" placeholder="First Name">
                          </div>
                        </div>
                        <div class="form-group required col-6 col-md-3" aria-required="true">
                          <label for="second_name" class="control-label">Second Name</label>
                          <div class="elVal">
                            <input type="text" name="second_name" id="second_name" minlength="3" maxlength="15"
                              class="form-control" placeholder="Second Name">
                          </div>
                        </div>
                        <div class="form-group required col-6 col-md-3" aria-required="true">
                          <label for="third_name" class="control-label">Third Name</label>
                          <div class="elVal">
                            <input type="text" name="third_name" id="third_name" minlength="3" maxlength="15"
                              class="form-control" placeholder="Third Name">
                          </div>
                        </div>
                        <div class="form-group col-6 col-md-3">
                          <label for="lastname" class="control-label">Last Name</label>
                          <div class="elVal">
                            <input type="text" name="last_name" id="last_name" maxlength="15"
                              class="form-control" placeholder="Last Name">
                          </div>
                        </div>
                      </div>
                    </fieldset>

                    {{-- <!--
                      - nationality[] 
                      - gender[M-F] 
                      - birthdate --> --}}
                    <fieldset>
                      <legend>{{('...')}}</legend>                      
                      <div class="row">
                        <div class="form-group required col-6  col-md-4" aria-required="true">
                          <label for="nationality" class="control-label">Nationality</label>
                          <div class="elVal">
                            <select name="nationality" id="nationality" class="form-control">
                            <option value="" selected="selected">Select Nationality</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group required col-6 col-md-4" aria-required="true">
                          <label for="gender" class="control-label">Gender</label>
                          <div class="elVal">
                            <select name="gender" id="gender" class="form-control">
                              <option value="" selected="selected">Select Gender</option>
                              <option value="M">Male</option>
                              <option value="F">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group required col-6  col-md-4" aria-required="true">
                          <label for="birthdate" class="control-label">Birth date</label>
                          <div class="elVal">
                            <!--<input type="text" name='dob' id="dob" class="form-control" placeholder="" readonly="true">-->
                            <input type="date" name="birthdate" id="birthdate" class="form-control">
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
                            <select name="country" id="country" class="form-control" onchange="get_code(this)"
                              aria-required="true" aria-invalid="false">
                              <option value="" selected="selected">Select Country</option>
                            </select>
                          </div>
                        </div>
                        <!-- cite -->
                        <div class="form-group  col-6 col-md-4">
                          <label for="cite" class="control-label">cite</label>
                          <input id="cite" type="text" class="form-control " value="" name="cite" placeholder="City *" required="required">
                        </div>
                        <!-- street -->
                        <div class="form-group  col-6 col-md-4">
                          <label for="street" class="control-label">street</label>
                          <input id="street" type="text" class="form-control " value="" name="street" placeholder="Area,Street,befor... *" required="required">
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
                            <input type="text" name="email" id="email" maxlength="50" class="form-control"
                              placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group required col-md-6" aria-required="true">
                          <label for="email" class="control-label">Confirmation Email</label>
                          <div class="elVal">
                            <input type="text" name="confirmation_email" id="confirmation_email" maxlength="50"
                              class="form-control" placeholder="Confirmation Email">
                          </div>
                        </div>
                        <div class="form-group required col-md-6 elVal" aria-required="true">
                          <label for="phone_no" class="control-label">Phone Number</label>
                          <div class="input-group">
                            <span class="input-group-text country_code"></span>
                            <input type="hidden" name="country_code" id="country_code" value="">
                            <input type="hidden" name="mobileNumber" id="mobileNumber" value="">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" maxlength="15"
                              placeholder="Phone Number" data-inputmask="&quot;mask&quot;: &quot;(999) 999 999 999&quot;"
                              data-mask="">
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    {{--  --}}

                    <input type="submit" name="seve">

                  </form>
                  <br>
                </div>
              </div>
            </div> <!-- END of Container -->
          </div>
        </div>
      </div>
    </div>
  <!--POPUP MODAL-->



  </section>
@endsection
@section('ajax')
<script>
  function get_code(cur){
     if(cur.value!=''){ 
      var option = $('option:selected', cur).attr('code');  
      $('#country_code').val(option);
      $('.country_code').html(option);
     }else
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
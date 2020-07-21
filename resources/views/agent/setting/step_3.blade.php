@extends('layouts.agent')
@section('content')
  <section class="content">
    <div class="container col-md-8">
      <div class="card card-widget widget-user">
        <div class="widget-user-header bg-c text-white">
          <h3 class="">{{('قم باضافة المشرفين')}}</h3>
          <!-- <h5 class="widget-user-desc">{{('المرحلة')}} &amp; {{('الشعبة')}}</h5> -->
        </div>


        <div id="wrapper" class="clearfix">
          <!-- preloader -->



          <!-- Header -->












          <div class="main-content">

            <br>
            <div class="container">
              {{-- بداية جزء اظافة المشرفين  --}}
               {{--  هذا  الجزء لايظهر اذا كان المرحلة موجود لها مشرف--}}
              <div class="row">
                <div class="col-md-12">
                  <!--<div class="panel panel-default">-->
                  <!--<div class="panel-heading">Register</div>-->

                  <!--<div class="panel-body">-->
                    {{--  رسلالة الخطاء --}}
                  <div class="row">
                    <div class="col-md-8 col-xs-12 col-sm-6">
                      <div class="alert alert-danger" style="display:none;">
                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                      </div>
                    </div>
                  </div>
                    {{--  رسلالة النجاح --}}
                  <div class="row">
                    <div class="col-md-8 col-xs-12 col-sm-6">
                      <div class="alert alert-success" style="display:none;">
                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                      </div>
                    </div>
                  </div>

                  
                  <br>
                  {{-- بداية جزء ادخال بيانات المشرف --}}
                  {{-- <form method="POST" action="{{ route('agent.password.update') }}"> --}}
                    @csrf
                    {{--  --}}
                    <div class="form-group row">
                        <label for="supervisor_name" class="col-md-4 col-form-label text-md-right">اسم {{ __('lang.supervisor') }}</label>

                        <div class="col-md-6">
                            <input id="supervisor_name" type="text" class="form-control @error('supervisor_name') is-invalid @enderror" name="supervisor_name" value="{{ $supervisor_name ?? old('supervisor_name') }}" required autocomplete="supervisor_name" autofocus>

                            @error('supervisor_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{--  --}}
                    <div class="form-group row">
                        <label for="levels" class="col-md-4 col-form-label text-md-right">{{ __('اختر المراحل الدراسية') }}</label>

                        <div class="col-md-6">
                            <div class="form-group">
                              <div class="form-check">
                                <input id="l1" name="l1" class="form-check-input" type="checkbox">
                                <label for="l1" class="form-check-label">Checkbox</label>
                              </div>
                              <div class="form-check">
                                <input id="l2" name="l2" class="form-check-input" type="checkbox" checked="">
                                <label for="l2" class="form-check-label">Checkbox checked</label>
                              </div>
                              <div class="form-check">
                                <input id="l3" name="l3" class="form-check-input" type="checkbox" >
                                <label for="l3" class="form-check-label">Checkbox disabled</label>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('حفظ') }}
                            </button>
                        </div>
                    </div>

                  {{-- </form> --}}

                </div>
              </div>
               {{-- نهاية جزء اظافة المشرفين  --}}
              <hr>
              
              {{-- جزء عرض البيانات للمراحل والمشرفين --}}
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-c">
                      <h3 class="card-title">{{ ('المراحل & المشرفين') }}</h3>
                    </div>


                    {{-- بداية عرض المشرفين والراحل  --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>                  
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>المشرف</th>
                            <th>المرحلة</th>
                            <th style="width: 40px">الحالة</th>
                            <th style="width: 40px">تعديل</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>لايوجد</td>
                            <td>الصف الاول الاساسي
                              {{-- <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                              </div> --}}
                            </td>
                            <td><span class="badge bg-danger">لم يتم الاضافة بعد</span></td>
                            <td><span class="badge bg-danger">تعديل & جديد</span></td>
                          </tr>

                          <tr>
                            <td>1.</td>
                            <td>لايوجد</td>
                            <td>الصف الثاني الاساسي
                              {{-- <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                              </div> --}}
                            </td>
                            <td><span class="badge bg-danger">لم يتم الاضافة بعد</span></td>
                            <td><span class="badge bg-danger">تعديل & جديد</span></td>
                          </tr>
                          
                          <tr>
                            <td>1.</td>
                            <td>لايوجد</td>
                            <td>الصف الثالث الاساسي
                              {{-- <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                              </div> --}}
                            </td>
                            <td><span class="badge bg-danger">لم يتم الاضافة بعد</span></td>
                            <td><span class="badge bg-danger">تعديل & جديد</span></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    {{-- بداية عرض المشرفين والراحل  --}}

                    {{-- <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                      </ul>
                    </div> --}}
                  </div>
                </div>
              </div>
              {{-- جزء عرض البيانات للمراحل والمشرفين --}}

            </div> <!-- END of Container -->
            <!-- Footer -->




          </div>
          <!--POPUP MODAL-->
         


        </div>

      </div>
    </div>
  </section>
@endsection

@section('ajax')
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
@endsection
@extends('layouts.admin')

@section('main-header-li-left'){{-- @include('admin.include.main-header-li-left') --}}@endsection
@section('main-header-li-right'){{-- @include('admin.include.main-header-li-right') --}}@endsection
@section('sidebar-li'){{-- @include('admin.include.sidebar-li') --}}@endsection

{{-- عنوان الصفحة المراحل الدراسية --}}
@section('content-header')<h1>{{ __('admin.levels') }}</h1>@endsection

{{-- بداية محتوا الصفحة --}}
@section('content')

<div class="container-fluid">
  <h5 class="mt-4 mb-2">{{ __('اعدادات المراحل الدراسية') }}</h5>
  
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{ 'المراحل الدراسية للمدرسة' }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="accordion">
          {{--بداية عرض المراحل الدراسية --}}
          @foreach (session('lhh') as $level_code)
          <div class="card card-primary">
            <div class="card-header p-0">
              <h4 class="card-title w-100">
                <a data-toggle="collapse" data-parent="#accordion" href="#{{ $level_code.'item' }}" class="level"
                  data-div="{{ $level_code.'x' }}"
                  data-route="{{ route('get.classrooms', [ 'level_code'=>$level_code ] ) }}">
                  <p class="p-2 m-0"> {{ __('lang.Level.'.$level_code) }}</p>
                </a>
              </h4>
            </div>
            <div id="{{ $level_code.'item' }}" class="panel-collapse collapse in">
              <div id="body" class="card-body">
                <p class="text-right" dir="rtl">{{ "مشرف المرحله :" }} {{ '.....' }}
                  <button data-toggle="modal" data-target="#modal-level-edit"
                    class="{{ 'level-supervisor ' }} btn btn-info btn-sm float-left"
                    data-route="{{ route('get.level.supervisor', [ 'level_code'=>$level_code ] ) }}">تعديل</button>
                </p>
                <div class="row">

                  <div id="{{ $level_code.'x' }}" class="col-12 text-sm"></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          {{-- نهاية عرض المراحل الدراسية --}}
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>


  
  <div class="col-md-6">
    <div class="row">
        {{-- بداية عرض اظافة مرحلة جديدة --}}
      <div class="col-md-6">
        <div class="card card-primary collapsed-card">
          <div class="card-header">
            <h3 class="card-title">{{ __('admin.add level') }}</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-plus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body text-sm" style="display: block;">

            <!-- Minimal style -->
            <div class="row">
              @if(session('lhh'))
              @foreach (__('subjects.level') as $L)

              <div class="form-group clearfix">


              @if(!session('lhh.'.$L["code"]))
                <form role="form" action="{{ route('add.level',$L['code']) }}">
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" onchange="submit();" id="{{ $L['code'].'add' }}" name="{{ $L['code'] }}"
                      {{-- {{ ' disabled ' }} {{ 'checked' }} --}} required />
                    <label for="{{ $L['code'].'add' }}" class="w-100 ">
                      {{ __('lang.Level.'.$L['code']) }}
                    </label>
                  </div>
                </form>
              @endif


              </div>
              @endforeach
              @endif
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer" style="display: none;">
          </div>


        </div>
      </div>
      <!-- /.col -->

      <div class="col-md-6">
        <div class="card card-danger collapsed-card">
          <div class="card-header">
            <h3 class="card-title">{{ __('admin.delete level') }}</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-plus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body text-sm" style="display: block;">
            <!-- Minimal style -->
            <div class="row">
              {{-- @if(session('lhh')) --}}
              @foreach (__('subjects.level') as $L)
              <div class="form-group clearfix">


                @if(session('lhh.'.$L["code"]))
                <form role="form" action="{{ route('delete.level',$L['code']) }}">
                  <div class="icheck-danger d-inline">
                    <input type="checkbox" onchange="submit();" id="{{ $L['code'].'delete' }}" name="{{ $L['code'] }}"
                      {{-- {{ ' disabled ' }} --}} {{-- {{ ' checked' }} --}} required />
                    <label for="{{ $L['code'].'delete' }}" class="w-100 ">
                      {{ __('lang.Level.'.$L['code']) }}
                    </label>
                  </div>
                </form>

                @endif

              </div>
              @endforeach
              {{-- @endif --}}
            </div>


          </div>
          <!-- /.card-body -->

          <div class="card-footer" style="display: none;">

          </div>


        </div>
      </div>
      <!-- /.col -->
    </div>
  </div>
</div>
</div><!-- /.container-fluid -->

{{-- هاذا الكود يقوم بتظمين تصميم الفورمات المخفيه التي تعرض عند الظغط على الازرار --}}
@include('admin.popup.pop-classroome')
{{-- انتها التظمين --}}


{{-- <button type="button" class="btn btn-success swalDefaultSuccess">
  Launch Success Toast
</button>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-classroom">
  modal-edit-classroom
</button>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-level-edit">
  تعديل معلومات المرحلة
</button> --}}

<!-- /.modal -->
@endsection
{{-- انتهاء محتواء صفحة اعدادات المراحل الدراسية  --}}


{{-- @include('includes.swets-js') --}}
{{-- بداية اوامر الجيكويري (جافا سكربت) ـ --}}
@section('ajax')
<script>
  $(document).ready(function(){
      // ===========================
      // عرض كل الشعب الدراسية للمرحلة 
      $(document).on('click','.level', function(e){
          e.preventDefault();
          var route= $(this).attr('data-route');
          var id= $(this).attr('data-div');
          // 
          $.ajax({
              type:"get",
              url:route,
              success:function(data){
                  // $(this).prepend(data);
                  $('#'+id).html(data);
                  swet('تم بنجاح .','info');
                  // $(this).html(data);
                  // $('#body').html(data);
                  // $('#addcsv').attr("style")
                  
                  // console.log(data);
              },
              error:function(xhr,status,error){
                // عرض رسالة خطاء في حالت الفشل
                swet(status,'danger');
                swet(error,'danger');
              }
          })
      });
      // عرض  مودل تعديل معلومات الشعبة الدراسية
      $(document).on('click','.classrome-edit', function(e){
          e.preventDefault();
          var route= $(this).attr('data-route');
          
          // var id= $(this).attr('data-div');
          // 
          // console.log(route);
          $.ajax({
              type:"get",
              url:route,
              dataType:"JSON",
              // في حالة النجاح للمهمه
              success:function(databack){
                  // $(this).prepend(data);
                  // $('#'+id).html(data);
                  // swet('تم بنجاح .','info');
                  // $(this).html(data);
                  // $('#body').html(data);
                  // $('#addcsv').attr("style")
                $('#id').val(databack.id);
                $('#uuid').val(databack.uuid);
                $('#name').val(databack.name);
                $('#code').val(databack.code);
                $('#school_id').val(databack.school_id);
                $('#level_id').val(databack.level_id);
                $('#teacher_id').val(databack.teacher_id);
  
  
                  
                  // console.log(databack);
              },
              error:function(xhr,status,error){
                // عرض رسالة خطاء في حالت الفشل
                swet(status,'danger');
                swet(error,'danger');
              }
          })
      });
      //  عرض بيانات المشرف للـمرحلة
      $(document).on('click','.level-supervisor', function(e){
          e.preventDefault();
          var route= $(this).attr('data-route');
          var model=$('#form-supervisor-body-in-model');
          // var id= $(this).attr('data-div');
          // 
          // console.log(route);
          $.ajax({
              type:"get",
              url:route,
              // في حالة النجاح للمهمه
              success:function(databack){
                model.html(databack);
              //   $('#id').val(databack.id);
              //   $('#uuid').val(databack.uuid);
              //   $('#name').val(databack.name);
              //   $('#code').val(databack.code);
              //   $('#school_id').val(databack.school_id);
              //   $('#level_id').val(databack.level_id);
              //   $('#teacher_id').val(databack.teacher_id);    
                   console.log(databack);
              },
              error:function(xhr,status,error){
                // عرض رسالة خطاء في حالت الفشل
                swet(status,'danger');
                swet(error,'danger');
              }
          });
      });
      // عرض سجل اسماء الطلاب للشعبة الدراسية
      $(document).on('click','.students-all', function(e){
          e.preventDefault();
          var route= $(this).attr('data-route');
          var classname= $(this).attr('class-name');
          // 
          $.ajax({
              type:"get",
              url:route,
              // dataType:"JSON",
              // في حالة النجاح للمهمه
              success:function(databack){
                // $('#'+id).html(data);
                $('#table-students').html(databack);
                
                $('#table-students').prepend('<h3 class="text-center">'+classname+'</h3>');
                swet('تم بنجاح .','info');
                  // $(this).html(data);
                  // $('#body').html(data);
                  // $('#addcsv').attr("style")
                  
                  // console.log(databack);
              },
              error:function(xhr,status,error){
                // عرض رسالة خطاء في حالت الفشل
                swet(status,'danger');
                swet(error,'danger');
              }
          })
      });
      // ===========================
      //كود تنسيق شكل الجدول
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth":  false,
          "paging": false,
        });// ====================
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "responsive": true,
        });// ===================
      });
      
      
      // =========== تجربة تحضير الطلاب سوف يتم نقل هاذا 
      // الكود عند بداية تصميم شاشات المعلم=============

      //1 الطالب حاضر
      $(document).on('click','.sahe',function(e){
          var id=$(this).attr('tr');
      
          swet('حاضر','success');
          $('#'+id).fadeOut();
          $('.child').remove();
      });
      // =========================
      //2 الطالب غايب
      $(document).on('click','.nom',function(e){
          var id=$(this).attr('tr');
          swet('غايب' , 'warning');
          $('#'+id).fadeOut();
          $('.child').remove();
      });
      // ===========================



    });
</script>

@endsection
{{-- نهاية اوامر الجيكويري (جافا سكربت) ـ --}}
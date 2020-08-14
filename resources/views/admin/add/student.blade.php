@extends('layouts.admin')

@section('main-header-li-left')
{{-- @include('admin.include.main-header-li-left') --}}

@endsection
@section('main-header-li-right'){{-- @include('admin.include.main-header-li-right') --}}@endsection
@section('sidebar-li'){{-- @include('admin.include.sidebar-li') --}}@endsection

{{-- عنوان الصفحة --}}
@section('content-header')<h1>{{ __('admin.students') }}</h1>@endsection
{{--  بداية المحتوا الخاص بالصفحة --}}
@section('content')

{{-- بداية عرض سجل الطلاب --}}
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title">{{ __('admin.students') }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-plus"> السجل </i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div id="tbody-all-student" class="p-0 m-0 text-right tbody-all-student" data-route="{{ route('all.student') }}">
            {{--  --}}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section><!-- /.content -->
{{-- نهاية  عرض سجل الطلاب --}}

{{-- بداية فورم اظافة طالب واحد --}}
<div class="container-fluid hidden">
    <div class="row">
        <div class="col-12">
            <div class="getcsv">
                <a href="#" data-body="csv" id="getcsv" class="btn btn-sm btn-default">all csv </a>
                <div id="csv"></div>

            </div>
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-md-3">
                    
                </div> -->
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.add student') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <fieldset style="border:1px blue solid; margin: 10px;padding: revert;">
                    <legend style="width: auto; padding: 10px;">{{ __('admin.add student') }}</legend>

                    <form role="form" id="myForm"
                        action="{{ route('new.student') }}"
                        method="POST">
                        @csrf
                        <input  name="form_is" type="hidden" value="student">
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control form-control-sm " id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                </div> --}}
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="level">{{ __('admin.levels') }}</label>
                                        <select id="select-level"   class="form-control form-control-sm " name="level">
                                            <option>{{ __('admin.levels') }}</option>
                                            @foreach (session('levels') as $level)
                                            <option value="{{ $level->uuid }}">{{ __('lang.Level.'.$level->name) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {{--  <label for="level">{{ __('admin.levels') }}</label>  --}}
                                        <div id="input_classRoome" class="input_classRoome">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('lang.student.name') }}</label>
                                <input name="name" type="text" class="form-control form-control-sm " id="name"
                                    placeholder="{{ __('lang.student.Enter name') }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="f_name">{{ __('lang.student.f_name') }}</label>
                                        <input name="f_name" type="text" class="form-control form-control-sm "
                                            id="f_name" placeholder="{{ __('lang.student.Enter f_name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="p_name">{{ __('lang.student.p_name') }}</label>
                                        <input name="p_name" type="text" class="form-control form-control-sm "
                                            id="p_name" placeholder="{{ __('lang.student.Enter p_name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="gad_name">{{ __('lang.student.gad_name') }}</label>
                                        <input name="gad_name" type="text" class="form-control form-control-sm "
                                            id="gad_name" placeholder="{{ __('lang.student.Enter gad_name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="l_name">{{ __('lang.student.l_name') }}</label>
                                        <input name="l_name" type="text" class="form-control form-control-sm "
                                            id="l_name" placeholder="{{ __('lang.student.Enter l_name') }}">
                                    </div>
                                </div>
                               
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="birthdate">{{ __('lang.student.birthdate') }}</label>
                                        <input name="birthdate" type="date" class="form-control form-control-sm "
                                            id="birthdate" placeholder="{{ __('lang.student.Enter birthdate') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pareent_mobile">{{ __('lang.student.pareent_mobile') }}</label>
                                        <input name="pareent_mobile" type="text" class="form-control form-control-sm " id="pareent_mobile"
                                            placeholder="{{ __('lang.student.Enter pareent_mobile') }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>{{ __('lang.student.gender') }}</label>
                                        <div class="form-check">
                                            <input id="gnder1" class="form-check-input" type="radio" name="gender"
                                                value="1">
                                            <label for="gnder1" class="form-check-label">{{ __('lang.man') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="gnder2" class="form-check-input" type="radio" name="gender"
                                                checked="" value="2">
                                            <label for="gnder2" class="form-check-label">{{ __('lang.wman') }}</label>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        
                                        <input name="" type="text" class="form-control form-control-sm " id="gender"
                                            placeholder="{{ __('lang.student.Enter gender') }}">
                                </div> --}}
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nationality">{{ __('lang.student.nationality') }}</label>
                                    <select name="nationality" id="nationality" class="form-control form-control-sm "
                                        placeholder="{{ __('lang.student.Enter nationality') }}">
                                        {{-- @include('include/input_slecet_contere_ar') --}}
                                    </select>
                                    {{-- x --}}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                {{-- <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control form-control-sm " id="exampleInputPassword1" placeholder="Password">
                                    </div> --}}
                                {{-- <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div> --}}
                            </div>
                        </div>

                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> --}}
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>

            </fieldset>
            </div>
        </div>




   
    </div> 
</div><!-- /.container-fluid -->
{{-- نهاية فورم اظافة طالب واحد --}}
@endsection
{{-- نهاية محتوا الصفحة --}}

{{-- كود الجكويري لعرض بيانات الطلاب --}}
<script src="{{ asset('js/app.js') }}"></script>
@section('ajax')
    
    <script>
       
        $(document).ready(function(){
            $('#nationality').load("{{ route('get.Option.Country') }}");
            var route= $('#tbody-all-student').attr('data-route');
            $('.tbody-all-student').load(route);
            swet('تم عرض بيانات الطلاب بنجاح .','success');
            // swet('تم بنجاح .','info');
            
        });

        $('#select-level').change(function(e){
            
            
            
            getClassroomsForLevel(e.target.value,"{{ route('admin.getClassroomsForLevel') }}",'#input_classRoome','');
            ajaxGet(e.target.value,"{{ route('get.Option.Country') }}",'#nationality','');
            //console.log(d);
        });
         	
    </script>
    {{-- <script>
            $("#myForm").validate({
                rules: {
                    p_name: {required: true},
                    l_name: {required: true},
                    gad_name: {required: true},
                    name: {required: true},
                    //classroom: {required: true},
                    gnder: {required: true},
                    
                }
             });
    </script> --}}
    {{-- <script>
            $.ajax({
                type:"get",
                url:route,
                // لو تم جلب البيانات بنجاح
                success:function(data){
                    // يتم اظافة البانات في المكان المحدد سابقاُ في الاعلى
                    $('.tbody-all-student').prepend(data);
                    // عرض رسالة نجاح
                    swet('تم عرض بيانات الطلاب بنجاح .','success');
    
                    // $(this).html(data);
                    // $('#body').html(data);
                    // $('#addcsv').attr("style")
                    
                    // console.log(data);
                },
                // لو هناك خطاء اثناء عرض البيانات
                error:function(xhr,status,error){
                    // يتم عرض رسالة خطاء
                    swet('error','danger');
                    // نوع الخطاء
                    swet(status,'danger');
                    // رسسالة الخطاء
                    swet(error,'danger');
                }
            });
    </script> --}}
@endsection
{{-- انتهاء الجكويري --}}
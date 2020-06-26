@extends('layouts.admin')


@section('main-header-li-left')
{{-- @include('admin.include.main-header-li-left') --}}
@endsection

@section('main-header-li-right')
{{-- @include('admin.include.main-header-li-right') --}}
@section('sidebar-li')
{{-- @include('admin.include.sidebar-li') --}}
<li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            {{ __('admin.Dashboard') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('add.student', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}"
                class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin.add student') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('add.teacher', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}"
                class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin.add teacher') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('add.supervisor', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}"
                class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin.add supervisor') }}</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">{{ __('admin.setting') }}</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            {{ __('admin.school setting') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('info.school', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}"
                class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin.info school') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('info.levels', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}"
                class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin.levels') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('info.classrooms', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}"
                class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin.classrooms') }}</p>
            </a>
        </li>
    </ul>
</li>
@endsection

@section('content-header')
{{-- <h1>{{ __('admin.add student') }}</h1> --}}
<div class="row">
    
    <div class="col-12">
        {{-- <h4 class="mt-4 ">Orange Navbar <small><b>recommended</b> (navbar-orange navbar-light)</small></h4> --}}
        <nav class="navbar navbar-expand navbar-orange navbar-light ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Dropdown</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>

                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                </li>

                                <!-- Level three dropdown-->
                                <li class="dropdown-submenu">
                                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"
                                        class="dropdown-item dropdown-toggle">level 2</a>
                                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                    </ul>
                                </li>
                                <!-- End Level three -->

                                <li><a href="#" class="dropdown-item">level 2</a></li>
                                <li><a href="#" class="dropdown-item">level 2</a></li>
                            </ul>
                        </li>
                        <!-- End Level two -->
                    </ul>
                </li>
            </ul>
            {{--  --}}
            {{--  --}}
            <!-- SEARCH FORM -->
            <form class="form-inline ml-auto">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>
    </div>
</div>
@endsection

@section('content')


<div class="container-fluid">
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
                
                <form role="form" action="{{ route('add.student',['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" method="POST" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control form-control-sm " id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="level">{{ __('admin.levels') }}</label>
                                    <select onchange="" class="form-control form-control-sm " name="level" id="level">
                                        <option>{{ __('admin.levels') }}</option>
                                        @foreach (session('levels') as $level)
                                        <option value="{{ $level->id }}">{{ __('lang.Level.'.$level->name) }}</option>
                                        @endforeach
                                    </select>
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
                                    <input name="f_name" type="text" class="form-control form-control-sm " id="f_name"
                                        placeholder="{{ __('lang.student.Enter f_name') }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="p_name">{{ __('lang.student.p_name') }}</label>
                                    <input name="p_name" type="text" class="form-control form-control-sm " id="p_name"
                                        placeholder="{{ __('lang.student.Enter p_name') }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="l_name">{{ __('lang.student.l_name') }}</label>
                                    <input name="l_name" type="text" class="form-control form-control-sm " id="l_name"
                                        placeholder="{{ __('lang.student.Enter l_name') }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="birthdate">{{ __('lang.student.birthdate') }}</label>
                                    <input name="birthdate" type="date" class="form-control form-control-sm " id="birthdate"
                                        placeholder="{{ __('lang.student.Enter birthdate') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label >{{ __('lang.student.gender') }}</label>
                                    <div class="form-check">
                                        <input id="gnder1" class="form-check-input" type="radio" name="gender" value="1">
                                        <label for="gnder1"class="form-check-label">{{ __('lang.man') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="gnder2" class="form-check-input" type="radio" name="gender" checked="" value="2">
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
                                    <select name="nationality" id="nationality" class="form-control form-control-sm " placeholder="{{ __('lang.student.Enter nationality') }}">
                                        {{-- @include('include\input_slecet_contere_ar') --}}
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



         <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.add student') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <fieldset style="border:1px blue solid; margin: 10px;padding: revert;">
                    <legend style="width: auto; padding: 10px;">{{ __('admin.add student') }}</legend>
                
                    {{-- <form role="form" action="{{ route('add.student',['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" method="POST" enctype="multipart/form-data" > --}}
                        {{-- @csrf --}}
                        {{-- <div class="card-body"> --}}
                                <!-- csv -->
                            {{-- <div class="form-group"> --}}
                                {{-- <label for="file" class=" col-form-label">{{ ('ملف الطلاب بصيغة csv') }}</label> --}}
                                {{-- <div class="col-md"> --}}
                                    {{-- <div class="custom-file"> --}}
                                        {{-- <input type="file" value="{{ old('csv') }}" name="csv" --}}
                                            {{-- class="custom-file-input @error('csv') is-invalid @enderror" id="validatedCustomFile" /> --}}
                                        {{-- <label class="custom-file-label" for="validatedCustomFile">{{ ('ملف الطلاب بصيغة csv') }}</label> --}}
                                        {{-- <div class="invalid-feedback"> --}}
                                            {{-- @error('csv') --}}
                                            {{-- <span class="invalid-feedback" role="alert"> --}}
                                                {{-- <strong>{{ $message }}</strong> --}}
                                            {{-- </span> --}}
                                            {{-- @enderror --}}
                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
    
                           {{-- <!--  school_massge  -->
                            <div class="form-group">
                                <label for="school_massge" class="col-md-3 col-form-label text-md-right">{{__('lang.school_massge')}}</label>
                                <textarea value="{{ old('school_massge') }}" style="width: 100%;" name="school_massge" type="textarea"
                                id="article-ckeditor" placeholder="1234 Main St">{{__('lang.school_massge')}}</textarea>
                            </div> --}}
    
                            
                        {{-- </div>
                        <!-- /.card-body -->
    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </form>
                     --}}
                </fieldset>





                <!-- form ajax -->
                <fieldset style="border:1px blue solid; margin: 10px;padding: revert;">
                    <legend style="width: auto; padding: 10px;">{{ __('admin.add student') }}</legend>
                
                    <form id="addcsv" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="level">{{ __('admin.levels') }}</label>
                            <select class="form-control form-control-sm " name="level_uuid" id="level_uuid" aria-placeholder="اختر المرحلة الدراسية">
                                <option>{{ __('admin.levels') }}</option>
                                @foreach (session('levels') as $level)
                                    <option value="{{ $level->uuid }}">{{ __('lang.Level.'.$level->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" name="description" id="description" class="form-control-sm" placeholder="ملاحظة">
                        <input type="file" name="csv" id="csv" class="form-control-sm" >
                        {{-- <input type="text" name="level_uuid" id="description"> --}}
                        <input type="submit" value="ok" class="btn btn-info">
                        {{-- @csrf
                        <div class="card-body">
                                <!-- csv -->
                            <div class="form-group">
                                <label for="file" class=" col-form-label">{{ ('ملف الطلاب بصيغة csv') }}</label>
                                <div class="col-md">
                                    <div class="custom-file">
                                        <input type="file" value="{{ old('csv') }}" name="csv"
                                            class="custom-file-input @error('csv') is-invalid @enderror" id="validatedCustomFile" />
                                        <label class="custom-file-label" for="validatedCustomFile">{{ ('ملف الطلاب بصيغة csv') }}</label>
                                        <div class="invalid-feedback">
                                            @error('csv')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
    
                           {{-- <!--  school_massge  -->
                            <div class="form-group">
                                <label for="school_massge" class="col-md-3 col-form-label text-md-right">{{__('lang.school_massge')}}</label>
                                <textarea value="{{ old('school_massge') }}" style="width: 100%;" name="school_massge" type="textarea"
                                id="article-ckeditor" placeholder="1234 Main St">{{__('lang.school_massge')}}</textarea>
                            </div> --}}
    
                            
                        {{-- </div>
                        <!-- /.card-body -->
    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div> --}}
                    </form>
                    
                </fieldset>



                
            </div>
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="container">
            <div dir="rtl" class="col-8  card-body table-responsive p-0  text-right">
        <table id="tab" class="table table-hover table-head-fixed text-nowrap">

            <tr>
                <th>no</th>
                <th>name</th>
                <th>leval</th>
                <th>class</th>
                <th>parent name</th>
                <th>parent mobal</th>
                <th>gender</th>
            </tr>

            @include('admin\add\tab')
            
        </table>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->

@endsection

@section('ajax')
<script>
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token2"]').attr('content')
    }
});

$('#addcsv').submit(function(e){
    e.preventDefault();
    var formData= new FormData($('#addcsv')[0]);
    // 
    $.ajax({
        type:"POST",
        enctype: "multipart/form-data",
        url:"{{ route('add.students.csv') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
        
        
        
        success:function(databack){
            // $('#tab').prepend(databack);
            $('#tab').append(databack);
            $('#addcsv').attr("style")
            
            console.log(data);
        },
        error:function(xhr,status,error){
            
        }
    })
})



</script>

    
@endsection
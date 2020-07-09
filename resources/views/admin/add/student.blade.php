@extends('layouts.admin')


@section('main-header-li-left')
{{-- @include('admin.include.main-header-li-left') --}}
<?php if ( Hash::check('123456789', Auth::user()->getAuthPassword())) {
     echo "yes";}else{echo "no";}
      ?>
@endsection

@section('main-header-li-right')
{{-- @include('admin.include.main-header-li-right') --}}
@endsection

@section('sidebar-li')
{{-- @include('admin.include.sidebar-li') --}}
@endsection

@section('content-header')
<h1>{{ __('admin.add student') }}</h1>
@endsection

@section('content')


<div class="container-fluid">
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

                    <form role="form"
                        action="{{ route('add.student',['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}"
                        method="POST">
                        @csrf
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
                                        <select id="select-level" class="form-control form-control-sm " name="level"
                                            id="level">
                                            <option>{{ __('admin.levels') }}</option>
                                            @foreach (session('levels') as $level)
                                            <option value="{{ $level->id }}">{{ __('lang.Level.'.$level->name) }}
                                            </option>
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




    <!-- /.col -->
</div>
</div><!-- /.container-fluid -->

@endsection
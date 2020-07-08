@extends('layouts.admin')


@section('main-header-li-left')
{{-- @include('admin.include.main-header-li-left') --}}

@endsection

@section('main-header-li-right')
{{-- @include('admin.include.main-header-li-right') --}}
@endsection

@section('sidebar-li')
{{-- @include('admin.include.sidebar-li') --}}
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                {{ __('admin.Dashboard') }}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('add.student', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}"
                    class="nav-link">
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
                            {{--  --}}
                            {{-- {{Form::file('post_image', ['class'=>'btn ' ]) }}
                            {!! Form::date('data', time()) !!}
                            {!! Form::label('J') !!} --}}
                        </div>
                        <!-- 2/.tab-pane -->

                        <!-- 3 .tab-pane -->
                        <div class=" tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience"
                                            placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and
                                                    conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
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
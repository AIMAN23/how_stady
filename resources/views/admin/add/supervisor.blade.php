@extends('layouts.admin')


    @section('main-header-li-left')
        {{-- @include('admin.include.main-header-li-left') --}}
    @stop

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
                    <a href="{{ route('add.student', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('admin.add student') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('add.teacher', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('admin.add teacher') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('add.supervisor', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" class="nav-link active">
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
                    <a href="{{ route('info.school', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('admin.info school') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('info.levels', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('admin.levels') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('info.classrooms', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('admin.classrooms') }}</p>
                    </a>
                </li>
            </ul>
        </li>
    @stop

    @section('content-header')
        <h1>{{ __('admin.add supervisor') }}</h1>
    @stop

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-md-3">
                    
                </div> -->
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">{{ __('admin.add supervisor') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
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
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                      </div>
                      <!-- /.card-body -->
                  
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    @stop
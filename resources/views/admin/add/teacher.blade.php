@extends('layouts.admin')

@section('main-header-li-left')
{{-- @include('admin.include.main-header-li-left') --}}
@endsection

@section('main-header-li-right')
{{-- @include('admin.include.main-header-li-right') --}}
@endsection

@section('sidebar-li')
{{-- @include('admin.include.sidebar-li') --}}
@endsection

@section('content-header')
<h1>{{ __('admin.add teacher') }}</h1>
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
                    <h3 class="card-title">{{ __('admin.add teacher') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {{-- <form role="form">
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
                </form> --}}
            </div>
        </div>
        <!-- /.col -->
    </div>
</div><!-- /.container-fluid -->
@endsection
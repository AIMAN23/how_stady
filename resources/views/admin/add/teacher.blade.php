@extends('layouts.admin')

@section('main-header-li-left'){{-- @include('admin.include.main-header-li-left') --}}@endsection
@section('main-header-li-right'){{-- @include('admin.include.main-header-li-right') --}}@endsection
@section('sidebar-li'){{-- @include('admin.include.sidebar-li') --}}@endsection


{{-- عنوان الصفحة --}}
@section('content-header')<h1>{{ __('admin.add teacher') }}</h1>@endsection
{{-- نهاية العنوان --}}

{{-- بداية محتوا صفحة سجل المدرسين --}}
@section('content')
{{-- بداية عرض سجل المدرسين --}}
<!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @for ($i = 0; $i < 90; $i++) <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            Digital Strategist
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee
                                        Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                            Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{ asset('/lte/dist/img/userP-128x128.jpg') }}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endfor
    
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
        </nav>
    </div>
    <!-- /.card-footer -->
    </div>
    <!-- /.card -->
{{-- نهاية عرض سجل المدرسين  --}}

{{-- بداية فورم اضافة معلم واحد --}}
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
{{-- نهاية فورم اضافة معلم واحد --}}
@endsection
{{-- نهاية محتوا صفحة سجل المعلمين --}}

{{-- بداية كود الجيكويري --}}
@section('ajax')
    <script>
        // بعد تحميل الصفحة يتم التالي
        $(document).ready(function(){
            // لايوجد شيء حالياً
        });
    </script>
@endsection
{{-- نهاية كود الجكويري --}}
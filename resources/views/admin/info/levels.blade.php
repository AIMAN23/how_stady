@extends('layouts.admin')

    {{--  --}}
    @section('main-header-li-left')
        {{-- @include('admin.include.main-header-li-left') --}}
    @endsection

    {{--  --}}
    @section('main-header-li-right')
        {{-- @include('admin.include.main-header-li-right') --}}
    @endsection

    {{--  --}}
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
                    <a href="{{ route('add.supervisor', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('admin.add supervisor') }}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">{{ __('admin.setting') }}</li>
        <li class="nav-item has-treeview  menu-open">
            <a href="#" class="nav-link active">
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
                    <a href="{{ route('info.levels', ['school_uuid'=>session('school.uuid') ,'admin_uuid'=>Auth::user()->uuid]) }}" class="nav-link active">
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
                <li class="nav-item">
                    <a href="{{ route('welcome') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('lang.home') }}</p>
                    </a>
                </li>
            </ul>
        </li>
    @endsection

    {{--  --}}
    @section('content-header')
        <h1>{{ __('admin.levels') }}</h1>
    @endsection

    {{--  --}}
@section('content')
    <div class="container-fluid">
      <h5 class="mt-4 mb-2">Bootstrap Accordion & Carousel</h5>
      {{-- youtuop --}}
        {{-- <div class="row">
          <div class="col-4">
            <!-- 21:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-21by9">
              <iframe class="embed-responsive-item" src="{{ url('hodor.html') }}"></iframe>
            </div>
          </div>
          <div class="col-4">
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ url('3_login.html') }}"></iframe>//'Firest_login.html'
            </div>
          </div>
          <div class="col-4">
            <!-- 4:3 aspect ratio -->
            <div class="embed-responsive embed-responsive-4by3">
              <iframe class="embed-responsive-item" src="{{ route('msf') }}"></iframe>
            </div>
          </div>
        </div> --}}



        {{-- <!-- 1:1 aspect ratio -->
        <div class="embed-responsive embed-responsive-1by1">
          <iframe class="embed-responsive-item" src="{{ url('home.html') }}"></iframe>
        </div> --}}
      {{--  --}}
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Collapsible Accordion</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="accordion">
                @foreach (session('lhh') as $item)
                    <div class="card card-primary">
                      <div class="card-header p-0">
                        <h4 class="card-title w-100">
                          <a data-toggle="collapse" data-parent="#accordion" href="#{{ $item.'item' }}" class="">
                            <p class="p-2 m-0"> {{ __('lang.Level.'.$item) }}</p>
                          </a>
                        </h4>
                      </div>
                      <div id="{{ $item.'item' }}" class="panel-collapse collapse in">
                        <div id="body" class="card-body">
                            <button class="level btn btn-info" data-div="{{ $item.'x' }}" data-route="{{ route('get.classrooms', [ 'level_code'=>$item ] ) }}">class rooms</button>
                            {{-- @include('admin\get\classrooms') --}}
                          <div class="row">

                            <div id="{{ $item.'x' }}" class="col-12 text-sm"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                @endforeach
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

    
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
        <div class="col-md-6">
          <div class="row">
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
              <div class="card-body text-sm" style="display: none;">
    
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
              <div class="card-body text-sm" style="display: none;">
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

    @include('admin-school\popup\pop-classroome')
    <button type="button" class="btn btn-success swalDefaultSuccess">
        Launch Success Toast
      </button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-classroom">
        modal-edit-classroom
    </button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
      Launch Default Modal
    </button>
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endsection


@section('ajax')
  @include('includes\swets-js')
  {{-- ajax --}}
  <script>
    $.ajaxSetup({
      headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token2"]').attr('content')
      }
    });
    // get classrooms of any level
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
                
            }
        })
    });

    // update classroom
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
                
            }
        })
    });

    // get students where class uuid
    $(document).on('click','.students-all', function(e){
        e.preventDefault();
        var route= $(this).attr('data-route');
        var classname= $(this).attr('class-name');
        // 
        $.ajax({
            type:"get",
            url:route,
            // dataType:"JSON",
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
                
            }
        })
    });


  </script>

@endsection
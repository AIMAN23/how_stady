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
    <div class="col-md-4">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{ __('admin.add student') }}</h3>
        </div>
        <!-- form ajax -->
        <fieldset style="border:1px blue solid; margin: 10px;padding: revert;">
          <legend style="width: auto; padding: 10px;">{{ __('admin.add student') }}</legend>

          <form id="addcsv" enctype="multipart/form-data">
            <div class="form-group">
              <label for="level">{{ __('admin.levels') }}</label>
              <select class="form-control form-control-sm " name="level_uuid" id="level_uuid"
                aria-placeholder="اختر المرحلة الدراسية">
                <option>{{ __('admin.levels') }}</option>
                @foreach (session('levels') as $level)
                <option value="{{ $level->uuid }}">{{ __('lang.Level.'.$level->name) }}</option>
                @endforeach
              </select>
            </div>
            <input type="text" name="description" id="description" class="form-control-sm" placeholder="ملاحظة">
            <input type="file" name="csv" id="csv" class="form-control-sm">
            {{-- <input type="text" name="level_uuid" id="description"> --}}
            <input type="submit" value="ok" class="btn btn-info">
          </form>

        </fieldset>
      </div>
    </div>
    <div class="col-md-8">
      <div class="container">
        <div dir="rtl" class="card-body table-responsive p-0  text-right">
          <div id="tab"></div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('ajax')

<script>
  $(document).ready(function(){
// ====================================

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
                $('#addcsv:input').val()='';
                
                // console.log(data);
            },
            error:function(xhr,status,error){
                
            }
        })
    });


    $('#getcsv').click(function(e){
        e.preventDefault();
        var id= $(this).attr('data-body');
        // 
        $.ajax({
            type:"get",
            // enctype: "multipart/form-data",
            url:"{{ route('get.all.csv') }}",
                    // data: formData,
                    // processData: false,
                    // contentType: 'JSON',
                    // cache: false,
            
            
            
            success:function(databack){
                // $('#tab').prepend(databack);
                $('#'+id).html(databack);
                // $('#addcsv').attr("style");
                
                // console.log(databack);
            },
            error:function(xhr,status,error){
                
            }
        });
    });
// ======================================================
});



</script>


@endsection
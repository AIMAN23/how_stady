@extends('layouts.admin')


@section('main-header-li-left')
{{-- @include('admin.include.main-header-li-left') --}}
{{-- <php
    $auth_no=Auth::user()->no;
    $auth_pass=Auth::user()->getAuthPassword();
    $check_pass =  Hash::check($auth_no, auth_pass);
    if ($check_pass){
        echo "yes";
      }
      else{
        echo "no";
    }
?> --}}
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

  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="getcsv card ">
        <div class="card-header">
            {{-- <h3 class="card-title">
                {{ __('admin.all files csv') }}
            </h3> --}}
            <button  data-body="csv" id="getcsv" class="btn btn-sm btn-default">
                <i class="fas fa-sync-alt"></i> {{ __('all csv') }}
            </button>
            <button class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-add-csv">
              <i class="fas fa-plus"></i>{{ __('lang.btn.Add') }}
            </button>
            
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="#"
                    data-source-selector="#card-refresh-content" data-load-on-init="false"><i class="fas fa-sync-alt"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div id="csv" class="card-body ">
            {{-- عرض البيانات --}}
        </div>

      </div>
    </div>
    <div class="col-md-6">
      <div class="container">
        <div class="card" id="all-added">
          <div  dir="rtl" class="card-body table-responsive p-0  text-right">
            <div id="tab"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@include('admin.popup.add-csv')
@endsection

@section('ajax')
<script>

    // $("#all-added").next(refresh);
  $(document).ready(function(){
    var refresh ='<div id="overlay" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div> ';
    // $("body").append(refresh);
    // ====================================

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token2"]').attr('content')
        }
    });
    function getcsv(id = "csv"){
      //var id='#'+oid;
        $.ajax({
          type:"get",
          // enctype: "multipart/form-data",
          url:"{{  route('get.all.csv') }}",
                  // data: formData,
                  // processData: false,
                  // contentType: 'JSON',
                  // cache: false,
    
    
    
          success:function(databack){
              // $('#tab').prepend(databack);
              $('#'+id).html('').fadeOut();
              swet();
              $('#'+id).html(databack).fadeIn();
              // $('#'+id).fadeIn();
              // $('#addcsv').attr("style");
    
              // console.log(databack);
          },
          error:function(xhr,status,error){
            $('#'+id).append(error);
              // var E=xhr.errors();
              console.log(xhr.message);
          }
        });
    };
    // عرض البيانات
      getcsv();
    // انتهاء العرض
    
    $('#addcsv').submit(function(e){
        e.preventDefault();
        var formData= new FormData($('#addcsv')[0]);
        //
        $("#content_loud").append(refresh);
        $.ajax({
            type:"POST",
            enctype: "multipart/form-data",
            url:"{{ route('add.students.csv') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,



            success:function(databack){
                getcsv();
                $('#overlay').remove();
                $('#tab').append(databack);
                $('#addcsv:[input]').val()='';

                // console.log(data);
            },
            error:function(xhr,status,error){
              $('#tab').html('');
              $('#overlay').remove('#overlay');

              $('#tab').append(error+'<hr>');
              var x=xhr.responseJSON.errors;

              if (x.level_uuid !=null) {
                $('#tab').append(x.level_uuid +'<hr>' ?? '');
                $('#error_levels').html(x.level_uuid);
              }else{$('#error_levels').html(''); }

              if (x.description !=null) {
                $('#tab').append(x.description+'<hr>' ?? '');
                $('#error_description').html(x.description);
              }else{$('#error_description').html(''); }

              if (x.csv !=null) {
                $('#tab').append(x.csv+'<hr>' ?? '');
                $('#error_csv').html(x.csv);
              }else{$('#error_csv').html(''); }
              // console.log(xhr.responseJSON.errors);
            }
        })
    });

      
    


         
      

      
  $('#getcsv').click(function(e){
      e.preventDefault();
      $(".getcsv").append(refresh);
      var id= '#csv';//$(this).attr('data-body');
      //
      $.ajax({
          type:"get",
          url:"{{  route('get.all.csv') }}",
          success:function(databack){
              $(id).html('').fadeOut();
              $('#overlay').remove();
              $(id).html(databack).fadeIn();
          },
          error:function(xhr,status,error){
            $(id).append(error);
            console.log(xhr.message);
          }
      });
  });
  // ======================================================
  // $("#overlay").remove();
  function getcsv(oid = "csv"){
    var id='#'+oid;
      $.ajax({
        type:"get",
        // enctype: "multipart/form-data",
        url:"{{  route('get.all.csv') }}",
                // data: formData,
                // processData: false,
                // contentType: 'JSON',
                // cache: false,
  
  
  
        success:function(databack){
            // $('#tab').prepend(databack);
            $(id).html('').fadeOut();
            swet();
            $(id).html(databack).fadeIn();
            // $('#'+id).fadeIn();
            // $('#addcsv').attr("style");
  
            // console.log(databack);
        },
        error:function(xhr,status,error){
          $(id).append(error);
            // var E=xhr.errors();
            //console.log(xhr.message);
        }
      });
  };
  // عرض البيانات
    getcsv();
  // انتهاء العرض  
  $(document).on('click','#deletecsv',function(e){
    e.preventDefault();
    var route=$(this).attr('route');
    
    //
    $.ajax({
        type:"get",
        url:route,
        success:function(databack){
            swet(databack);
            getcsv('csv');
            //$(id).html(databack).fadeIn();
        },
        error:function(xhr,status,error){
          swet(error,"danger");
          
          //console.log(xhr.message);
        }
    });
  });


});
</script>


<script>
  $(document).ready(function(){


    

  });
</script>

@endsection

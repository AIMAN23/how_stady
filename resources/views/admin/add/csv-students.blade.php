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
    <div class="col-12">
      <div class="getcsv card ">
        <div class="card-header">
            {{-- <h3 class="card-title">
                {{ __('admin.all files csv') }}
            </h3> --}}
            <button  data-body="csv" id="getcsv" class="btn btn-sm btn-default">
                {{ __('all csv') }}
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
            {{-- view all files csv in school --}}
              <div class="col-md-12">
                <!-- The time line -->
                <div class="timeline">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-red">10 Feb. 2014</span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
    
                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-sm">Read more</a>
                        <a class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-green">3 Jan. 2014</span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-video bg-maroon"></i>
    
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
    
                      <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
    
                      <div class="timeline-body">
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" frameborder="0" allowfullscreen=""></iframe>
                        </div>
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <!-- /.col -->
            {{--  end all files  --}}
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{ __('admin.add student') }}</h3>
        </div>
        <div class="card-body">
          <!-- form ajax -->
          <fieldset style="border:1px blue solid; margin: 10px;padding: revert;">
            <legend style="width: auto; padding: 10px;">{{ __('admin.add student') }}</legend>

            <form id="addcsv" enctype="multipart/form-data">
              <div class="form-group">
                <label for="level">{{ __('admin.levels') }}</label>
                <select class="form-control form-control-sm " name="level_uuid" id="level_uuid"
                  aria-placeholder="اختر المرحلة الدراسية">
                  <option value="" selected>{{ __('admin.levels') }}</option>
                  @foreach (session('levels') as $level)
                  <option value="{{ $level->uuid }}">{{ __('lang.Level.'.$level->name) }}</option>
                  @endforeach
                </select><br>
                <span id="error_levels" style="color:brown;"></span>
              </div>
              <input type="text" name="description" id="description" class="form-control-sm" placeholder="ملاحظة"><br>
              <span id="error_description" style="color:brown;"></span>
              <input type="file" name="csv" id="csv" class="form-control-sm"><br>
              <span id="error_csv" style="color:brown;"></span>
              {{-- <input type="text" name="level_uuid" id="description"> --}}
              <input type="submit" value="ok" class="btn btn-info">
            </form>

          </fieldset>
        </div>
      </div>
    </div>
    <div class="col-md-8">
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
@endsection

@section('ajax')
<script>
    $(function () {
        $("#ex1").dataTable({
        "responsive": true,
        "autoWidth": false,
        });
        $('#ex2').dataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
</script>

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
        var id= $(this).attr('data-body');
        //
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
    });
  // ======================================================
  // $("#overlay").remove();
  });




</script>


@endsection

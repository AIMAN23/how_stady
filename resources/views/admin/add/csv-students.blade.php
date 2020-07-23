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
{{--  --}}

      <b>Id aut saepe non mollitia voluptas voluptas.</b>
      <table id="ex2">
        <thead>
          <tr>
          <tr>Non consequatur.</tr>
          <tr>Incidunt est.</tr>
          <tr>Aut voluptatem.</tr>
          <tr>Officia voluptas rerum quo.</tr>
          <tr>Asperiores similique.</tr>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Sapiente dolorum dolorem sint laboriosam commodi qui.</td>
            <td>Commodi nihil nesciunt eveniet quo repudiandae.</td>
            <td>Voluptates explicabo numquam distinctio necessitatibus repellat.</td>
            <td>Provident ut doloremque nam eum modi aspernatur.</td>
            <td>Iusto inventore.</td>
          </tr>
          <tr>
            <td>Animi nihil ratione id mollitia libero ipsa quia tempore.</td>
            <td>Velit est officia et aut tenetur dolorem sed mollitia expedita.</td>
            <td>Modi modi repudiandae pariatur voluptas rerum ea incidunt non molestiae eligendi eos deleniti.</td>
            <td>Exercitationem voluptatibus dolor est iste quod molestiae.</td>
            <td>Quia reiciendis.</td>
          </tr>
          <tr>
            <td>Inventore impedit exercitationem voluptatibus rerum cupiditate.</td>
            <td>Qui.</td>
            <td>Aliquam.</td>
            <td>Autem nihil aut et.</td>
            <td>Dolor ut quia error.</td>
          </tr>
          <tr>
            <td>Enim facilis iusto earum et minus rerum assumenda quis quia.</td>
            <td>Reprehenderit ut sapiente occaecati voluptatum dolor voluptatem vitae qui velit.</td>
            <td>Quod fugiat non.</td>
            <td>Sunt nobis totam mollitia sed nesciunt est deleniti cumque.</td>
            <td>Repudiandae quo.</td>
          </tr>
          <tr>
            <td>Modi dicta libero quisquam doloremque qui autem.</td>
            <td>Voluptatem aliquid saepe laudantium facere eos sunt dolor.</td>
            <td>Est eos quis laboriosam officia expedita repellendus quia natus.</td>
            <td>Et neque delectus quod fugit enim repudiandae qui.</td>
            <td>Fugit soluta sit facilis facere repellat culpa magni voluptatem maiores tempora.</td>
          </tr>
          <tr>
            <td>Enim dolores doloremque.</td>
            <td>Assumenda voluptatem eum perferendis exercitationem.</td>
            <td>Quasi in fugit deserunt ea perferendis sunt nemo consequatur dolorum soluta.</td>
            <td>Maxime repellat qui numquam voluptatem est modi.</td>
            <td>Alias rerum rerum hic hic eveniet.</td>
          </tr>
          <tr>
            <td>Tempore voluptatem.</td>
            <td>Eaque.</td>
            <td>Et sit quas fugit iusto.</td>
            <td>Nemo nihil rerum dignissimos et esse.</td>
            <td>Repudiandae ipsum numquam.</td>
          </tr>
          <tr>
            <td>Nemo sunt quia.</td>
            <td>Sint tempore est neque ducimus harum sed.</td>
            <td>Dicta placeat atque libero nihil.</td>
            <td>Et qui aperiam temporibus facilis eum.</td>
            <td>Ut dolores qui enim et maiores nesciunt.</td>
          </tr>
          <tr>
            <td>Dolorum totam sint debitis saepe laborum.</td>
            <td>Quidem corrupti ea.</td>
            <td>Cum voluptas quod.</td>
            <td>Possimus consequatur quasi dolorem ut et.</td>
            <td>Et velit non hic labore repudiandae quis.</td>
          </tr>
        </tbody>
      </table>
{{--  --}}

@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="getcsv">
        <button  data-body="csv" id="getcsv" class="btn btn-sm btn-default">all csv </a>
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
                $('#'+id).html('');
                $('#'+id).html(databack).fadeIn(400);
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

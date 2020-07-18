@extends('layouts.admin')


@section('main-header-li-left')
{{-- @include('admin.include.main-header-li-left') --}}
@endsection

@section('main-header-li-right')
{{-- @include('admin.include.main-header-li-right') --}}
@section('sidebar-li')
{{-- @include('admin.include.sidebar-li') --}}
@endsection

@section('content-header')
<h1>{{ __('admin.add supervisor') }}</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- <div class="col-md-3">
                    
                </div> -->
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.add supervisor') }}</h3>
                </div>
                <div id="supervisors" sid="{{ route('get.supervisors',['school_id' => Auth::user()->school_id ]) }}"
                    class="card-body">
                    ,,
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
</div><!-- /.container-fluid -->

@endsection
@section('ajax')
{{-- @include('includes.swets-js') --}}
{{-- $(document).on('click','#supervisors',function(e){ --}}
<script>
    $(document).ready(function(){
            // =======================
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token2"]').attr('content')
                }
            });
    // ===========================
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth":  true,
        // "paging": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  // ====================


            // ======================
            // $(window).ready(function(e){ 
        
                // e.preventDefault();
                // var id=$id;
                var route= $('#supervisors').attr('sid');
                 swet('تم بنجاح .','info');
                $.ajax({
                    type:"get",
                    url:route,
                    success:function(data){
                        // $(this).prepend(data);
                        swet('تم بنجاح .','info');
                        $('#supervisors').html(data);
        
                        // $(this).html(data);
                        // $('#body').html(data);
                        // $('#addcsv').attr("style")
                        
                        console.log(data);
                    },
                    error:function(xhr,status,error){
                      swet('error','info');
                    }
                });
            // });


        });
</script>
@endsection
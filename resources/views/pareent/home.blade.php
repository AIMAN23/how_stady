@extends('layouts.pareent')

@section('main-header-li-left'){{-- @include('admin.include.main-header-li-left') --}}@endsection
@section('main-header-li-right'){{-- @include('admin.include.main-header-li-right') --}}@endsection
@section('sidebar-li'){{-- @include('admin.include.sidebar-li') --}}@endsection


{{--  عنوان الصفحة:الصفحة الشخصية للمشرف --}}
@section('content-header')<h5 class="" id="title_pag">{{ __('lang.page.home') }}</h5>@endsection
{{-- نهاية العنوان --}}


{{-- بداية محتوا الصفحة --}}
@section('content')
{{-- <div class="content-wrapper" "> --}}

    <!--  -->
    <div class="">
      <!-- Widget: user widget style 1 -->
      <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-a text-white">
          <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
          <h5 class="widget-user-desc sons-all">{{ __('lang.Parent') }}</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle elevation-2" alt="User Image" src="{{ asset('lte/dist/img/userP-128x128.jpg') }}">
        </div>
        <div class="card-footer pt-2"><!-- style="height: 50vh;min-height:100;" -->
          <!--  -->
          <div class=" row float-right">
            <div class="col-12">
              <a href="/pareent/home" class=" p-4 btn btn-navbar">
                {{__('lang.page.home')}}
                <i class="fas fa-arrow-circle-right "></i>
              </a>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>
          {{-- بداية عرض الطلاب تبع ولي الامر --}}
          <div class="row" id="my-sons">
            

                {{-- // عرض الطلاب هنا --}}
            

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up">

            </div>
          </div>
          {{-- نهاية عرض الطلاب تبع ولي الامر --}}

          <!-- row users old  -->
          <!-- /.row -->
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
    <!--  -->
  {{-- </div> --}}
@endsection
{{-- نهاية محتوا الصفحة --}}



{{-- بداية الجيكويري --}}
@section('ajax')
<script>
$(document).ready(function(){

    $(document).on('click', '#bstu-1', function (e) {
        e.preventDefault();
        var uuid =$(this).attr('suuid');
        swet(uuid ,'success');
    });

    // ==============
    //جلب كل الطلاب تبع ولي الامر وعرضهم
        var route ="{{ route('pareent.get.my-sons') }}";
        $.ajax({
            type:'get',
            url:route,
            success:function(databack){
                $('#my-sons').html(databack);
                swet('' ,'success');
            },
            error:function(xhr,error,status){
                swet(error + status,'werning');
            }
        });
        //نهاية جلب البيانات
    // ========================
    $(document).on('click','#problem_a',function(e){
        e.isDefaultPrevented();
        var route = $(this).attr('data-url');
        $.ajax({
             type:'get',
             url:route,
             success:function(databack){
                 $('#my-sons').html(databack);
                 swet('' ,'success');
             },
             error:function(xhr,error,status){
                 swet(xhr.message +error + status,'werning');
                 console.log(xhr.message);
             }
         });
        
    });
    
    

});


$(document).ready(function(){
// ==============
    $(document).on('click','#student-show',function(e){
        e.preventDefault();
        //عرض الطالب
        // var route ="{{ route('pareent.get.my-sons') }}";
        var route = $(this).attr('data-route');
            $.ajax({
                type:'get',
                url:route,
                success:function(databack){
                    $('#my-sons').html(databack);
                    swet('student show' ,'success');
                },
                error:function(xhr,error,status){
                    swet(error +' '+ status,'werning');
                }
            });
            //نهاية جلب البيانات
        // ========================

    });
});

// 
$(document).ready(function(e){
    // e.preventDefault();

 
 
});
</script>
@endsection
{{-- نهاية الجيكويري --}}
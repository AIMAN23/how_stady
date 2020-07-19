
<div class="container">

  <!-- Widget: user widget style 1 -->
  <div class="card card-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-b text-white">
      <h3 class="widget-user-username">{{ $student->name }}</h3>
      <h5 class="widget-user-desc">{{ __('lang.Level.'.$student->level->name) }} &amp; {{ $student->classroom->name }}</h5>
    </div>
    <div class="widget-user-image">

      <!-- <i class="fa fa-lg fa-user" alt=""></i> -->
      <img class="img-circle elevation-2" alt="User Image" src="{{ asset('lte/dist/img/student-128x128.jpg') }}">

    </div>
    <div class="card-footer pt-2">

      <div class=" row float-right">
        {{-- تحديث الصفحة --}}
        <div class="col-4">

          <a href="#" id="student-show" data-route="{{ route('pareent.student.show',['code'=>  $student->code ]) }}" class=" p-4 btn btn-navbar">
            {{-- repeat --}}
            {{('lang.refresh')}}
            <!-- <i class="fas fa-arrow-circle-right "></i>fa-angle-double-right -->
            <i class="fa fa-lg  fa-refresh"></i>
          </a>
        </div>
        
        {{-- اسم المدرسة --}}
        <div class="col-8">
          <span href="Starter.html" class=" p-4 btn btn-navbar">
             <h3 class="widget-user-username">{{ $student->school->name }}</h3>
            <!-- <i class="fas fa-arrow-circle-right "></i>fa-angle-double-right -->
            {{-- <i class="fa fa-lg fa-angle-double-right"></i> --}}
          </span>
        </div>        
      </div><!-- -->
      
      <div class="clearfix hidden-md-up"></div>

      <!--  -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div href="hodor.html" for="hodor" class="small-box bg-g">
            <span class="badge bg-g navbar-badge" style="padding:4px;font-size:1rem; right: -5px;top:-5px;">+12</span>
            <div class="inner">
              <b><i class="fas fa-user-plus"></i><br>{{('الحضور والغياب')}}</b>
              <p>{{('e')}}</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a id="hodor" href="hodor.html" class="small-box-footer p-2">{{('التفاصيل')}} <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div href="home-worke.html" for="home" class="small-box bg-c">
            <span class="badge bg-c navbar-badge" style="padding:4px;font-size:1rem; right: -5px;top:-5px;">+10</span>
            <div class="inner">
              <b><i class="fas fa-book-reader"></i><br>{{('الدروس والواجبات')}}<sup style="font-size: 20px"></sup></b>
              <p>{{('eny')}}</p>
            </div>
            <div class="icon">
              <i class="fas fa-book-reader"></i>
            </div>
            <a id="home" href="home-worke.html" class="small-box-footer p-2">{{('التفاصيل')}} <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div href="dragat.html" for="dragat" class="small-box bg-b">
            <span class="badge bg-b navbar-badge" style="padding:4px;font-size:1rem; right: -5px;top:-5px;">+9</span>
            <div class="inner">
              <b><i class="fas fa-address-book"></i><br>{{('الدرجات')}}</b>
              <p>{{('e')}}</p>
            </div>
            <div class="icon">
              <i class="fas fa-address-book"></i>
            </div>
            <a id="dragat" href="dragat.html" class="small-box-footer p-2">{{('التفاصيل')}} <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div href="money.html" for="money" class="small-box bg-a">
            <span class="badge bg-a navbar-badge" style="padding:4px;font-size:1rem; right: -5px;top:-5px;">+3</span>
            <div class="inner">
              <b><i class="fas fa-comment-dollar"></i><br>{{('eny')}}</b>
              <p>{{('e')}}</p>
            </div>
            <div class="icon">
              <i class="fas fa-comment-dollar"></i>
            </div>
            <a id="money" href="money.html" class="small-box-footer p-2">{{('التفاصيل')}} <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!--  -->


    </div>
  </div>
  <!-- /.widget-user -->
</div>
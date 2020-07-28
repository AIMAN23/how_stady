

{{--  {{ Auth::user()->Member(1595889853) }} <hr>  --}}
{{--  {{ Auth::user()->created_at }}  --}}
{{--  {{ Auth::user()->Member('2020-07-23 02:44:09') }} <hr>  --}}
{{--  {{ (86400*30 )}} <hr><br>
{{ (86400*4 )}} <hr><br>
{{ (86400*5 )}} <hr><br>
{{ (86400*6 )}} <hr><br>
{{ (86400*7 )}} <hr><br>  --}}
{{--  {{ Auth::user()->formatTime((86400*90),'2020-07-25 02:44:09' ) }} <hr>  --}}
{{--  @foreach (Auth::user()->level() as $level)    
    {{  __('lang.Level.'.$level) }}
@endforeach  --}}
{{--  {{ time() }}  --}}

{{ Auth::user()->studentRegister->count() }} <hr>
@if (Auth::user()->studentRegister->count() == 0 )
    
    <h1>{{ __('lang.pareent.not-has.student') }}</h1>

    <button id="problem_a" name="problem_a"type="button" data-url="{{ route('pareent.help',['problem'=> 'I dont have sons']) }}" >
      {{ ('pareent.help') }}
    </button>

@else
  @foreach (Auth::user()->studentRegister as $student)
  <!-- 1 -->
  <div class="col-12 col-sm-6 col-md-4" style="direction: rtl;">
    <div class="card">
        <div class="card-header p-0 m-0">
            <span class="text-sm text-right mr-0">{{  $student->school->name }} :({{  $student->school->bransh }})</span>
            <!-- <i class="fas fa-user"></i> -->
            <span id="bstu-1" suuid="{{ $student->code}}"
              class="mbadge  bg-g text-sm   ">12</span>
            <span id="bstu-2" suuid="{{ $student->code}}"
              class="mbadge  bg-c text-sm  ">10</span>
            <span id="bstu-3" suuid="{{ $student->code}}"
              class="mbadge  bg-b text-sm  ">9</span>
            <span id="bstu-4" suuid="{{ $student->code}}"
              class="mbadge  bg-a text-sm  ">3</span>
        </div>
        <div class="card-body p-0 m-0">
          <!-- widget الطالب -->
          <a href="#" id="student-show" data-route="{{ route('pareent.student.show',['code'=>  $student->code ]) }}" class="">
            <div class="info-box mb-3 wstu">
              <span class="info-box-icon">
                <img class="img-circle elevation-3" alt="User Image" src={{ asset("lte/dist/img/student-128x128.jpg") }}>
                <!-- <i class="fas fa-user"></i> -->
                {{-- <span id="bstu-1" suuid="{{ $student->code}}"
                  class="badge bstu  bg-g text-sm  navbar-badge top-0">12</span>
                <span id="bstu-2" suuid="{{ $student->code}}"
                  class="badge bstu  bg-c text-sm  navbar-badge top-25">10</span>
                <span id="bstu-3" suuid="{{ $student->code}}"
                  class="badge bstu  bg-b text-sm  navbar-badge top-50">9</span>
                <span id="bstu-4" suuid="{{ $student->code}}"
                  class="badge bstu  bg-a text-sm  navbar-badge top-75">3</span> --}}
              </span>

              <div class="info-box-content text-right">
                <span class="info-box-text text-sm ">{{ $student->name }}</span>
                <span class="info-box-number">
                  <span>{{  __('lang.Level.'.$student->level->name) }}</span>
                  <small>{{  $student->classroom->name }}</small>
                </span>

              </div>
              <!-- /.info-box-content -->
            </div>
            {{ Auth::user()->Member($student->updated_at) }}
          </a>
        </div>
      
    </div>
    <!--end widget student انتهاء قطعة الطالب -->

    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  @endforeach
@endif
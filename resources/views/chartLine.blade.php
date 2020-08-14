@extends('layouts.lte')

@section('content')
   




    @datetime(new DateTime) <br>
    @time(new DateTime)<br>
@env('local')
 The application is in the local environment...
    @elseenv('test')
 The application is in the testing environment...
@else
 The application is not in the local or testing environment...
@endenv
<br>
@unlessenv('production')
 The application is not in the production environment...
@endenv
<br>
        <select class="sel" name="year">
            @for($i = 0; $i < 5; $i++)
            <option value="{{ date('Y') -$i }}">Year {{ date('Y') -$i }}</option>    
            @endfor
        </select>
        <div class="row chart">
            <div class="col-md-6 col-sm-12 ">
                <div class="card card-primary">
                    <div class="card-body">
                        <div style="width: 80%;margin: 0 auto;">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 ">
                <div class="card card-primary">
                    <div class="card-body">
                        <div style="width: 80%;margin: 0 auto;">
                            {!! $chart2->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 ">
                <div class="card card-primary">
                    <div class="card-body">
                        <div style="width: 80%;margin: 0 auto;">
                            {!! $chart3->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('ajax/Chart.min.js')}}" charset="utf-8"></script>
        <script src="{{ asset('ajax/jquery.min.js')}}"></script>


        {{--
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script> 
        --}}

        {!! $chart->script() !!}

        <script type="text/javascript">
            var original_api_url = {{ $chart->id }}_api_url;
            $(".sel").change(function(){
                var year = $(this).val();
                {{ $chart->id }}_refresh(original_api_url + "?year="+year);});
        </script>
        {!! $chart2->script() !!}
        <script type="text/javascript">
            var original_api_url2 = {{ $chart2->id }}_api_url;
            $(".sel").change(function(){
                var year = $(this).val();
                {{ $chart2->id }}_refresh(original_api_url2 + "?year="+year);});
        </script>
        {!! $chart3->script() !!}
        <script type="text/javascript">
            var original_api_url3 = {{ $chart3->id }}_api_url;
            $(".sel").change(function(){
                var year = $(this).val();
                {{ $chart3->id }}_refresh(original_api_url3 + "?year="+year);});
        </script>
@endsection
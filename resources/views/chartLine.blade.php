<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel Ajax ConsoleTvs Charts Tutorial - ItSolutionStuff.com</title>
    </head>
    <body>
        <h1>Laravel Ajax ConsoleTvs Charts Tutorial - ItSolutionStuff.com</h1>

        <select class="sel" name="year">
            <option value="2020">Year 2020</option>
            <option value="2019">Year 2019</option>
            <option value="2018">Year 2018</option>
        </select>
        <div style="width: 80%;margin: 0 auto;">
            {!! $chart->container() !!}
        </div>

        <script src="{{ asset('ajax/Chart.min.js')}}" charset="utf-8"></script>
		<script src="{{ asset('ajax/jquery.min.js')}}" ></script>


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
    </body>
</html>
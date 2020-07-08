@if (isset($data))
<div dir="rtl" class="col-12 table-responsive p-0 m-0 text-right" >
    @if ($data->count() <= 0 ) 
        <table id="example1" class="table table-bordered table-striped  table-head-fixed">
        <tr>
            <td>لايوجد مشرفين في هاذه المدرسة </td>
        </tr>
        </table>
        @else
        {{-- <table id="example1" class="table table-hover text-nowrap "> --}}
        <table id="example2" class="table table-bordered table-striped  table-head-fixed">
            <thead>
                <tr>
                    <th>name</th>
                    {{--  --}}
                      {{-- <th>NO</th>
                      <th>img</th>
                      <th>status</th>
                      <th>id</th>
                      <th>code</th>
                      <th>no</th>
                      <th>school_year</th>
                      <th>school_id</th>
                      <th>level_id</th>
                      <th>classroom_id</th>
                      <th>schooladmin_id</th> --}}
                    {{--  --}}
                    {{-- <th>edit</th>
                <th>all</th> --}}
                </tr>
            </thead>
            <?php $i=1; ?>
            @foreach ($data->get() as $supervisor )
            <tr id="{{ $i.'tr' }}">
                <td>
                    <span class="row">
                        <span class="col-3">
                            <img class="img-circle elevation-2" src="{{ asset('images/user/'.App\Models\Image::find($supervisor->id)->img) }}" alt="supervisor" width="70px">
                        </span>
                        <span class="col-9">
                            <small class="pr-2 pb-2">{{ $supervisor->name }}</small>
                            {{-- <span class="row mt-2">
                                <span class="col-4">
                                </span>
                                <span class="col-8">
                                        <a href="#" tr="{{ $i.'tr' }}" class="sahe btn btn btn-info" >حاظر</a>
                                        <a href="#" tr="{{ $i.'tr' }}" class="nom btn btn btn-danger" >غايب</a>
                                </span>
                            </span> --}}
                        </span>
                    </span>
                </td>
                {{-- <td>{{ $supervisor->name }}</td>
                <td>{{ $i }}</td>
                <td>{{ $supervisor->status }}</td>
                <td>{{ $supervisor->id }}</td>
                <td>{{ $supervisor->code }}</td>
                <td>{{ $supervisor->no }}</td>
                <td>{{ $supervisor->school_year }}</td>
                <td>{{ $supervisor->school_id }}</td>
                <td>{{ $supervisor->level_id }}</td>
                <td>{{ $supervisor->classroom_id }}</td>
                <td>{{ $supervisor->schooladmin_id }}</td> --}}
                <?php $i+=1; ?>
            </tr>
            @endforeach
        </table>
        @endif
</div>
@endif

{{-- <script>
$(document).on('click','.sahe',function(e){
    var id=$(this).attr('tr');

    swet('حاضر','success');
    $('#'+id).fadeOut();
})
$(document).on('click','.nom',function(e){
    var id=$(this).attr('tr');
    swet('غايب' , 'warning');
    $('#'+id).fadeOut();
})
</script> --}}
@if (isset($data))
<div dir="rtl" class="col-12 table-responsive p-0 m-0 text-right">
    @if ($data->count() <= 0 ) <table id="tableEx" class="table table-bordered table-striped  table-head-fixed">
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
                      <th>school_admin_id</th> --}}
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
                            <img class="img-circle elevation-2"
                            src="{{ asset('/lte/dist/img/userP-128x128.jpg') }}"
                                alt="supervisor" width="70px">
                        </span>
                        <span class="col-9">
                            <small class="pr-2 pb-2">{{ $supervisor->name ." - " .$supervisor->no }}</small>
                            {{-- <span class="row mt-2">
                                <span class="col-4">
                                </span>
                                <span class="col-8">
                                        <a href="#" tr="{{ $i.'tr' }}" class="sahe btn btn btn-info" >حاظر</a>
                            <a href="#" tr="{{ $i.'tr' }}" class="nom btn btn btn-danger">غايب</a>
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
                <td>{{ $supervisor->school_admin_id }}</td> --}}
                <?php $i+=1; ?>
            </tr>
            @endforeach
        </table>
        @endif
</div>
@endif
<div class="card">
    <div class="card-body ">
        <p class="login-box-msg">اضافة المشرفين</p>


      
        @foreach (Auth::user()->school->Levelnotsuper as $item)

        @if ($item->supervisor_id !=0)
        <div class="input-group mb-3">
            <input type="text" class="ml-1 form-control is-valid" name="level_name" value="{{ trans('lang.Level.'.$item->name) }}" readonly placeholder="{{ $item->name }}">
            <output type="text" class="ml-1 form-control" name="supervisor_name" placeholder="مشرف المرحلة">{{ $item->supervisor->name }}</output>
        </div>
        @else
        <form class="aaadd_supervisor" method="POST" action="{{ route('admin.add_supervisor', ['uuid'=>$item->uuid]) }}" >
            @csrf
            <div class="input-group mb-3">
                {{--  <input type="hidden" name="uuid" value="{{ $item->uuid }}">  --}}
                <input type="text" class="ml-1 form-control" name="level_name" value="{{ trans('lang.Level.'.$item->name) }}" readonly placeholder="{{ $item->name }}">
                <input type="text" class="ml-1 form-control" name="supervisor_name" placeholder="مشرف المرحلة">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary ">حفظ</button>
            </div>
        </form>
        @endif
        @endforeach


    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
<script>
    $(function() {
            $('#tableEX').dataTable({
            "responsive": true,
            "paginate": false,
            "sort": true
            
            
            
            });
        } );
        $(function () {
        $("#example1").dataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').dataTable({
            "paginate": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
</script>
<script>

        

</script>

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
@if (isset($students))
<div dir="rtl" id="TABLE-heid" class="table-responsive p-0 m-0 text-right" >
    <div class="">
        {{--  --}}
        @if ($students->count() <= 0 )
            <table id="example2" class="table table-hover ">
                <tr>
                    <td>لايوجد طلاب في هاذه الشعبة الدراسية</td>
                </tr>
            </table>
        @else
        <table id="example1" class="table table-bordered table-striped text-nowrap">
            <thead>
                <tr>
                    <th></th>
                    {{-- <th>NO</th> --}}
                    <th>name</th>
                    <th>pareent_id</th>
                    <th>img</th>
                    <th>status</th>
                    <th>id</th>
                    <th>code</th>
                    <th>no</th>
                    <th>school_year</th>
                    <th>school_id</th>
                    <th>level_id</th>
                    <th>classroom_id</th>
                    <th>schooladmin_id</th>
                    {{-- <th>edit</th>
                    <th>all</th> --}}
                </tr>
            </thead>
            <?php $i=1; ?>
            <tbody>
                @foreach ($students->get() as $s )
                <tr id="{{ $i.'tr' }}">
                    <td style="width: 0;"></td>
                    {{-- <th><span class="col-1">{{ $i }}</span></th> --}}
                    <td>
                        {{-- <tr class=""> --}}
                            <span class="">
                                <img class="img-circle elevation-2" src="{{ url('img/'.$s->img) }}" alt="student" width="70px">
                                <small class="pr-2 pb-2 text-bold text-lg">{{ $s->name }}</small>
                            </span>
                            <br>
                            <span class="float-left">
                                <a href="#" tr="{{ $i.'tr' }}" class="sahe btn btn btn-info" >حاظر</a>
                                <a href="#" tr="{{ $i.'tr' }}" class="nom btn btn btn-danger" >غايب</a>
                            </span>
                        {{-- </tr> --}}
                    </td>
                    <td>{{ $s->pareent_id }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->status }}</td>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->code }}</td>
                    <td>{{ $s->no }}</td>
                    <td>{{ $s->school_year }}</td>
                    <td>{{ $s->school_id }}</td>
                    <td>{{ $s->level_id }}</td>
                    <td>{{ $s->classroom_id }}</td>
                    <td>{{ $s->schooladmin_id }}</td>
                </tr>
                <?php $i+=1; ?>
                @endforeach
            </tbody>
        </table>
        @endif
        {{--  --}}
    </div>
</div>
{{-- <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
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
</script> --}}
@endif
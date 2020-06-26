@if (isset($students))
<div dir="rtl" class="col-12 card-body table-responsive p-0  text-right" style="height: 60vh;">
    @if ($students->count() <= 0 ) <table class="table table-hover  text-nowrap">
        <tr>
            <td>لايوجد طلاب في هاذه الشعبة الدراسية</td>
        </tr>
        </table>
        @else
        {{-- <table id="example1" class="table table-hover text-nowrap "> --}}
        <table id="example1" class="table table-bordered table-striped text-nowrap table-head-fixed">
            <thead>
                <tr>
                    <th>name</th>
                    <th>NO</th>
                    <th>status</th>
                    <th>id</th>
                    <th>code</th>
                    <th>no</th>
                    <th>img</th>
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
            @foreach ($students->get() as $s )
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $i }}</td>
                <td>{{ $s->status }}</td>
                <td>{{ $s->id }}</td>
                <td>{{ $s->code }}</td>
                <td>{{ $s->no }}</td>
                <td>{{ $s->img }}</td>
                <td>{{ $s->school_year }}</td>
                <td>{{ $s->school_id }}</td>
                <td>{{ $s->level_id }}</td>
                <td>{{ $s->classroom_id }}</td>
                <td>{{ $s->schooladmin_id }}</td>
                <?php $i+=1; ?>
            </tr>
            @endforeach
        </table>
        @endif
</div>
@endif
<script>
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
</script>
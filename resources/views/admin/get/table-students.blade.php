@if (isset($students))
<div dir="rtl" class="col-12 table-responsive p-0 m-0 text-right" >
    @if ($students->count() <= 0 ) <table class="table table-hover  text-nowrap">
        <tr>
            <td>لايوجد طلاب في هاذه الشعبة الدراسية</td>
        </tr>
        </table>
        @else
        {{-- <table id="example1" class="table table-hover text-nowrap "> --}}
        <table id="example1" class="table table-bordered table-striped  table-head-fixed">
            <thead>
                <tr>
                    <th>name</th>
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
                    {{-- <th>edit</th>
                <th>all</th> --}}
                </tr>
            </thead>
            <?php $i=1; ?>
            @foreach ($students->get() as $s )
            <tr id="{{ $i.'tr' }}">
                <td>
                    <span class="row">
                        <span class="col-3">
                            <img class="img-circle elevation-2" src="{{ url('img/'.$s->img) }}" alt="student" width="70px">
                        </span>
                        <span class="col-9">
                            <small class="pr-2 pb-2">{{ $s->name }}</small>
                            <span class="row mt-2">
                                <span class="col-4">
                                </span>
                                <span class="col-8">
                                        <a href="#" tr="{{ $i.'tr' }}" class="sahe btn btn btn-info" >حاظر</a>
                                        <a href="#" tr="{{ $i.'tr' }}" class="nom btn btn btn-danger" >غايب</a>
                                </span>
                            </span>
                        </span>
                    </span>
                </td>
                {{-- <td>{{ $s->name }}</td>
                <td>{{ $i }}</td>
                <td>{{ $s->status }}</td>
                <td>{{ $s->id }}</td>
                <td>{{ $s->code }}</td>
                <td>{{ $s->no }}</td>
                <td>{{ $s->school_year }}</td>
                <td>{{ $s->school_id }}</td>
                <td>{{ $s->level_id }}</td>
                <td>{{ $s->classroom_id }}</td>
                <td>{{ $s->schooladmin_id }}</td> --}}
                <?php $i+=1; ?>
            </tr>
            @endforeach
        </table>
        @endif
</div>
@endif
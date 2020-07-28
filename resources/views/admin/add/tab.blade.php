<?php  $chunk=session('chunk.0'); ?>


    
{{-- $ch = $chunk[0] --}}


{{-- {{ $ch['stu_name'] }} --}}

@if (isset($csv_new))
<table id="tab" class="table table-hover table-head-fixed text-nowrap">
    <thead>
        <tr>
            <th>no</th>
            <th>name</th>
            <th>leval</th>
            <th>class</th>
            <th>parent name</th>
            <th>parent mobal</th>
            <th>gender</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($csv_new as $d )

        <tr>
            <td>{{ $d->no }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->level_id }}</td>
            <td>{{ $d->classroom_id }}</td>
            <td>{{ $d->pareent->name ?? 'no pareent_name' }}</td>
            <td>{{ $d->pareent->mobile ?? "no pareent_mobile" }}</td>
            <td>{{ $d->gender ?? 'no stu_gender' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif



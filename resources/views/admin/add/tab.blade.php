@if (isset($data_csv))
@foreach ($data_csv as $d )
    
<tr>
    <td>{{ $d['no_student'] }}</td>
    <td>{{ $d['stu_name'] }}</td>
    <td>{{ $d['level_no'] }}</td>
    <td>{{ $d['classroom_name'] }}</td>
    <td>{{ $d['pareent_name'] }}</td>
    <td>{{ $d['pareent_mobile'] }}</td>
    <td>{{ $d['stu_gender'] }}</td>
</tr>
@endforeach
@endif
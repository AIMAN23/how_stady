{{-- يتم استدعاء هاذا المحتوا من الراوتر ونقلة الى صفحة سجل الطلاب --}}
<table id="tableEX" class="table table-bordered table- text-nowrap">
  <thead>
    <tr>
      <th></th>
      <th class="text-center">{{ __('image') }}</th>
      <th style="">
        {{ __('lang.student.name') }}
      </th>
      <th style="" class="text-center">
        {{ __('code') }}
      </th>
      <th style="" class="text-center">
        {{ __('pareent') }}
      </th>
      <th style="" class="text-center">
        {{ __('admin.stu.created_at') }}
      </th>
      <th class="text-center">
        {{ __('admin.level') }}
      </th>
      <th style="" class="text-center">
        {{ __('admin.classroom') }}
      </th>
      {{-- <th style="">.</th> --}}
    </tr>
  </thead>
  <tbody id="">
    {{-- هنا يتم عمل فورلوب لكل سجلات الطلاب التي سيتم عرضها في صفحة سجل الطلاب --}}
    @foreach (Auth::user()->school->registers as $student )
    <tr>
      {{-- عمود فارغ --}}
      <td>.</td>
      {{-- صورة الطالب --}}
      <td><img alt="Avatar" class="" src="{{ url('img/'.$student->img) }}" height="70px"></td>
      {{-- اسم الطالب --}}
      <td><a>{{ $student->name }}</a></td>
      {{-- كود الطالب --}}
      <td>{{ $student->code }}</td>
      {{-- رقم ولي الامر --}}
      <td>{{ $student->pareent->mobile ?? 'لا يوجد رقم هاتف' }}</td>
      {{-- تاريخ تسجيل الطالب --}}
      <td id="created_at"><small>{{ $student->created_at }}</small></td>
      {{-- المستواى الدراسي --}}
      <td class="project_progress">
        <span class="badge badge-success">
          {{ __('lang.Level.'.$student->level->name) }}
        </span>
      </td>
      {{-- الشعبة --}}
      <td class="project-state">
        <span class="badge badge-success">
          {{ $student->classroom->name }}
        </span>
      </td>
      {{-- ازرار التحكم --}}

    </tr>
    @endforeach
    {{-- نهاية الفورلوب لكل السجلات --}}

  </tbody>
  <tfoot>
    <th>.</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
    <th>5</th>
    <th>6</th>
    <th>7</th>
    <th>8</th>
    {{-- <td>9</td> --}}
  </tfoot>

</table>

<script>
  $(function() {
    $('#tableEX').dataTable({
      "responsive": true,
      "paginate": true,
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


{{-- بعد اكمال جلب كل السجلات يتم ارسالها لصفحة سجلات الطلاب ليتم عرضها --}}
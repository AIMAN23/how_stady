{{-- يتم استدعاء هاذا المحتوا من الراوتر ونقلة الى صفحة سجل الطلاب --}}



  {{-- هنا يتم عمل فورلوب لكل سجلات الطلاب التي سيتم عرضها في صفحة سجل الطلاب --}}
    @foreach (Auth::user()->school->registers as $student )
    <tr>
        {{-- عمود فارغ --}}
        <td></td>
        {{-- صورة الطالب --}}
        <td><img alt="Avatar" class="" src="{{ url('img/'.$student->img) }}" height="70px"></td>
        {{-- اسم الطالب --}}
        <td><a>{{ $student->name }}</a></td>
        {{-- كود الطالب --}}
        <td>#{{ $student->code }}</td>
        {{-- رقم ولي الامر --}}
        <td>#{{ $student->pareent->mobile ?? 'لا يوجد رقم هاتف' }}</td>
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
        <td class="project-actions text-right">
          {{-- عرض --}}
          <a class="btn btn-primary btn-sm" href="#">
              <i class="fas fa-folder"></i>
              {{ __('.View') }}
          </a>
          {{-- تعديل --}}
          <a class="btn btn-info btn-sm" href="#">
              <i class="fas fa-pencil-alt"></i>
              {{ __('.Edit') }}
          </a>
          {{-- حذف --}}
          <a class="btn btn-danger btn-sm" href="#">
              <i class="fas fa-trash"></i>
              {{ __('.Delete') }}
          </a>
        </td>
    </tr>
    @endforeach
  {{-- نهاية الفورلوب لكل السجلات --}}


  {{-- بعد اكمال جلب كل السجلات يتم ارسالها لصفحة سجلات الطلاب ليتم عرضها --}}
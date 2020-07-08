@if (isset($classrooms))
    <div dir="rtl" class="col-12 card-body table-responsive p-0  text-right">
        @if ($classrooms->count() <= 0 )
            <table class="table table-hover  text-nowrap">
                <tr>
                    <td >لايوجد شعب لهاذه المرحلة</td>
                </tr>
            </table>
        @else
        <table class="table table-hover  text-nowrap">
            <tr>
                {{-- <th>level NO</th> --}}
                {{-- <th>class NO</th> --}}
                <th>الشعبة</th>
                {{-- <th>code</th> --}}
                <th>الطلاب</th>
                <th>تعديل</th>
                {{-- <th>uuid</th> --}}
            </tr>
            @foreach ($classrooms->get() as $class )
            <tr>
                {{-- <td name="level_id">{{ $class->level_id }}</td> --}}
                {{-- <td name="id">{{ $class->id }}</td> --}}
                <td name="name"><kbd>{{ $class->name }}</kbd></td>
                {{-- <td name="code">{{ $class->code }}</td> --}}
                <td>
                    <button class="students-all btn btn-info" 
                    id="{{ $class->uuid }}"
                    data-toggle="modal"
                    class-name="{{ $class->name }}"
                    data-target="#modal-all-students"
                        data-route="{{ route('get.classroom.students',['classroome_uuid'=>$class->uuid]) }}">
                    </button>
                </td>
                <td> <button class="classrome-edit btn btn-info" id="{{ $class->uuid }}" data-toggle="modal" data-target="#modal-edit-classroom" data-route="{{ route('get.classroom.info',['classroome_uuid'=>$class->uuid]) }}"></button> </td>
                
                {{-- <td name="uuid">{{ $class->uuid }}</td> --}}
                {{-- <td>{{ $class['name'] }}</td> --}}
                {{-- <td>{{ $class['name'] }}</td> --}}
            </tr>
            @endforeach
        </table>
        @endif
    </div>
@endif
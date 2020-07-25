
{{--  count  --}}
@if (isset($count))
    {{ $count }}
@else
    {{ 'no count' }}
@endif

{{--  DBF  --}}
@if (isset($DBF))
  <table class="table table-bordered">
      @foreach ($DBF as $FILE)
      {{--  <B>{{ $FILE->created_at ?? 'created_at' }}</B>  --}}

      <tr>
        <td>{{ $FILE->id ?? 'id' }}</td>
        <td>{{ $FILE->no ?? 'no' }}</td>
        {{--  <td>{{ $FILE->status ?? 'status' }}</td>  --}}
        <td>
          <a href={{ Illuminate\Support\Facades\Storage::url(FILE_SCHOOL.'_'.Auth::user()->school->uuid.$FILE->filename) }}>
          {{ $FILE->filename ?? 'filename' }}</a></td>
        {{--  <td>{{ $FILE->path ?? 'path' }}</td>  --}}
        <td>{{ $FILE->description ?? 'description' }}</td>
        <td>{{ $FILE->school_id ?? 'school_id' }}</td>
        <td>{{ $FILE->school_admin_id ?? 'school_admin_id' }}</td>
        {{--  <td>{{ $FILE->created_at ?? 'created_at' }}</td>  --}}
        {{--  <td>{{ $FILE->updated_at ?? 'updated_at' }}</td>  --}}
      </tr>
      @endforeach
  </table>
@else
  <hr>{{ 'no DBF' }}<hr>
@endif


{{--  allcsv  --}}
@if (isset($allcsv))

  @if (is_array($allcsv ))
  {{-- All file count is {{ \array_count_values($allcsv) }} --}}
    <ul>
      @foreach ($allcsv as $k => $item)
          @if (is_array($item))
          <ul>
            @foreach ($item as $sk=> $supitem)
            <li>
              <B>{{ $k + 1 }} {{ ' - ' }}</B>
              <a href="{{ url($sk) }}">{{ $supitem }}</a>
            </li>
            @endforeach
          </ul>
          @else
          <li>
            <B>{{ $k + 1 }} {{ ' - ' }}</B>
            <a href="{{ url($k) }}">{{ $item }}</a>
          </li>
          @endif
      @endforeach
    </ul>
  @else
    {{ $allcsv }}
  @endif
    
@else
    <ul>
      <li>no fiels</li>
    </ul>
@endif
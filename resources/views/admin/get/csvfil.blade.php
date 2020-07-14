{{ $f[0] }}
@if (isset($allcsv))

  @if (is_array($allcsv ))
  {{-- All file count is {{ \array_count_values($allcsv) }} --}}
    <ul>
        
    @foreach ($allcsv as $k => $item)
      @foreach ($item as $sk=> $supitem)
      <li><B>{{ $k + 1 }}</B>{{ ' - ' }}<a href="{{ $sk }}">{{ $supitem }}</a><hr></li>
          
      @endforeach
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
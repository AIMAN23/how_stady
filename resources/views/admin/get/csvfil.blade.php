@if (isset($allcsv))

  @if (is_array($allcsv ))
    <ul>
        
    @foreach ($allcsv as $item)
      <li>{{ $item }}</li>
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
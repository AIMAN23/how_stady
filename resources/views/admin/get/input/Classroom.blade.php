{{-- @if (isset($data))
  @php  $list=[]; @endphp
  @forelse ($data as $item)
      @php
        $list[]=$item->name;
      @endphp
  @empty
  @php $list[]=['a','b','c'];
  @endforelse
  {!! Form::select('classroom', $list) !!}
@else
  {{ "no data" }}
@endif --}}

@if (isset($data))
  <label for="level">{{ 'الشعبة الدراسية' }}</label>
  <select id="classroom" name="classroom" class="form-control form-control-sm " >
  
    @forelse ($data as $item)
      <option value="{{ $item->uuid }}">{{ $item->name }}</option>
      @empty
      <option>لايوجد شعب دراسية</option>
    @endforelse

  </select>

@endif
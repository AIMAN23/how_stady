@if (isset($data))
  @if($data->count() >= 1 )
  <p> لايوجد مشرف لهاذه المرحلة الرجاء اضافة مشرف </p><hr>
    <select name="sup" id="sup">
      @foreach ($data->get() as $dataa)
        {{-- <p>name : {{ $dataa->name ?? 'x' }}</p> --}}
        <option>id : {{ $dataa->id ?? 'x' }}</option>
        {{-- <p>uuid : {{ $dataa->uuid ?? 'x' }}</p> --}}
      @endforeach
    </select>
  @elseif($data->count() == 1 )
    <p>name : {{ $data->name ?? 'x' }}</p>
    <p>id : {{ $data->id ?? 'x' }}</p>
    <p>uuid : {{ $data->uuid ?? 'x' }}</p>
  @endif
@else
<p> لايوجد مشرف لهاذه المرحلة الرجاء اضافة مشرف </p>
  {{-- <p>name : {{ $data->name ?? 'x' }}</p> --}}
  {{-- <p>supervisor id : {{ $data->supervisor->id ?? 'x' }}</p> --}}
  {{-- <p>supervisor uuid : {{ $data->supervisor->uuid ?? 'x' }}</p> --}}
  {{-- <p>supervisor no : {{ $data->supervisor->no ?? 'x' }}</p> --}}
  {{-- <p>supervisor name : {{ $data->supervisor->name ?? 'x' }}</p> --}}

@endif
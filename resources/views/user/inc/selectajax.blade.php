@if(!empty($subkategoris))
  @foreach($subkategoris as $subkategori)
    <option value="{{ $subkategori->id }}" >{{ $subkategori->subkategori1 }}</option>
  @endforeach
@else
  <option value=""></option>
@endif

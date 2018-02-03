@if(!empty($subkategoris))
  @foreach($subkategoris as $subkategori)
    <option value="{{ $subkategori->id }}" >{{ $subkategori->subkategori2 }}</option>
  @endforeach
@else
  <option value=""></option>
@endif

@extends('user.home')
@section('content_header')
@stop
@section('content')
  @include('user.inc.pesan')
  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit Kategori</h3>
    </div><!-- /.box-header -->
  {!! Form::open(['action' => ['Subkategori1Controller@update',$subkategori->id],'method'=>'POST','enctype'=>"multipart/form-data"]) !!}
  <div class="box-body">
    <div class="form-group">
      {{Form::label('subkategori','Sub Kategori')}}
      {{Form::text('subkategori',$subkategori->subkategori1,['class'=>'form-control','placeholder'=>'Sub Kategori'])}}
    </div>
    <div class="form-group">
      <select class="form-control" name="kategori_id">
        @foreach ($kategoris as $kategori)
          @if ($kategori->id==$subkategori->kategori_id)
            <option value="{{$kategori->id}}" selected="selected">{{$kategori->kategori}}</option>
          @else
            <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="box-footer">
      {{Form::submit('Simpan',['class'=>'btn btn-primary'])}}
    </div>
  </div>
  {{Form::hidden('_method','PUT')}}
  {!! Form::close() !!}
</div>
@endsection

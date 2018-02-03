@extends('user.home')
@section('content_header')
@stop
@section('content')
  @include('user.inc.pesan')
  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit Kategori</h3>
    </div><!-- /.box-header -->
  {!! Form::open(['action' => ['Subkategori2Controller@update',$subkategori2->id],'method'=>'POST','enctype'=>"multipart/form-data"]) !!}
  <div class="box-body">
    <div class="form-group">
      {{Form::label('subkategori2','Sub Kategori')}}
      {{Form::text('subkategori2',$subkategori2->subkategori2,['class'=>'form-control','placeholder'=>'Sub Kategori'])}}
    </div>
    <div class="form-group">
      <select class='form-control' name='kategori_id'>
        <option value="">---Select Kategori---</option>
        @foreach ($kategoris as $kategori)
          @if ($kategori->id == $subkategori2->kategori_id)
              <option value="{{$kategori->id}}" selected="selected">{{$kategori->kategori}}</option>
          @else
                <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <select class='form-control' name='subkategori1s_id'>
        @foreach ($subkategoris as $subkategori)
          @if ($subkategori->id == $subkategori2->subkategori1s_id)
              <option value="{{$subkategori->id}}" selected>{{$subkategori->subkategori1}} {{$subkategori2->subkategori1s_id}}</option>
          @else
              <option value="{{$subkategori->id}}">{{$subkategori->subkategori1}}</option>
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

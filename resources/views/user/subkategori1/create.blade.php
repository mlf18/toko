@extends('user.home')
@section('content_header')
  @endsection
@section('content')
  @include('user.inc.pesan')
  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Tambah Subkategori</h3>
    </div><!-- /.box-header -->
  {!! Form::open(['action' => 'Subkategori1Controller@store','method'=>'POST','enctype'=>"multipart/form-data"]) !!}
  <div class="box-body">
    <div class="form-group">
      {{Form::label('subkategori','Sub Kategori')}}
      {{Form::text('subkategori','',['class'=>'form-control','placeholder'=>'Sub Kategori'])}}
    </div>
    <div class="form-group">
      <select class='form-control' name='kategori_id'>
        @foreach ($kategoris as $kategori)
          <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
        @endforeach
      </select>
    </div>
    <div class="box-footer">
      {{Form::submit('Simpan',['class'=>'btn btn-primary'])}}
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

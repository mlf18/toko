@extends('user.home')
@section('content_header')
  @endsection
@section('content')
  @include('user.inc.pesan')
  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Tambah Kategori</h3>
    </div><!-- /.box-header -->
  {!! Form::open(['action' => 'KategoriController@store','method'=>'POST','enctype'=>"multipart/form-data"]) !!}
  <div class="box-body">
    <div class="form-group">
      {{Form::label('kategori','Kategori')}}
      {{Form::text('kategori','',['class'=>'form-control','placeholder'=>'Kategori'])}}
    </div>
    <div class="box-footer">
      {{Form::submit('Simpan',['class'=>'btn btn-primary'])}}
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

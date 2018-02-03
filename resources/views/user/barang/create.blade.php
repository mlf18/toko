@extends('user.home')
@section('content_header')
  @endsection
@section('content')
  @include('user.inc.pesan')
  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Tambah Barang</h3>
    </div><!-- /.box-header -->
  {!! Form::open(['action' => 'BarangController@store','method'=>'POST','enctype'=>"multipart/form-data"]) !!}
  <div class="box-body">
    <div class="form-group">
      {{Form::label('nama','Nama')}}
      {{Form::text('nama','',['class'=>'form-control','placeholder'=>'Nama Barang'])}}
    </div>
    <div class="form-group">
      {{Form::label('kategori_id','Kategori')}}
      <select class="form-control" name="kategori_id">
        <option>----Pilih Kategori----</option>
        @foreach ($kategoris as $kategori)
          <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      {{Form::label('subkategori1s_id','Sub Kategori')}}
      <select class="form-control" name="subkategori1s_id">
        <option>----Pilih Sub Kategori----</option>
      </select>
    </div>
    <div class="form-group">
      {{Form::label('subkategori2s_id','Sub Kategori 2')}}
      <select class="form-control" name="subkategori2s_id">
        <option>----Pilih Sub Kategori 2----</option>
      </select>
    </div>
    <div class="form-group">
      {{Form::label('gambar','Gambar')}}
      {{Form::file('gambar')}}
    </div>
    <div class="form-group">
      {{Form::label('deskripsi','Deskripsi')}}
      {{Form::textarea('deskripsi','Deskripsi Produk',['class'=>'form-control'])}}
    </div>

    <div class="box-footer">
      {{Form::submit('Simpan',['class'=>'btn btn-primary'])}}
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

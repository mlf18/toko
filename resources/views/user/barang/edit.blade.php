@extends('user.home')
@section('content_header')
  @endsection
@section('content')
  @include('user.inc.pesan')
  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit Barang</h3>
    </div><!-- /.box-header -->
  {!! Form::open(['action' => ['BarangController@store',$barang->id],'method'=>'POST','enctype'=>"multipart/form-data"]) !!}
  <div class="box-body">
    <div class="form-group">
      {{Form::label('nama','Nama')}}
      {{Form::text('nama',$barang->nama,['class'=>'form-control','placeholder'=>'Nama Barang'])}}
    </div>
    <div class="form-group">
      {{Form::label('kategori_id','Kategori')}}
      <select class="form-control" name="kategori_id">
        <option>----Pilih Kategori----</option>
        @foreach ($kategoris as $kategori)
          @if ($kategori->id==$barang->subkategori2s->kategori_id)
              <option value="{{$kategori->id}}" selected="selected">{{$kategori->kategori}}</option>
          @else
              <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      {{Form::label('subkategori1s_id','Sub Kategori')}}
      <select class="form-control" name="subkategori1s_id">
        <option>----Pilih Sub Kategori----</option>
        @foreach ($subkategori1s as $subkategori)
          @if ($subkategori->kategori_id==$barang->subkategori2s->kategori_id)
            @if ($subkategori->id==$barang->subkategori2s->subkategori1s_id)
              <option value="{{$subkategori->id}}" selected="selected">{{$subkategori->subkategori1}}</option>
            @else
              <option value="{{$subkategori->id}}">{{$subkategori->subkategori1}}</option>
            @endif
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      {{Form::label('subkategori2s_id','Sub Kategori 2')}}
      <select class="form-control" name="subkategori2s_id">
        <option>----Pilih Sub Kategori 2----</option>
        @foreach ($subkategori2s as $subkategori2)
          @if ($subkategori2->subkategori1s_id==$barang->subkategori2s->subkategori1s_id)
            @if ($subkategori2->id==$barang->subkategori2s->id)
              <option value="{{$subkategori2->id}}" selected="selected">{{$subkategori2->subkategori2}}</option>
            @else
              <option value="{{$subkategori2->id}}">{{$subkategori2->subkategori2}}</option>
            @endif
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <img src="{{url('storage/images/'.$barang->gambar)}}"/>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          {{Form::label('gambar','Gambar')}}
          {{Form::file('gambar')}}
        </div>
      </div>
    </div>
    <div class="form-group">
      {{Form::label('deskripsi','Deskripsi')}}
      {{Form::textarea('deskripsi',$barang->deskripsi,['class'=>'form-control'])}}
    </div>
    <div class="box-footer">
      {{Form::submit('Simpan',['class'=>'btn btn-primary'])}}
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

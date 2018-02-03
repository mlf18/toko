@extends('user.home')
@section('content_header')
  <h1>Daftar Kategori</h1>
@stop
@section('content')
  @include('user.inc.pesan')
  <div class="row">
    <div class="col-md-4">
      @include('user.kategori.index')
    </div>
    <div class="col-md-8">
      <div class="col-md-12">
        @include('user.subkategori1.index')
      </div>
      <div class="col-md-12">
        @include('user.subkategori2.index')
      </div>
    </div>
  </div>
@endsection

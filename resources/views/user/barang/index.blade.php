@extends('user.home')
@section('content')
<div class="box">
  <div class="box-body table-responsive">
    <div class="row">
      <div class="col-md-4">
        <button id="showFilter" class="btn btn-default">Filter</button>
      </div>
    </div>
    <div id="filterData">
    <div class="row">
      <div class="col-md-4">
        <div class="col-md-4">
          <label>Kategori</label>
        </div>
        <div class="col-md-4">
          <label>Sub Kategori</label>
        </div>
        <div class="col-md-4">
          <label>Sub Kategori 2</label>
        </div>
      </div>
    </div>
      <div class="row">
        <div class="col-md-4">
        <div class="col-md-4">
          <select class="form-control">
            <option>kat1</option>
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-control">
            <option>kat1</option>
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-control">
            <option>kat1</option>
          </select>
        </div>
    </div>
    <div class="col-md-2">
      <a class="btn btn-default">Terapkan</a>
    </div>
    </div>
  </div>
    <br>
    <table id="data" class="table table-bordered table-hover">
      <thead>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($barangs as $barang)
          <tr>
              <td>{{$barang->id}}</td>
              <td>{{$barang->nama}}</td>
              <td>{{$barang->subkategori2s->kategori->kategori}}</td>
              <td>
                {!! Form::open(['action' => ['BarangController@destroy',$barang->id],'method'=>'POST']) !!}
                {{Form::hidden('_method','DELETE')}}
                <a href="{{url('user/barang/'.$barang->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                <a href="{{url('user/barang/'.$barang->id.'/edit')}}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                {{ Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=> 'return confirm("Apakah anda yakin ?")'] )  }}
                {!! Form::close() !!}
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

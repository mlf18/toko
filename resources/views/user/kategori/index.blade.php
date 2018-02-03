<div class="box">
  <div class="box-body table-responsive">
    <table id="data" class="table table-bordered table-hover">
      <thead>
        <tr>
            <th>Id</th>
            <th>Kategori</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategoris as $kategori)
          <tr>
              <td>{{$kategori->id}}</td>
              <td>{{$kategori->kategori}}</td>
              <td>
                {!! Form::open(['action' => ['KategoriController@destroy',$kategori->id],'method'=>'POST']) !!}
                {{Form::hidden('_method','DELETE')}}
                <a href="{{url('user/kategori/'.$kategori->id.'/edit')}}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                {{ Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=> 'return confirm("Apakah anda yakin ?")'] )  }}
                {!! Form::close() !!}
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

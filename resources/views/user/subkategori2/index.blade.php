<div class="box">
  <div class="box-body table-responsive">
    <table id="data" class="table table-bordered table-hover">
      <thead>
        <tr>
            <th>Id</th>
            <th>Sub kategori 2</th>
            <th>Sub kategori 1</th>
            <th>Kategori</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($subkategori2s as $sk)
          <tr>
              <td>{{$sk->id}}</td>
              <td>{{$sk->subkategori2}}</td>
              <td>{{$sk->subkategori1s->subkategori1}}</td>
              <td>{{$sk->kategori->kategori}}</td>
              <td>
                {!! Form::open(['action' => ['Subkategori2Controller@destroy',$sk->id],'method'=>'POST']) !!}
                {{Form::hidden('_method','DELETE')}}
                <a href="{{url('user/subkategori2/'.$sk->id.'/edit')}}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                {{ Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=> 'return confirm("Apakah anda yakin ?")'] )  }}
                {!! Form::close() !!}
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="box">
  <div class="box-body table-responsive">
    <table id="data" class="table table-bordered table-hover">
      <thead>
        <tr>
            <th>Id</th>
            <th>Sub kategori</th>
            <th>Kategori</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($subkategoris as $sk)
          <tr>
              <td>{{$sk->id}}</td>
              <td>{{$sk->subkategori1}}</td>
              <td>{{$sk->kategori->kategori}}</td>
              <td>
                {!! Form::open(['action' => ['Subkategori1Controller@destroy',$sk->id],'method'=>'POST']) !!}
                {{Form::hidden('_method','DELETE')}}
                <a href="{{url('user/subkategori1/'.$sk->id.'/edit')}}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
                {{ Form::button('<i class="fa fa-trash-o"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=> 'return confirm("Apakah anda yakin ?")'] )  }}
                {!! Form::close() !!}
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

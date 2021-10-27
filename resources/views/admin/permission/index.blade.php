@extends("theme.$theme.layout")
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
  Autorisations
@endsection

@section('content')
@include('includes.form-messages')

<div class="mx-5 pb-4">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title"></h3>
      <div class="card-tools">
        <a href="{{route('permission.create')}}" class="btn btn-tool bg-dark p-2 m-1">
          <i class="fas fa-plus-square p-1"></i> Ajouter Autorisation
        </a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="table-data" class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>URL slug</th>
            <th style="width: 40px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $permission)
              <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->slug }}</td>
                <td class="text-right py-0 align-middle"> 
                  <div class="btn-group btn-group-sm">
                  <a  href="{{ route('permission.edit', $permission->id) }}" data-toggle="tooltip" 
                      data-placement="bottom" title="Editer" class="btn-action-table"><i class="far fa-edit p-1"></i>
                  </a>
                  <form action="{{route('permission.destroy', $permission->id)}}" method="post" class="d-inline form-destroy">
                    @csrf @method('delete')
                    <button type="submit" data-toggle="tooltip" title="Supprimer" class="btn-action-table"><i class="fas fa-trash-alt"></i></button>
                  </form>
                  </div>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
      </ul>
    </div>
  </div>
  <!-- /.card -->
</div> <!-- /.mx-5 pb-4 -->

@endsection
@extends("theme.$theme.layout")

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
Rôles
@endsection

@section('content')
@include('includes.form-messages')

<div class="mx-5 w-50"> 
  <div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="card-tools">
          <a href="{{route('role.create')}}" class="btn btn-tool bg-dark p-2 m-1">
            <i class="fas fa-plus-square p-1"></i> Ajouter rôle
          </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <div class="row">
        <div class="col-3"></div>
      <table id="table-data" class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Nom de rôle</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
      @foreach ($roles as $role)
          <tr>
              <td>{{$role->name}}</td>
              <td class="text-right py-0 align-middle"> 
                <div class="btn-group btn-group-sm">
                <a  href="{{ route('role.edit', $role->id) }}" data-toggle="tooltip" 
                    data-placement="bottom" title="Editer" class="btn-action-table"><i class="far fa-edit p-1"></i>
                </a>
                <form action="{{route('role.destroy', $role->id)}}" method="post" class="d-inline form-destroy">
                  @csrf @method('delete')
                  <button type="submit" data-toggle="tooltip" title="Supprimer" class="btn-action-table"><i class="fas fa-trash-alt"></i></button>
                </form>
                </div>
              </td>
          </tr>    
      @endforeach
        </tbody>
      </table>
    </div> <!-- /.card-body -->
    
    <div class="card-footer">    
    </div> <!-- /.card-footer -->

  </div> <!-- /.card -->
</div> <!-- mx-5 w-50 -->

@endsection
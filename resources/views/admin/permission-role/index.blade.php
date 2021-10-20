@extends("theme.$theme.layout")

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/permission-role/index.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
    Autorisations par rôle
@endsection

@section('content')
@include('includes.form-messages')
<div class="row">
    <div class="col-lg-12">
      
      <div class="card card-info mx-5">
        <div class="card-header">
          <h3 class="card-title">Assignation d'Autorisations à un rôle</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @csrf
          <table id="table-data" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Autorisation</th>
            @foreach ($roles as $id => $name)
                <th class="text-center">{{$name}}</th>    
            @endforeach
              </tr>
            </thead>
            <tbody>
            <!-- permissions -->
            @foreach ($permissions as $key => $permission)
              <tr>
                <td class="font-weight-bold"><i class="fa fa-arrows-alt"></i> {{$permission["name"]}}</td>
                @foreach($roles as $id => $name)
                    <td class="text-center">
                        <input
                        type="checkbox"
                        class="permission_role"
                        name="permission_role[]"
                        data-permissionid={{$permission["id"]}}
                        value="{{$id}}" {{in_array($id, array_column($permissionsRoles[$permission["id"]], "id"))? "checked" : ""}}>
                    </td>
                @endforeach
              </tr>

             

             
             @endforeach <!-- /.permissions -->
                
            </tbody>
          </table>
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer clearfix">  
        </div>
      </div>
      <!-- /.card -->
    </div> <!-- /.col-lg-12 -->
</div> <!-- /.row -->

@endsection
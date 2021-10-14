@extends("theme.$theme.layout")

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu-role/index.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
    Menus par rôles
@endsection

@section('content')
@include('includes.form-messages')
<div class="row">
    <div class="col-lg-12">
      
      <div class="card card-info mx-5">
        <div class="card-header">
          <h3 class="card-title">Assignation d'un menu à un rôle</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @csrf
          <table id="table-data" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Menu</th>
            @foreach ($roles as $id => $name)
                <th class="text-center">{{$name}}</th>    
            @endforeach
              </tr>
            </thead>
            <tbody>
            <!-- menus -->
            @foreach ($menus as $key => $menu)
              @if ($menu["parent_menu"] != 0)
                  @break
              @endif
              <tr>
                <td class="font-weight-bold"><i class="fa fa-arrows-alt"></i> {{$menu["name"]}}</td>
                @foreach($roles as $id => $name)
                    <td class="text-center">
                        <input
                        type="checkbox"
                        class="menu_role"
                        name="menu_role[]"
                        data-menuid={{$menu["id"]}}
                        value="{{$id}}" {{in_array($id, array_column($menusRoles[$menu["id"]], "id"))? "checked" : ""}}>
                    </td>
                @endforeach
              </tr>

              <!-- submenu child-->
              @foreach($menu["submenu"] as $key => $child)
                <tr>
                    <td class="pl-30"><i class="fa fa-arrow-right"></i> {{ $child["name"] }}</td>
                    @foreach($roles as $id => $name)
                        <td class="text-center">
                            <input
                            type="checkbox"
                            class="menu_role"
                            name="menu_role[]"
                            data-menuid={{$child[ "id"]}}
                            value="{{$id}}" {{in_array($id, array_column($menusRoles[$child["id"]], "id"))? "checked" : ""}}>
                        </td>
                    @endforeach
                </tr>

                <!-- submenu child2-->
                @foreach ($child["submenu"] as $key => $child2)
                  <tr>
                      <td class="pl-40"><i class="fa fa-arrow-right"></i> {{$child2["name"]}}</td>
                      @foreach($roles as $id => $name)
                          <td class="text-center">
                              <input
                              type="checkbox"
                              class="menu_role"
                              name="menu_role[]"
                              data-menuid={{$child2[ "id"]}}
                              value="{{$id}}" {{in_array($id, array_column($menusRoles[$child2["id"]], "id"))? "checked" : ""}}>
                          </td>
                      @endforeach
                  </tr>

                  <!-- submenu child3-->
                  @foreach ($child2["submenu"] as $key => $child3)
                      <tr>
                          <td class="pl-50"><i class="fa fa-arrow-right"></i> {{$child3["name"]}}</td>
                          @foreach($roles as $id => $name)
                          <td class="text-center">
                              <input
                              type="checkbox"
                              class="menu_role"
                              name="menu_role[]"
                              data-menuid={{$child3[ "id"]}}
                              value="{{$id}}" {{in_array($id, array_column($menusRoles[$child3["id"]], "id"))? "checked" : ""}}>
                          </td>
                          @endforeach
                      </tr>
                  @endforeach <!-- /.submenu child3-->
                @endforeach <!-- /.submenu child2-->
              @endforeach <!-- /.submenu child-->
            @endforeach <!-- /.menus -->
                
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
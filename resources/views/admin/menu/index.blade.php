@extends("theme.$theme.layout")

@section("styles")
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/jquery-nestable/jquery.nestable.css")}}">
@endsection

@section("scripts")
    <script src="{{asset("assets/$theme/plugins/jquery-nestable/jquery.nestable.js")}}"> type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
Menus
@endsection

@section('content')
@include('includes.form-messages')
<div class="mx-5 pb-4">
    <div class="card card-info">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{route('menu.create')}}" class="btn btn-tool bg-dark p-2 m-1">
                  <i class="fas fa-plus-square p-1"></i> Ajouter menu
                </a>
              </div>
        </div>
        <!-- /.card-header -->
        <div class="box-body">
            <br>
            @csrf
            <div class="row">
                <div class="col-1">
                
                </div>
                <div class="col-10">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($menus as $key => $item)
                                @if ($item["parent_menu"] != 0)
                                    @break
                                @endif
                                @include("admin.menu.menu-item",["item" => $item])
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-1">
                </div>
            </div>
            <br>
        </div>
        <div class="card-footer">
            
        </div>
    </div> 
    Pour modifier l'ordre du menu : 
    <ul>
        <li>Cliquez sur l'icône grise d'un élément de menu et faites-la glisser vers le haut ou vers le bas</li>
        <li>Si vous voulez créer un sous-menu, faites-la glisser vers la droite ou la gauche</li>
    </ul>
    
    <p>
        Pour éditer un menu il suffit de cliquer dessus
    </p>
</div>

@endsection

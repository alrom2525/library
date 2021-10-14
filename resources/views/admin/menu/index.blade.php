@extends("theme.$theme.layout")

@section("styles")
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/jquery-nestable/jquery.nestable.css")}}">
@endsection

@section("scripts")
    <script src="{{asset("assets/$theme/plugins/jquery-nestable/jquery.nestable.js")}}"> type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
@include('includes.form-messages')
<div class="mx-5">
    <div class="card card-info">
        <div class="card-header">
            <h5>Menus</h5>
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
</div>
@endsection

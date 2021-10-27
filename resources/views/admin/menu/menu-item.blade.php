@if ($item["submenu"] == [])
<!-- Parent -->
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route("menu.edit", $item["id"])}}">{{$item["name"] . " | Url -> " . $item["url"]}} &nbsp; Icon -> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icon"]) ? $item["icon"] : ""}}"></i></a>
        <form action="{{route('menu.destroy', $item["id"])}}" method="post" class="d-inline form-destroy">
            @csrf @method('delete')
            <button type="submit" data-toggle="tooltip" title="Supprimer ce menu" class="btn-action-table float-right"><i class="fas fa-trash-alt"></i></button>
        </form>
    </div>
</li>
@else
<!-- Child -->
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route("menu.edit", $item["id"])}}">{{$item["name"] . " | Url -> " . $item["url"]}} &nbsp; Icon -> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icon"]) ? $item["icon"] : ""}}"></i></a>
    
        <form action="{{route('menu.destroy', $item["id"])}}" method="post" class="d-inline form-destroy">
            @csrf @method('delete')
            <button type="submit" data-toggle="tooltip" title="Supprimer ce menu" class="btn-action-table float-right"><i class="fas fa-trash-alt"></i></button>
        </form>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("admin.menu.menu-item",[ "item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif

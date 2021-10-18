@if ($item["submenu"] == [])
    <li class="nav-item">
        <a href="{{url($item['url'])}}" class="nav-link {{getActiveMenu($item["url"])}}">
          @if ($item["parent_menu"]==0)
            <i class="fas {{$item["icon"]}}"></i>
          @else
            <i class="far fa-circle nav-icon"></i>
          @endif
            <p> &nbsp; {{$item["name"]}} </p>
        </a>
    </li>
@else
    <li class="nav-item menu-open">
        <a href="#" class="nav-link">
          <i class="fas {{$item["icon"]}} nav-icon"></i> 
          <p> 
            &nbsp; {{$item["name"]}}
              <i class="right fas fa-angle-left"></i>
          </p>      
        </a>
        <ul class="nav nav-treeview">
            @foreach ($item["submenu"] as $submenu)
                @include("theme.$theme.menu-item", ["item" => $submenu])
            @endforeach
        </ul>
    </li>
@endif

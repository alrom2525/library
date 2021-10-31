<!-- Left navbar links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

  <!-- User Dropdown Menu -->
  <li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
      <img src="{{asset("assets/$theme/dist/img/user9-160x160.png")}}" class="user-image img-circle elevation-2" alt="User Image">
      <span class="d-none d-md-inline">{{ session()->get('name') ?? 'Guest' }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- User image -->
      <li class="user-header bg-primary">
        <img src="{{asset("assets/$theme/dist/img/user9-160x160.png")}}" class="img-circle elevation-2" alt="User Image">

        <p>
          {{ session()->get('name') ?? 'Guest' }}
          <small> {{ session()->get('role_name') }} </small>
        </p>
      </li>
      <!-- Menu Body -->
      <li class="user-body">
        <div class="row">
          <!-- Modal window for users with more than one role -->
          @if(session()->get("roles") && count(session()->get("roles")) > 1)
            <div class="col-12 text-center">
              <a href="#" class="btn btn-default btn-flat change-role">Changer de rôle</a>
            </div>
          @endif <!-- /.Modal window for users with more than one role -->
        </div>
        <!-- /.row -->
      </li>
      <!-- Menu Footer-->
      <li class="user-footer">
        <a href="#" class="btn btn-default btn-flat">Profil</a>
        <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right">Déconnexion</a>
      </li>
    </ul>
  </li>
  <!-- /.User Dropdown Menu -->

  <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>

</ul>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('head-title', 'Library')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
  <!-- Toastr a Javascript library for non-blocking notifications -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  
  @yield('styles')

  <!-- Custom css -->
  <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @include("theme/$theme/header");
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include("theme/$theme/aside");
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('page-title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('breadcrumb')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    @include('theme/'. $theme. '/footer');
  </footer>

  <!-- Modal window for users with more than one role -->
  @if(session()->get("roles") && count(session()->get("roles")) > 1)
  @csrf
  <div class="modal fade" id="modal-select-role" data-role-set="{{empty(session()->get("role_id")) ? 'NO' : 'YES'}}" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rôles d'utilisateur</h4>
            </div>
            <div class="modal-body">
                <h5>Vous avez plus d'un rôle sur la plateforme</h5>
                <p>Sélectionnez avec lequel d'entre eux vous souhaitez vous connecter puis cliquez sur le bouton fermer</p>
                <div class="m-3">
                  @foreach(session()->get("roles") as $key => $role)
                      <li>
                          <a href="#" class="asign-role" data-roleid="{{$role['id']}}" data-rolename="{{$role["name"]}}">
                              {{$role["name"]}}
                          </a>
                      </li>
                  @endforeach
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <a href="{{ route('start') }}" class="btn btn-primary"> Fermer</a>
            </div>
          </div>
        </div>
    </div>
  </div>
  @endif <!-- /.Modal window for users with more than one role -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset("assets/$theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("assets/$theme/dist/js/demo.js")}}"></script>
<!-- jquery-validation -->
<script src="{{asset("assets/$theme/plugins/jquery-validation/jquery.validate.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/jquery-validation/localization/messages_fr.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/jquery-validation/additional-methods.min.js")}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset("assets/js/scripts.js")}}"></script>
<script src="{{asset("assets/js/functions.js")}}"></script>
@yield('scripts')

<!-- Page specific script -->
<script>
  $(function () {
    $('#general-form').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 5
        },
        terms: {
          required: true
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a vaild email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>
</body>
</html>
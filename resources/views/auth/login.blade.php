<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Système | Se connecter </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('start') }}" class="h1"><b>Système</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connectez-vous <br>pour démarrer votre session</p>
      @if ($errors->any())
        <div class="alert bg-maroon alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> </h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <br>
      <form action="{{ route('login-post') }}" method="post" autocomplete="off">
        @csrf
        <label for="email">Adresse courriel</label>
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="test@example.com">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <label for="password">Mot de passe</label>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
        <br>
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Rester connecté
              </label>
            </div>
          </div>
        </div>

      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
</body>
</html>

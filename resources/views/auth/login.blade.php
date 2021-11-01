@extends("theme.$theme.app")

@section('content')
<div class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1"><b>Système</b></a>
      </div>
      <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
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

          <p class="mt-3">
            <a href="{{ route('password.request') }}">
              Mot de passe oublié
            </a>
          </p>

        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  </div> <!-- /.class="hold-transition login-page" --> 
  
@endsection
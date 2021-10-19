@extends("theme.$theme.layout")

@section('head-title')
    Library
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/create.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
    Éditer les menus
@endsection

@section('content')

@include('includes.form-errors')
@include('includes.form-messages')

<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title"><a href="https://fontawesome.com/v5.0/icons?d=gallery&p=2&m=free" target="_blank">Liste d'icônes</a></h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form id="general-form" action="{{route('menu.update', ['id' => $menu->id])}}" method="POST" class="form-horizontal" autocomplete="off">
      @csrf  @method('put')
      <div class="card-body">
        @include('admin.menu.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
            @include('includes.form-button-edit')
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->

@endsection
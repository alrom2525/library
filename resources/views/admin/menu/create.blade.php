@extends("theme.$theme.layout")

@section('head-title')
    Library
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/create.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
 Create menus
@endsection

@section('content')

@include('includes.form-errors')
@include('includes.form-messages')

<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title"><a href="https://fontawesome.com/v5.0/icons?d=gallery&p=2&m=free" target="_blank">Icon list</a></h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form id="general-form" action="{{route('menu.store')}}" method="POST" class="form-horizontal">
      @csrf 
      <div class="card-body">
        @include('admin.menu.form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
            @include('includes.form-button-create')
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->

@endsection
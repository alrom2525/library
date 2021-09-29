@extends("theme.$theme.layout")

@section('head-title')
    Library
@endsection

@section('page-title')
 Create menus
@endsection

@section('content')

<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Horizontal Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('menu.store')}}" method="POST" id="general-form" class="form-horizontal">
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
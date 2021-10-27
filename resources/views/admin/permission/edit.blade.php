@extends("theme.$theme.layout")

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/permission/create.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
Editer des autorisations
@endsection

@section('content')

@include('includes.form-errors')
@include('includes.form-messages')

<div class="mx-5">
  <!-- Horizontal Form -->
  <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="card-tools">
          
        </div>
      </div>
      <!-- /.card-header -->
      
      <!-- form start -->
      <form id="general-form" action="{{route('permission.update', $permission->id)}}" method="POST" class="form-horizontal" autocomplete="off">
        @csrf @method('put')
        <div class="card-body">
          @include('admin.permission.form')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
              @include('includes.form-button-edit')
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection
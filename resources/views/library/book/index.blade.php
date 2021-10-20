@extends("theme.$theme.layout")

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('page-title')
Livres
@endsection

@section('content')
@include('includes.form-messages')

<div class="mx-5 w-50"> 
  <div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="card-tools">
          <a href="{{route('book.create')}}" class="btn btn-tool bg-dark p-2 m-1">
            <i class="fas fa-plus-square p-1"></i> Ajouter livre
          </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <div class="row">
        <div class="col-3"></div>
      <table id="table-data" class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Titre de livre</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
      @foreach ($books as $book)
          <tr>
              <td>{{$book->title}}</td>
              <td class="text-right py-0 align-middle"> 
                <div class="btn-group btn-group-sm">
                <a  href="{{ route('book.edit', ['id' => $book->id]) }}" data-toggle="tooltip" 
                    data-placement="bottom" title="Editer" class="btn-action-table"><i class="far fa-edit p-1"></i>
                </a>
                <form action="{{route('book.destroy', ['id' => $book->id] )}}" method="post" class="d-inline form-destroy">
                  @csrf @method('delete')
                  <button type="submit" data-toggle="tooltip" title="Supprimer" class="btn-action-table"><i class="fas fa-trash-alt"></i></button>
                </form>
                </div>
              </td>
          </tr>    
      @endforeach
        </tbody>
      </table>
    </div> <!-- /.card-body -->
    
    <div class="card-footer">    
    </div> <!-- /.card-footer -->

  </div> <!-- /.card -->
</div> <!-- mx-5 w-50 -->

@endsection
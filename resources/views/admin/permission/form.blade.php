<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label required">Nom d'autorisation</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="name" name="name" placeholder="Nom d'autorisation" value="{{old('name', $permission->name ?? '')}}" required>
    </div>
</div>

<div class="form-group row">
    <label for="slug" class="col-sm-2 col-form-label required">URL slug</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="slug" name="slug" placeholder="URL slug" value="{{old('slug', $permission->slug ?? '')}}" required>
    </div>
</div>


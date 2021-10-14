<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label required">Nom de rôle</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="name" name="name" placeholder="Nom de rôle" value="{{old('name', $role->name ?? '')}}" required>
    </div>
</div>

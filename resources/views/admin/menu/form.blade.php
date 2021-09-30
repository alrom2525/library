<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label required">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-2 col-form-label required">URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{old('url')}}" required>
    </div>
</div>
<div class="form-group row">
    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
    <div class="col-sm-8">
      <input type="icon" class="form-control" id="icon" name="icon" placeholder="Icon" value="{{old('icon')}}">
    </div>
    <div class="col-sm-1">
      <h1><i id="show-icon" class="fas {{old("icon")}}"></i></h1>
    </div>
</div>

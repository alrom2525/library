<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label required">Nom d'utilisateur</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="name" name="name" placeholder="Nom d'utilisateur" value="{{old('name', $user->name ?? '')}}" required>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label required">Adresse de courriel</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{old('email', $user->email ?? '')}}" required>
    </div>
</div>

<div class="form-group row">
  <label for="password" class="col-sm-2 col-form-label required">Mot de passe</label>
  <div class="col-sm-4">
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="{{old('password', $user->password ?? '')}}" required>
  </div>
</div>

<div class="form-group row">
  <label for="re_password" class="col-sm-2 col-form-label required">Confirmez le mot de passe</label>
  <div class="col-sm-4">
    <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Retaper le mot de passe" value="{{old('password', $user->password ?? '')}}" required>
  </div>
</div>

<div class="form-group row">
  <label for="role" class="col-sm-2 col-form-label required">Sélectionnez le rôle</label>
  <div class="col-sm-4">
    <select name="role_id" id="role_id" class="form-control" required>
      <option value="">Sélectionnez le rôle</option>
      @foreach($roles as $id => $name)
          <option value="{{$id}}" {{old("role_id", $user->roles[0]->id ?? "") == $id ? "selected" : ""}}>{{$name}}</option>
      @endforeach
    </select>
  </div>
</div>

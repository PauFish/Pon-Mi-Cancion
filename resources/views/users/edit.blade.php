 <!-- Importamos los layauts y el content -->
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="card" style="margin:20px;">
        <div class="card-header">Editar Usuario</div>
        <div class="card-body">
          <form action="/users/{{$user->id}}" method="POST">
             <!-- seguridad y muestra el estado de la sesion -->
            @csrf
             <!-- Para que le llegue un put utilizando un form con post -->
            @method('PUT')
            <label>id</label>
            <input type="hidden" name="id" id="id" value="{{$user->id}}" />
            
            <label>name</label></br>
            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"></br>

            <label>email</label></br>
            <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control"></br>

            <label>contraseña</label></br>
            <input type="text" name="password" id="password" value="{{$user->password}}" class="form-control" accept="image/*"></br>

            <label>telefono</label></br>
            <input type="text" name="phone" id="phone" value="{{$user->phone}}" class="form-control"></br>

            <label>Roles:  Admin=1  Dj=2  Usuario=0 </label></br>
            <input type="text" name="type" id="type" value="{{$user->type}}" class="form-control"></br>

            <a href="/admin.home" class="btn btn-danger">Volver</a>
            <button type="submit" class="btn btn-success">Guardar</br>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Termina todas las secciones inicializadas al principio -->
@stop
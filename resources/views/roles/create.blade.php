 <!-- Importamos los layauts y el content -->
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="card" style="margin:20px;">
        <div class="card-header">
          <h2>Nuevo Role</h2>
        </div>
        <div class="card-body">
          <form action="/roles" method="POST">
             <!-- seguridad -->
            @csrf
            <label class="form-label">Nombre</label></br>
            <input type="text" name="name" id="name" class="form-control"></br>
            <a href="/homeAdmin" class="btn btn-danger">Volver</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Termina todas las secciones inicializadas al principio -->
@endsection
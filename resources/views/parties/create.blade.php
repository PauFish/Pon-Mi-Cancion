 <!-- Importamos los layauts y el content -->
@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="card" style="margin:20px;">
        <div class="card-header">
          <h2>Crear Nueva Fiesta</h2>
        </div>
        <div class="card-body">
          <form action="/parties" method="POST">
              <!-- seguridad -->
            @csrf
            <label class="form-label">Nombre</label></br>
            <input type="text" name="name" id="name" class="form-control"></br>
            <label class="form-label">Photo</label></br>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*"></br>
            <a href="/djParty" class="btn btn-danger">Volver</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Termina todas las secciones inicializadas al principio -->
@endsection
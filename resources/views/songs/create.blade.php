 <!-- Importamos los layauts y el content -->
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="card" style="margin:20px;">
        <div class="card-header">
          <h2>Crear Nueva Canción</h2>
        </div>
        <div class="card-body">
          <!-- Home es nuestra songs -->
          <form action="/songs" method="POST">
            @csrf
            <label class="form-label">Cancion</label></br>
            <input type="text" name="title" id="title" class="form-control"></br>
            <label class="form-label">Artista</label></br>
            <input type="text" name="artist" id="artist" class="form-control"></br>
            <input type="hidden" name="vote" id="vote" value="0" class="form-control"></br>
            <a href="/djSong" class="btn btn-danger">Volver</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Termina todas las secciones inicializadas al principio -->
@endsection
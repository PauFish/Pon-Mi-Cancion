@extends('layouts.app')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header"><h2>Crear Nueva Fiesta</h2></div>
  <div class="card-body">
       <!-- Home es nuestra parties -->
      <form action="/parties" method="POST">
        @csrf
        <label class="form-label">Nombre</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label class="form-label">Photo</label></br>
        <input type="text" name="photo" id="photo" class="form-control"></br>
        <a href="/home" class="btn btn-danger">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
    
  </div>
</div>
  
@endsection
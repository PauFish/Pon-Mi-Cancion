 <!-- Importamos los layauts y el content -->
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-15">
            <div class="card" style="margin:20px;">
              <div class="card-header">Esta Es Tu Fiesta</div>
              <div class="card-body">
                <div class="card-body">
                  <h5 class="card-title">Nombre : {{ $parties->name }}</h5>
                  <p class="card-text">Foto : {{ $parties->photo }}</p>
                </div>
                </hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Termina todas las secciones inicializadas al principio -->
@stop
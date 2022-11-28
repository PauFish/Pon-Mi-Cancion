@extends('layouts.app')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Editar Fiesta</div>
  <div class="card-body">

      <form action="/parties/{{$party->id}}"  method="POST">
      @csrf    
    @method('PUT')
        <input type="hidden" name="id" id="id" value="{{$party->id}}" />
        
        <label>Nombre</label></br> 
        <input type="text" name="name" id="name" value="{{$party->name}}" class="form-control"></br>

        <label>Photo</label></br>
        <input type="text" name="photo" id="photo" value="{{$party->photo}}" class="form-control"></br>

        <a href="/home" class="btn btn-danger">Volver</a>
        <button type="submit"  class="btn btn-success">Editar</br>

    </form>
      
  </div>
</div>
  
@stop
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-15">
      <div class="card" style="margin:20px;">
        <div class="card-header">Editar Fiesta</div>
        <div class="card-body">

          <form action="/songs/{{$song->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{$song->id}}" />

            <label>Cancion</label></br>
            <input type="text" name="title" id="title" value="{{$song->title}}" class="form-control"></br>

            <label>Artista</label></br>
            <input type="text" name="artist" id="artist" value="{{$song->artist}}" class="form-control"></br>


            <input type="hidden" name="vote" id="vote" value="{{$song->vote}}" class="form-control"></br>

            <a href="/djSong" class="btn btn-danger">Volver</a>
            <button type="submit" class="btn btn-success">Guardar</br>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@stop
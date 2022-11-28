@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header"><h1>Las Mejores Fiestas Las Haces Tú!!!</h1></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <div class="card">
        <div class="card-body">
@php
    $songs=\App\Models\Song::all();
@endphp

 <!-- Create -->
 <a href="{{ url('/songs/create') }}" class="btn btn-success btn-sm" title="Añadir Cancion">Añadir Canción</a>
   

<div class="songs_container">
    
    <h2 class="text-white bg-primary">Vota tu cancóon preferida YA!</h2>
    
<table id="songs_Table" class="table table-striped">
    <thead> 
        <tr>
            <th>ID</th>
            <th>Cancion</th>
            <th>Artista</th>
            <th>Votos</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>  
<!--le pasamos la variable en la que se almaceno todas las Songs en SongController
 y cada vez que entre lo almacena en $song -->
        @foreach($songs as $song)
        <tr>
            <td>{{$song->id}}</td>
            <td>{{$song->title}}</td>
            <td>{{$song->artist}}</td>
            <td>{{$song->vote}}</td>
            <!-- editar fiestas-->
            <td><a href="/songs/{{$song->id}}/edit" class="btn btn-info">Editar Fiesta</a></td>       
            <!-- eliminar fiestas-->
            <td>
                <form action="{{route('songs.destroy',$song->id)}}" method='POST'>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar Fiesta</button>
                </form>
            </td>


        </tr>  
        @endforeach    
        <tbody>
    </table>
</div>

@endsection
</div>
</div>
                </div>
            </div>
        </div>
    </div>  
</div>
<br>



   
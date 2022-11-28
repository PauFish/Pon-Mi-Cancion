@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">
                    <h1>Las Mejores Canciones!!!</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- Create -->
                    <a href="{{ url('/songs/create') }}" class="btn btn-success" title="Añadir Cancion">Añadir Canción</a>
                    <!-- Para moverse a canciones-->
                    <td><a href="/home" class="btn btn-warning" type="button">Ver Fiestas</a></td>
                    <div class="songs_container">
                        <br>
                        <div class="card">

                            <div class="card-body">

                                @php
                                $songs=\App\Models\Song::all();
                                @endphp



                                <div class="songs_container">

                                    <h2 class="text-white bg-primary">Vota tu canción preferida YA!</h2>

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
                                            <!-- editar Canciones-->
                                            <td><a href="/songs/{{$song->id}}/edit" class="btn btn-info">Editar Canción</a></td>
                                            <!-- eliminar Canciones-->
                                            <td>
                                                <form action="{{route('songs.destroy',$song->id)}}" method='POST'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Eliminar Canción</button>
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
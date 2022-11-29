
@extends('layouts.app')

@section('content')

<style>
body { 
  background: url(images\boss.webp) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>

<div class="container"  >
    <div class="row justify-content-center" >
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Hola Admin de la Web
                    <!--<h1>Dj - Administrador de Fiestas</h1>-->
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Create -->
                    <a href="{{ url('/parties/create') }}" class="btn  btn-success" title="Añadir fiesta">Añadir Fiestas</a>
                    <!-- Para moverse a canciones-->
                    <td><a href="/song" class="btn btn-warning" type="button">Ver Canciones</a></td>

                    <div class="parties_container">
                        <br>
                        <div class="card">
                            <div class="card-body">

                                @php
                                $parties=\App\Models\Party::all();
                                @endphp

                                <h2 class="text-white bg-primary">Selecciona Tu Fiesta YA!!</h2>

                                <table id="parties_Table" class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fiesta</th>
                                            <th>Cartel</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <!--le pasamos la variable en la que se almaceno todas las parties en PartyController
 y cada vez que entre lo almacena en $party -->
                                    <tbody>
                                        @foreach($parties as $party)
                                        <tr>
                                            <td>{{$party->id}}</td>
                                            <td>{{$party->name}}</td>
                                            <td>{{$party->photo}}</td>
                                            <!-- editar fiestas-->
                                            <td><a href="/parties/{{$party->id}}/edit" class="btn btn-info">Editar Fiesta</a></td>
                                            <!-- eliminar fiestas-->
                                            <td>
                                                <form action="{{route('parties.destroy',$party->id)}}" method='POST'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Eliminar Fiesta</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                           



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="card-header">
                    <h1>DJ - Administrador de Canciones</h1>
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
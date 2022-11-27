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
    $parties=\App\Models\Song::all();
@endphp

<div class="songs_container">
    
    <h2 class="text-white bg-primary">Vota tu cancion preferida ya!</h2>
    
<table id="songs_Table" class="table table-striped">
    <thead> 
        <tr>
            <th>Cancion</th>
            <th>Artista</th>
            <th></th>
        </tr>
    </thead>  
<!--le pasamos la variable en la que se almaceno todas las parties en SongController
 y cada vez que entre lo almacena en $song -->
        @foreach($songs as $song)
        <tr>
            <td>{{$song->title}}</td>
            <td>{{$song->artist}}</td>
            <td><button class="btn btn-primary" type="button">Votar</button></td>

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



   
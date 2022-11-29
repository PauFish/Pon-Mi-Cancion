@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">
                    <h1>Las Mejores Fiestas Las Haces Tú!!!</h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif




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
                                            <th>Fiesta</th>
                                            <th>Cartel</th>
                                            <th>Ver</th>
                                        </tr>
                                    </thead>
                                    <!--le pasamos la variable en la que se almaceno todas las parties en PartyController
 y cada vez que entre lo almacena en $party -->
                                    <tbody>
                                        @foreach($parties as $party)
                                        <tr>
                                            <td>{{$party->name}}</td>
                                            <td>{{$party->photo}}</td>
                                            <!-- Para moverse a canciones-->
                                            <td><a href="/userSong" class="btn btn-warning" type="button">Ver Canciones</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @endsection



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
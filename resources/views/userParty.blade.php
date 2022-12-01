@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <img src="images/logo.webp">
                    <h1 style="color:#800080">Las Mejores Fiestas Las Haces Tú!!!</h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="parties_container">

                        <div class="card">
                            <div class="card-body">

                                @php
                                $parties=\App\Models\Party::all();
                                @endphp

                                <h2 style="color: #800080;">Selecciona Tu Fiesta YA!!</h2>

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
                                            <td><a href="/userSong" class="btn text-light btn-warning bg-dark" style="" type="button">Ver</a></td>
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
</div>
<div class="container" style="margin-top:30px">
    <div class="row ">
        <div class="col-md-15">
            <div class="card">
                <div>
                    <h3 style="margin-top:20px; margin-left:20px; color:#800080">Formulario Contacto</h3>
                    <p style="margin-left:20px">¿Eres Dj? Envíanos un mensaje y nos pondremos en contacto lo antes posible, para cambiar tu cuenta de Usuario a Dj </p>
                    
                </div>
                <div class="container">

                            <form target="_blank" action="https://formsubmit.co/73fdc8e6dda59d552258ecef2552adf4" method="POST">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                                        </div>
                                        <div class="col">
                                            <input type="email" name="email" class="form-control" placeholder="Email de contacto" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Cuentanos más" class="form-control" name="message" rows="10" required></textarea>
                                </div>
                                <div>
                                <label><input type="checkbox" value="checkbox" required> Soy un Dj y acepto la política de proteccion de datos</label><br>
                                </div>
                                <input type="hidden" name="_next" value="Contactaremos con usted lo antes posible">
                                <button type="submit" class="btn text-light btn-warning bg-dark" style="margin-bottom:20px; margin-top:20px">Enviar</button>
                            </form>
                        </div>


                    </form>
                </div>
                @endsection
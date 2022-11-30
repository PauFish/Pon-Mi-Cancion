@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                    <img src="images/logo.webp">
                    <h1 class="">Las Mejores Fiestas Las Haces Tú!!!</h1>
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
                                            <td><a href="/userSong" class="btn text-light btn-warning bg-dark" type="button">Ver Canciones</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div class="form-group">
                                <h4></h4>
                                <form action="https://formsubmit.co/73fdc8e6dda59d552258ecef2552adf4" method="POST" class="contact_form d-flex flex-column align-items-center justify-content-center">


                                 <br>           
                                <div>
                                    <h2>¿Eres Dj? Envíanos un mensaje y nos pondremos en contacto lo antes posible para cambiar de usuario a Dj</h2>
                                    <form action="https://formsubmit.co/73fdc8e6dda59d552258ecef2552adf4" method="POST">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Nombre</label>
                                            <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Email" required="required">
                                        </div>
                                        

                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Acepto la política de protección de datos</label>
                                        </div>
                                        
                                        <!--Personalizar enlace una vez apretar boton send gracias a formsubmit.co-->
                                        <!--  Modifica el Asunto del email para hacer renviar desde el email mas guapo-->
                                        <input type="hidden" name="_subject" value="Peticion DJ">
                                        <!--  Nuestra pagina de Gracias le responderemos pronto-->
                                        <!--  Modelo de email hay 3 -->
                                        <input type="hidden" name="_template" value="box">
                                        <!--Mensaje de Gracias-->
                                        <input type="hidden" name="_next" value="Contactaremos con usted lo antes posible">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                        </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
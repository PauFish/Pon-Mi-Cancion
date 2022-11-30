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
            <div class="card" >
                <div>
                <h3 style="margin-top:20px; margin-left:20px; color:#800080">Formulario Contacto</h3>
                <p style="margin-left:20px">¿Eres Dj? Envíanos un mensaje y nos pondremos en contacto lo antes posible, para cambiar tu cuenta de Usuario a Dj  </p>
                        <p></p>
                        </div>
                <div class="form-group" style="margin-top:20px; margin-left:20px">

                    <form action="https://formsubmit.co/73fdc8e6dda59d552258ecef2552adf4" method="post" class="contact_form  ">

                        
                        <div class="form-group">

                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="name" class="form-control" id="exampleInputName1" placeholder="Nombre" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="margin-top:20px">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp" required="required">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-top:20px">
                            <label class="form-check-label" for="exampleCheck1" style="margin-top:20px">Soy DJ y acepto la política de protección de datos</label>
                        </div>

                        <!--Personalizar enlace una vez apretar boton send gracias a formsubmit.co-->
                        <!--  Modifica el Asunto del email para hacer renviar desde el email mas guapo-->
                        <input type="hidden" name="_subject" value="Peticion DJ">
                        <!--  Nuestra pagina de Gracias le responderemos pronto-->
                        <!--  Modelo de email hay 3 -->
                        <input type="hidden" name="_template" value="box">
                        <!--Mensaje de Gracias-->
                        <input type="hidden" name="_next" value="Contactaremos con usted lo antes posible">
                        <button type="submit" class="btn text-light btn-warning bg-dark" style="margin-bottom:20px; margin-top:20px">Enviar</button>
                    </form>
                </div>
                @endsection
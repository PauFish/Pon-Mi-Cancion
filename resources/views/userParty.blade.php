 <!-- Importamos los layauts y el content -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header d-flex  align-items-center">
                </div>
                <div class="card-body">
                     <!-- seguridad y muestra el estado de la sesion -->
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h1 style="color:grey">PON<span style="color: #FF6700;"> MI</span> CANCIÓN</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top:10px">
    <div class="row ">
        <div class="col-md-15">
            <div class="card">
                <div>
                    <div class="card">
                        <div class="card-body">
                            <h2 style="color: #800080;">Selecciona Tu Fiesta YA!!</h2>
                            </table>
                        </div>
                    </div>
                    <!-- Necesario para el for each -->
                    @php
                            $parties=\App\Models\Party::all();
                    @endphp
                    <!-- Recorremos todos los datos que alverga la tabla parties en nuesta base de datos y fuardamos cada fila en $parties -->
                    @foreach($parties as $party)
                    <div class="d-flex  justify-content-center align-items-center ">
                        <img  src="{{asset($party->photo)}}" alt="foto de la fiesta" style="margin:50px" height="400vw" width="700vw" >
                        <p style="margin:30px; font-weight:bold; color: #FF6700;">{{$party->name}}</p>
                        <!-- Para moverse a canciones-->
                        <a href="/userSong" class="btn text-light btn-warning bg-dark " style="margin:30px" type="button">Ver</a></td>
                    </div>
                    @endforeach
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
                <!-- Formulario que envia con un metodo post la informacion a la web formsumit la cual nos envia un email con la informacion del formulario  -->
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
                        <button type="submit" class="btn text-light btn-warning bg-dark" style="margin-bottom:20px; margin-top:20px">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Termina todas las seccionas inicializadas al principio -->
@endsection
 <!-- Nuestra Landing page -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- estilospara solo la landing -->
    <style>
        #welcome h1 {
            font-size: 19vw;
        }

        #welcome h2 {
            font-size: 9vw;
        }
    </style>
</head>

<body>
     <!-- Importamos los layauts y el content -->
    @extends('layouts.app')

    @section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <div class=" d-flex justify-content-center  align-items-center ">
                        <div class=" " id="welcome">
                            <h1 class="mx-auto text-uppercase my-0  text-white-50">Pon<span style="color: #FF6700;"> mi</span> Canción</h1>

                            <h2 class="mx-auto text-white-50 mt-2 mb-5">Fiestas <span style="color: #FF6700;"> a la carta</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Termina todas las secciones inicializadas al principio -->
    @endsection

</body>

</html>
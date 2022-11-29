<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <style>
        #welcome h1 {
            font-size: 150px;
        }

        #welcome h2 {
            font-size: 125px;
        }
    </style>

</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                    <div class="card-body">

                        <div class=" d-flex justify-content-center  align-items-center ">
                            <div class="text-center bold ani-font" id="welcome">
                                <h1 class="mx-auto text-uppercase my-0  text-white-50"><span style="color: #FF6700;">Ponmi</span>Canción</h1>

                                <h2 class="mx-auto text-white-50 mt-2 mb-5">Fiestas <span style="color: #FF6700;">a la carta</span></h2>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @endsection

</body>

</html>
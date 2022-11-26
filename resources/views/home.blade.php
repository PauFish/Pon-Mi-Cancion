@extends('layouts.app')

@section('content')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

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

                    

                    
@php
    $parties=\App\Models\Party::all();
@endphp

<div class="fiestas_container">
    
    <h2 class="text-white bg-primary">Vota tu cancion preferia ya!</h2>
    
<table id="parties_Table " class="table table-striped">
 <thead> 
  <tr>
    <th>Fiesta</th>
    <th>Cartel</th>
    <th></th>
  </tr>
 </thead>  
<!--le pasamos la variable en la que se almaceno todos los usuarios en UserController
 y cada vez que entre lo almacena en $user -->
        @foreach($parties as $party)
        <tr>
            <td>{{$party->name}}</td>
            <td>{{$party->photo}}</td>
            <td><button class="btn btn-primary" type="button">Ver Canciones</button></td>

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
<br>


@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>$('parties_Table').DataTable();</script>
@endsection

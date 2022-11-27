@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header"><h1>Las Mejores Fiestas Las Haces Tú!!!</h1></div>

                <!-- Create -->
                <a href="{{ url('/parties/create_parties') }}" class="btn btn-success btn-sm" title="Añadir fiesta">Añadir Fiesta</a>
                <a href="storage/app/public/pau.pdf" class="btn btn-primary btn-sm" title="Añadir fiesta">PDF</a>

                <iframe src="/pau.pdf" style="width: 660px; height:  640px;" frameborder="0"></iframe></iframe>;

    <div class="parties_container">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

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
            <th>.</th>
            <th>.</th>
        </tr>
    </thead>  
<!--le pasamos la variable en la que se almaceno todas las parties en PartyController
 y cada vez que entre lo almacena en $party -->
 <tbody>
        @foreach($parties as $party)
        <tr>
            <td>{{$party->name}}</td>
            <td>{{$party->photo}}</td>
            <td><a href="/song"><button class="btn btn-primary" type="button" >Entrar</button></a></td>
            
            <td>
                <!-- Show -->
                <a href="{{ url('/home/' . $party->id) }}" title="View Student"><button class="btn btn-info btn-sm"></i> Datos</button></a>
               
                <!-- Update -->
                <a href="{{ url('/home/' . $party->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"></i> Editar</button></a>
                
                <!-- Delete -->
                <form method="POST" action="{{ url('/home' . '/' . $party->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirm delete?')"></i> Eliminar</button>
                </form>
            </td>
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
<br>



   


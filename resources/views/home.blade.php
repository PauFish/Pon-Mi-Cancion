@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="fiestas_container">
    <h1>Las Mejores Fiestas Las Haces Tú!!!</h1>
    </div>
 
    <div class="">
    <h2>Vota tu cancion preferia ya!</h2>
            
        </div>
    </div>
</div>


@endsection



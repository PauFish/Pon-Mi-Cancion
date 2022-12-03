 <!-- Importamos los layauts y el content -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu email') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Se le envio un enlace de verificacion a su email') }}
                    </div>
                    @endif
                    {{ __('Mira el link en tu email.') }}
                    {{ __('¿No ha llegado el Email?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Volver a enviar') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Termina todas las secciones inicializadas al principio -->
@endsection
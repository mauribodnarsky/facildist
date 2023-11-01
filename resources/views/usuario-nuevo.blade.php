@extends('layouts.app')
@section('content')
@if(Auth::user()->rol == 'nuevo')


<div class="row">

    <div class="col-10 offset-1">
        <div class="row">
            <div class="col-11 offset-1">
                <h1 class="text-right">Selecciona tu perfil</h1>
            </div>
        </div>
        <div class="row">

            <div class="col-12 col-md-5 mt-2  offset-md-1 offset-md-0 fondo-celeste borde-azul">
                <h3 class="texto-amarillo mt-2">Patrón</h3>
                <p>Podrás crear tu empresa y agregar tus vendedores a cargo.</p>
                <a class="btn btn-primary" href="{{ route('distribuidoras.soyPropietario') }}">{{ __('Soy Propietario') }}</a>
            </div>
            <div class="col-12 col-md-5 mt-2 offset-md-1 offset-md-0 fondo-celeste borde-azul">
                <h3 class="texto-amarillo mt-2">Vendedor</h3>
                <p>Podrás usar tu cuenta cuando den permiso a tu cuenta de email.</p>
                <a class="btn btn-primary" href="{{ route('distribuidoras.soyVendedor') }}">{{ __('Soy vendedor') }}</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@extends('layouts.app')
@section('content')
@if(Auth::user()->rol == 'nuevo')


<div class="row">

    <div class="col-10 offset-1">
        <div class="row" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
            <div class="col-11 offset-1">
                <h1 class="text-right">Selecciona tu perfil</h1>
            </div>
        </div>
        <div class="row">

            <div class="col-12 col-md-5 mt-2  offset-md-1 offset-md-0   borde-amarillo fondo-blanco-a-negro" data-aos="fade-right"
     data-aos-anchor-placement="top-bottom" >
                <h3 class="texto-amarillo mt-2">Patrón</h3>
                <p>Podrás crear tu empresa y agregar tus vendedores a cargo.</p>
                <a class="btn btn-outline-dark px-3 mb-3 " href="{{ route('distribuidoras.soyPropietario') }}">{{ __('Soy Propietario') }}</a>
            </div>
            <div class="col-12 col-md-5 mt-2 offset-md-1 offset-md-0  fondo-blanco-a-negro borde-amarillo"data-aos="fade-left"
     data-aos-anchor-placement="top-bottom">
                <h3 class="texto-amarillo mt-2">Vendedor</h3>
                <p>Podrás usar tu cuenta cuando den permiso a tu cuenta de email.</p>
                <a class="btn btn-outline-dark px-3 mb-3" href="{{ route('distribuidoras.soyVendedor') }}" >{{ __('Soy vendedor') }}</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
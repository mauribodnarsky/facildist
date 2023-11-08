@extends('layouts.app')
@section('content')

@if(isset($distribuidora) && $distribuidora!==null)
    <div class="row">
        <div class="col-10 offset-1 fondo-blanco-a-negro">
            <img src="{{$distribuidora->logo}}" alt="LOGO" class="w-25 text-center">
            <h1>Listo! {{$distribuidora->nombre}}</h1>
            <h3 class="my-3" >Ya puedes cargar los productos de {{$distribuidora->razon_social}}</h3>
            <a class="btn btn-outline-dark" href="{{ route('productos.index') }}">{{ __('Ir a Productos') }}</a>
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-body">
            <h5 class="text-danger">Error al actualizar tus datos</h5>

        </div>
    </div>
@endif

@endsection
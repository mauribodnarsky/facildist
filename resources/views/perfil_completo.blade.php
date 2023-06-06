@extends('layouts.app')
@section('content')

@if(isset($distribuidora) && $distribuidora!==null)
    <div class="card">
        <div class="card-body">
            <h5>Listo! {{$distribuidora->nombre}}</h5>
            <img src="{{$distribuidora->logo}}" alt="LOGO" class="w-25 text-center">
            <h6>Ya puedes cargar los productos de {{$distribuidora->razon_social}}</h6>
            <a class="btn btn-primary" href="{{ route('productos.index') }}">{{ __('Ir a Productos') }}</a>

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
@extends('layouts.app')
@section('content')
<div class="container">
@if(isset($perfil->distribuidora) && $perfil->distribuidora==null)

<div class="row">
            <div class="col-11 offset-1">
                <h1 class="text-right">Terminemos de configurar tu cuenta</h1>    
            </div>
        </div>
<form action="{{ route('distribuidoras.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="emails" class="form-label">Lista de correo de tus vendedores. (ingresa los email separados por un espacio)</label>
        <textarea name="email_list" class="form-control" id="email_list" rows="4" cols="50"></textarea>
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" required>
    </div>
    <div class="mb-3">
        <label for="razon_social" class="form-label">Marca</label>
        <input type="text" class="form-control" id="razon_social" name="razon_social" required>
    </div>
    <div class="mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input type="file" class="form-control" id="logo" name="logo">
    </div>
    
    <button type="submit" class="btn btn-outline-danger w-100">Guardar datos</button>
</form>
@endif
</div>
@endsection
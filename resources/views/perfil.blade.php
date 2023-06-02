@extends('layouts.app')
@section
<div class="container">
<form action="{{ route('distribuidoras.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="12">
    </div>
    
    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" required>
    </div>
    
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" id="estado" name="estado">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="user_id" class="form-label">ID de usuario</label>
        <input type="text" class="form-control" id="user_id" name="user_id" required>
    </div>
    
    <div class="mb-3">
        <label for="razon_social" class="form-label">Razón Social</label>
        <input type="text" class="form-control" id="razon_social" name="razon_social" required>
    </div>
    
    <div class="mb-3">
        <label for="plan" class="form-label">Plan</label>
        <input type="text" class="form-control" id="plan" name="plan">
    </div>
    
    <div class="mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input type="file" class="form-control" id="logo" name="logo">
    </div>
    
    <button type="submit" class="btn btn-primary">Crear distribuidora</button>
</form>

</div>
@endsection
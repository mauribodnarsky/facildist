@extends('layouts.app')
@section('content')
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
        <label for="user_id" class="form-label">ID de usuario</label>
        <input type="text" class="form-control" id="user_id" name="user_id" required>
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

</div>
@endsection
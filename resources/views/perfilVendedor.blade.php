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
    
    
        
    <button type="submit" class="btn btn-outline-danger w-100">Guardar datos</button>
</form>

</div>
@endsection
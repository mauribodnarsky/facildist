@extends('layouts.app')
@section('content')
<!-- Botón para abrir la modal -->
<button type="button" class="btn my-1 btn-primary" data-bs-toggle="modal" data-bs-target="#crearProductoModal">
    Crear Producto
</button>

<!-- Modal de creación de producto -->
<div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productos.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="presentacion" class="form-label">Presentación</label>
                        <input type="text" class="form-control" id="presentacion" name="presentacion" value="{{ old('presentacion') }}">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select class="form-select" id="categoria_id" name="categoria_id" required>
                            <option value="1">Bebida</option>
                        </select>
                    </div>
                 
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        
        @if(isset($listado) && $listado!==null)
            <div class="table-responsive">
            <div class="row">
            <div class="card border-primary mb-3 my-1 card-product" >
                         <div class="card-header">Encabezado</div>
                          <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Título de la tarjeta</h5>
                            <p class="card-text">Un texto de ejemplo rápido para colocal cerca del título de la tarjeta y componer la mayor parte del contenido de la tarjeta.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Un elemento</li>
                            <li class="list-group-item">Un segundo elemento<//li>
                            <li class="list-group-item">Un tercer elemento<//li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Enlace de tarjeta</a>
                            <a href="#" class="card-link">Otro enlace</a>
                        </div>
</div>
<div class="card border-primary mb-3 my-1 card-product" >
                         <div class="card-header">Encabezado</div>
                          <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Título de la tarjeta</h5>
                            <p class="card-text">Un texto de ejemplo rápido para colocal cerca del título de la tarjeta y componer la mayor parte del contenido de la tarjeta.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Un elemento</li>
                            <li class="list-group-item">Un segundo elemento<//li>
                            <li class="list-group-item">Un tercer elemento<//li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Enlace de tarjeta</a>
                            <a href="#" class="card-link">Otro enlace</a>
                        </div>
</div>
            </div>
            </div>
    @endif
@endsection


<style>
    @media (min-width: 768px) {
  .card-product {
    width: 20% !important;
    margin: 2% 1%  }
}

@media (max-width: 767px) {
  .card-product {
    width: 80% !important;
    margin: 2% 1%  }
}
</style>
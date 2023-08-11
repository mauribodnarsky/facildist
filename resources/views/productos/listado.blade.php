@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-3 offset-1">
        <!-- Botón para abrir la modal -->
<button type="button" class="btn my-1 btn-warning w-100" data-bs-toggle="modal" data-bs-target="#crearProductoModal">
    + Producto
</button>
    </div>
    <div class="col-3 offset-1">
        <!-- Botón para abrir la modal -->
<button type="button" class="btn my-1 btn-warning w-100" data-bs-toggle="modal" data-bs-target="#crearCategoriaModal">
    + Categoria
</button>
    </div>
</div>

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

                        @if(isset($categorias) && $categorias !== null)
  
                            @foreach($categorias as $categoryItem)
         
                               <option value="{{$categoryItem->id}}">{{ $categoryItem->nombre }}</option>
                    
                             @endforeach
                        @else
                            <option value="">Sin Categoria,cree una</option>
                        @endif                 
       </select>
                    </div>
                 
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FIN MODAL CREAR PRODUCTO -->









        
<!-- Modal de creación de categoria -->
<div class="modal fade" id="crearCategoriaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categorias.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if(isset($categorias) && $categorias !== null)
    <div class="row">
        <div class="col-md-12">
            <h3>Categorías de Productos</h3>
        </div>
    </div>

    <div class="row">
        @foreach($categorias as $categoria)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categoria->nombre }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="row">
        <div class="col-md-12">
            <h3>No hay categorías disponibles.</h3>
        </div>
    </div>
@endif

        @if(isset($listado) && $listado!==null)
            <div class="table-responsive">
            <div class="row">
                <div class="col-12">
            @foreach($listado as $producto)
            <div class="card border-warning mb-3 my-1 card-product" >
                         <div class="card-header"><h5 class="card-title">
                            @if($producto->estado==1)
                            Publicado
                            @else
                            Sin publicar
                            @endif
                        </h5></div>
                          <img src="https://facildist.com.ar/{{$producto->imagen}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{$producto->descripcion}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Presentación:{{$producto->presentacion}}</li>
                            <li class="list-group-item">Stock:{{$producto->stock}}<//li>
                            <li class="list-group-item">{{$producto->categoria->nombre}} | {{$producto->nombre}} <//li>
                        </ul>
                        <div class="card-body">
                            <a data-bs-toggle="modal" onclick="editProduct({{json_encode($producto)}})" data-bs-target="#editarProductoModal" class="card-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg></a>
                            <a href="#" class="card-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
  <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg> Ocultar</a>
<a href="#" class="card-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg></a>
                            <a href="#" class="card-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
  <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>Publicar</a>
                        </div>
</div>
@endforeach
            </div>
            </div>
            </div>
    @endif
@endsection

</div>

<!-- Modal de edicion de producto -->
<div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productos.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" id="edit_product_id" name="producto_id">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit_product_nombre" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="edit_product_descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="presentacion" class="form-label">Presentación</label>
                        <input type="text" class="form-control" id="edit_product_presentacion" name="presentacion" value="{{ old('presentacion') }}">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="edit_product_estado" name="estado" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="edit_product_stock" name="stock" value="{{ old('stock') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select class="form-select" id="edit_product_categoria_id" name="categoria_id" required>

                        @if(isset($categorias) && $categorias !== null)
  
                            @foreach($categorias as $categoryItem)
         
                               <option value="{{$categoryItem->id}}">{{ $categoryItem->nombre }}</option>
                    
                             @endforeach
                        @else
                            <option value="">Sin Categoria,cree una</option>
                        @endif                 
       </select>
                    </div>
                 
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file"  class="form-control" id="edit_product_imagen" name="imagen">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

    function editProduct(producto){
        // Llenar los campos de entrada en la modal con la información del producto
        document.getElementById('edit_product_id').value = producto.id;
        document.getElementById('edit_product_nombre').value = producto.nombre;
        document.getElementById('edit_product_descripcion').value = producto.descripcion;
        document.getElementById('edit_product_presentacion').value = producto.presentacion;
        document.getElementById('edit_product_estado').value = producto.estado;
        document.getElementById('edit_product_stock').value = producto.stock;
        document.getElementById('edit_product_categoria_id').value = producto.categoria_id;

    }

</script>












<style>
    @media (min-width: 768px) {
  .card-product {
    width: 20% !important;
    margin: 2% 1%  }
}

@media (max-width: 767px) {
  .card-product {
    width: 80% !important;
    margin: 2% auto  }
}
</style>
@extends('layouts.app')
@section('content')
    @if(isset($productos) && $productos!=null)
    <div class="table-responsive">
    <ol class="list-group list-group-numbered">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subencabezado</div>
      Contenido para el elemento de la lista
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subencabezado</div>
      Contenido para el elemento de la lista
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subencabezado</div>
      Contenido para el elemento de la lista
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
</ol>
    </div>
    @else
    <div class="card">
      <div class="card-body text-center">
        <a href=" " class="btn btn-outline-warning">Crear nuevo producto</a>
      </div>
    </div>
@endsection

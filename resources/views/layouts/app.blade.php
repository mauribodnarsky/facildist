<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Facildist') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Facildist') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                        @else
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
Menu</a>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@guest @else 
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div>
    </div>
    <div class="dropdown mt-3">
      
     <ul class="nav">
     <li class="nav-item">
            <a class="nav-link" href="{{ route('productos.index') }}">{{ __('Productos') }}</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{ route('clientes.index') }}">{{ __('Clientes') }}</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{ route('revistas.index') }}">{{ __('Revistas') }}</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{ route('ofertas.index') }}">{{ __('Ofertas') }}</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{ route('pedidos.index') }}">{{ __('Pedidos') }}</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{ route('distribuidora.perfil') }}">{{ __('Perfil') }}</a>
    </li>
    <li class="nav-item">
            <form  method="POST" action="{{ route('logout') }}"><button type="submit" class="nav-link">{{ __('Salir') }} </button> </form>
    </li>
     </ul>
    </div>
  </div>
</div>
@endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

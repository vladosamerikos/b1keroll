<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BikeRoll') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>
    
    <div id="app">
    <nav class="navbar navbar-expand-lg tarjeta-color">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img style="border-radius: 15px;" class="hover-logo" width="100" height="100" src=" {{ asset('img/logo-color.svg') }}"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ms-auto" >
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('race.showAll') }}">Todas las carreras</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('race.showUpcoming') }}">Próximas carreras</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('race.showDone') }}">Carreras Finalizadas</a>
                                    </li>

                                </ul>
                            </div>    
                        @else
                            @if (Auth::user()->role == '1')
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Carreras
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('race.create') }}">Crear</a></li>
                                    <li><a class="dropdown-item" href="{{ route('race.list') }}">Administrar</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Patrocinadores
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('sponsor.create') }}">Crear</a></li>
                                    <li><a class="dropdown-item" href="{{ route('sponsor.list') }}">Administrar</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('insurance.list') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Seguros
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('insurance.create') }}">Crear</a></li>
                                    <li><a class="dropdown-item" href="{{ route('insurance.list') }}">Administrar</a></li>
                                    </ul>
                                </li>
                                </ul>
                            </div>

                            @endif
                            @if (Auth::user()->role == '0')
                                
                            @endif
                        @endguest
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div>
        <footer class="bg-light text-center text-lg-start mt-5">
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                
                © 2023 Copyright: BikeRoll
            </div>
        </footer>
    </div>
</body>
</html>

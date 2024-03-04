<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">

    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-md-none">
    <a class="navbar-brand mx-3" href="/dashboard">
        <img src="{{ asset('/images/Killerlogo.png') }}" width="30" height="30" alt="Cervezas Killer">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
        aria-controls="sidebar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div class="container-fluid">

    <div class="offcanvas offcanvas-start bg-dark " tabindex="-1" id="sidebar"
        aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <div class="p-4 text-center">
                <a href="{{ route('home') }}" class="d-block mb-3 text-decoration-none">
                    <img src="{{ asset('/images/logo.png') }}" width="50" height="50" class="img-fluid"
                        alt="">
                    <span class="fs-4  d-md-inline text-white">Netflix Egibide</span>
                </a>
                <hr class="w-100">
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <aside class="col-auto d-flex flex-column bg-gradient  dark-bg ">

                @auth
                    <ul class="nav nav-pills flex-column flex-grow-1">
                        @auth
                            <li class="  nav-item m-2 p-2">
                                <a href="{{ route('home') }}" class=" text-light nav-link{{ request()->is('dashboard') ? ' active' : '' }}">
                                    <i class=" imagenColor fa-solid fa-tachometer-alt  me-3 fs-5 p-1"></i>
                                    <span class="text-white d-md-inline p-1 ">Panel</span>
                                </a>
                            </li>
                        @endauth

                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('peliculas.index') }}"
                                class="nav-link{{ request()->is('peliculas') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-list-check  me-3 fs-5 p-1"></i>
                                <span class="text-white d-md-inline p-1 ">Peliculas</span>
                            </a>
                        </li>


                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('series.index') }}"
                                class="nav-link{{ request()->is('series') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-clipboard me-3 fs-5 p-1"></i>
                                <span class="text-white d-md-inline p-2">Series</span>
                            </a>
                        </li>



                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('categorias.index') }}"
                                class="nav-link{{ request()->is('categorias') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-people-group  me-3 fs-5 p-1"></i>
                                <span class="text-white d-md-inline">Categorias</span>
                            </a>
                        </li>

                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('actores.index') }}"
                                class="nav-link{{ request()->is('actores') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-key  me-3 fs-5 p-1"></i>
                                <span class="text-white d-md-inline">Actores</span>
                            </a>
                        </li>


                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('usuarios.index') }}"
                                class="nav-link{{ request()->is('usuarios') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-key  me-3 fs-5 p-1"></i>
                                <span class="text-white d-md-inline">Usuarios</span>
                            </a>
                        </li>
                    </ul>
                    <div class="mt-auto p-4">
                        <div class="d-flex align-items-center ">
                            <div class="dropdown">
                                <a href="#"
                                    class="d-flex align-items-center text-light text-decoration-none dropdown-toggle"
                                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('/images/Killerlogo.png') }}" alt="" width="32"
                                        height="32" class="rounded-circle me-2">
                                    <strong>{{ auth()->user()->name }}</strong>
                                </a>
                                <ul class="dropdown-menu text-small shadow fondoColor" aria-labelledby="dropdownUser">
                                    <li><a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger w-80 m-2">
                                                <i class="fa-solid fa-right-from-bracket me-2"></i>Cerrar sesión
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                @endauth
            </aside>
        </div>
    </div>


    <div class="container-fluid ">
        <div class="row flex-nowrap min-vh-100 text-white">
            <div
                class=" bg-dark col-auto d-flex flex-column bg-gradient min-vh-100 dark-bg d-none d-md-block col-md-3 col-xl-2">
                <div class="p-4 text-center">
                    <a href="{{ route('home') }}" class="d-block mb-3 text-decoration-none">
                        <img src="{{ asset('/images/logo.png') }}" width="50" height="50"
                            class="img-fluid mx-3" alt="logo">
                        <span class="fs-4 d-none d-md-inline text-white ">Netflix Egibide</span>
                    </a>
                    <hr class="w-100">
                </div>

                @auth
                    <ul class="nav nav-pills flex-column flex-grow-1">
                        @auth
                            <li class="nav-item m-2 p-2">
                                <a href="{{ route('home') }}"
                                    class="nav-link{{ request()->is('dashboard') ? ' active' : '' }}">
                                    <i class="imagenColor fa-solid fa-tachometer-alt  me-3 fs-5 p-1"></i>
                                    <span class="d-none d-md-inline p-1 text-white ">Panel</span>
                                </a>
                            </li>
                        @endauth

                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('peliculas.index') }}"
                                class="nav-link{{ request()->is('peliculas') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-box-open  me-3 fs-5 p-1"></i>
                                <span class="d-none d-md-inline p-1 text-white ">Peliculas</span>
                            </a>
                        </li>


                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('series.index') }}"
                                class="nav-link{{ request()->is('series') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-receipt me-3 fs-5 p-1"></i>
                                <span class="d-none d-md-inline p-2 text-white">series</span>
                            </a>
                        </li>


                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('categorias.index') }}"
                                class="nav-link{{ request()->is('categorias') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-people-group  me-3 fs-5 p-1"></i>
                                <span class="d-none d-md-inline text-white">Categorias</span>
                            </a>
                        </li>

                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('actores.index') }}"
                                class="nav-link{{ request()->is('actores') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-users  me-3 fs-5 p-1"></i>
                                <span class="d-none d-md-inline text-white " style="color: white">Actores</span>
                            </a>
                        </li>
                        <li class="nav-item m-2 p-2">
                            <a href="{{ route('usuarios.index') }}"
                                class="nav-link{{ request()->is('usuarios') ? ' active' : '' }}">
                                <i class="imagenColor fa-solid fa-user-shield  me-3 fs-5 p-1"></i>
                                <span class="d-none d-md-inline  p-1 text-white">Usuarios</span>
                            </a>
                        </li>


                    </ul>
                    <div class="mt-auto p-4">
                        <div class="d-flex align-items-center">
                            <div class="dropdown">
                                <a href="#"
                                    class="d-flex align-items-center text-light text-decoration-none dropdown-toggle"
                                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">

                                    <img src="{{ asset(auth()->user()->imagen) }}" alt="" width="32"
                                        height="32" class="rounded-circle me-2">
                                    <strong>{{ strlen(auth()->user()->name) > 10 ? substr(auth()->user()->name, 0, 10) . '...' : auth()->user()->name }}</strong>

                                </a>
                                <ul class="dropdown-menu text-small shadow " aria-labelledby="dropdownUser">
                                    <li><a class="dropdown-item rounded fondoColor" href="{{ route('perfil') }}">Perfil</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger w-80 m-2">
                                                <i class="fa-solid fa-right-from-bracket me-2"></i>Cerrar sesión
                                            </button>
                                        </form>


                            </div>
                            <label class="switch ms-3" for="dark-mode-toggle">
                                <input type="checkbox" id="dark-mode-toggle">
                                <span class="slider">
                                    <i class="fas fa-moon"></i>
                                    <i class="fas fa-sun"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                @endauth
            </div>
            <div class="col px-md-4 min-vh-100 colorfondo">
                @include('layouts._partials.messages')

                @yield('content')
            </div>
        </div>

    </div>

    <div class="row bg-dark text-center text-white py-4" style="max-height: 100vh">
        <div class="col">
            @yield('footer')
        </div>
    </div>
    <script src="https://kit.fontawesome.com/2f23627a24.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js'])
</div>

</html>

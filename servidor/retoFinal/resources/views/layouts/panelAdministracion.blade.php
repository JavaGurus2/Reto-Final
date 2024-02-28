<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">

    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss'])
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

    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebar"
        aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <div class="p-4 text-center">
                <a href="#" class="d-block mb-3 text-decoration-none">
                    <img src="{{ asset('/images/Killerlogo.png') }}" width="50" height="50" class="img-fluid"
                        alt="">
                    <span class="fs-4  d-md-inline ">Cervezas Killer</span>
                </a>
                <hr class="w-100">
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <aside class="col-auto d-flex flex-column bg-gradient  dark-bg ">


                @auth
                    <ul class="nav nav-pills flex-column flex-grow-1">

                    </ul>
                    <div class="mt-auto p-4">
                        <div class="d-flex align-items-center">
                            <div class="dropdown">
                                <a href="#"
                                    class="d-flex align-items-center text-light text-decoration-none dropdown-toggle"
                                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('/images/Killerlogo.png') }}" alt="" width="32"
                                        height="32" class="rounded-circle me-2">
                                    <strong>{{ auth()->user()->name }}</strong>
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
                                    <li><a class="dropdown-item" href="##">Perfil</a></li>
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
        <div class="row flex-nowrap min-vh-100">
            <div class="col-auto d-flex flex-column bg-gradient min-vh-100 dark-bg d-none d-md-block col-md-3 col-xl-2">
                <div class="p-4 text-center">
                    <a href="#" class="d-block mb-3 text-decoration-none">
                        <img src="{{ asset('/images/Killerlogo.png') }}" width="50" height="50"
                            class="img-fluid mx-3" alt="">
                        <span class="fs-4 d-none d-md-inline ">Cervezas Killer</span>
                    </a>
                    <hr class="w-100">
                </div>

                @auth
                    <ul class="nav nav-pills flex-column flex-grow-1">

                    </ul>
                    <div class="mt-auto p-4">
                        <div class="d-flex align-items-center">
                            <div class="dropdown">
                                <a href="#"
                                    class="d-flex align-items-center text-light text-decoration-none dropdown-toggle"
                                    id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('storage/images/' . auth()->user()->imagen) }}" alt=""
                                        width="32" height="32" class="rounded-circle me-2">
                                    <strong>{{ strlen(auth()->user()->name) > 10 ? substr(auth()->user()->name, 0, 10) . '...' : auth()->user()->name }}</strong>

                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
                                    <li><a class="dropdown-item" href="">Perfil</a></li>
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
            <div class="col px-md-4 min-vh-100 py-4">
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

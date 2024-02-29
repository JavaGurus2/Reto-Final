@extends('layouts.panelAdministracion')

@section('title', 'Panel de gestion')

@section('content')
    <div class="dashboard row">
        <div class="col-12">
            @auth
            <div class="row welcome-message p-2 p-md-4 mb-4 bg-light border rounded m-2 m-md-4">
                <h2 class="h4 md:h3 lg:display-4"><strong>¡Bienvenido al panel de gestión!</strong></h2>
                <p class="lead">Hola, <strong>{{ auth()->user()->name }}</strong>. Es un placer tenerte con nosotros.</p>
                <hr class="my-2">
                <p>En Netflix Egibide, estamos comprometidos con la excelencia y tu crecimiento profesional. Explora, colabora y crece
                    con nosotros.</p>
                <p>Si necesitas asistencia o tienes alguna pregunta, no dudes en contactar al equipo de soporte.</p>
            </div>



            <div class="row d-flex justify-content-center">

                    <div class="col-sm-10 col-md-4 col-lg-3 mb-3">
                        <div class="card shadow-sm text-center bg-primary bg-gradient text-white">
                            <div class="card-body p-3">
                                <h5 class="card-title mb-2">Peliculas</h5>
                                <a href="#" class="d-block mb-3">
                                    <i class="fa-solid fa-list-check fa-2x"></i>
                                </a>
                                <a href="{{ route('peliculas.index') }}" class="btn btn-sm btn-outline-light">ENTRAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-4 col-lg-3 mb-3">
                        <div class="card shadow-sm text-center bg-info bg-gradient text-white">
                            <div class="card-body p-3">
                                <h5 class="card-title mb-2">Series</h5>
                                <a href="#" class="d-block mb-3">
                                    <i class="fa-solid fa-list-check fa-2x"></i>
                                </a>
                                <a href="{{ route('series.index') }}" class="btn btn-sm btn-outline-light">ENTRAR</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-10 col-md-4 col-lg-3 mb-3">
                        <div class="card shadow-sm text-center bg-success bg-gradient text-white">
                            <div class="card-body p-3">
                                <h5 class="card-title mb-2">Categorias</h5>
                                <a href="#" class="d-block mb-3">
                                    <i class="fa-solid fa-clipboard fa-2x"></i>
                                </a>
                                <a href="{{ route('categorias.index') }}" class="btn btn-sm btn-outline-light">ENTRAR</a>
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-10 col-md-4 col-lg-3 mb-3">
                        <div class="card shadow-sm text-center bg-success bg-gradient text-white">
                            <div class="card-body p-3">
                                <h5 class="card-title mb-2">Actores</h5>
                                <a href="#" class="d-block mb-3">
                                    <i class="fa-solid fa-chart-line fa-2x"></i>
                                </a>
                                <a href="{{ route('actores.index') }}" class="btn btn-sm btn-outline-light">ENTRAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-4 col-lg-3 mb-3">
                        <div class="card shadow-sm text-center bg-warning bg-gradient text-white">
                            <div class="card-body p-3">
                                <h5 class="card-title mb-2">Usuarios</h5>
                                <a href="#" class="d-block mb-3">
                                    <i class="fa-solid fa-chart-line fa-2x"></i>
                                </a>
                                <a href="{{ route('usuarios.index') }}" class="btn btn-sm btn-outline-light">ENTRAR</a>
                            </div>
                        </div>
                    </div>

            </div>
        @endauth
        </div>

    </div>
@endsection

@section('footer', '© Netflix Egibide')

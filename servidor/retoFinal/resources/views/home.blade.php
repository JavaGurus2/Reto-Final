@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh;">
            <div class="col-sm-10 col-md-4 col-lg-3">
                <div class="bg-purple  card shadow-sm text-center text-black border-purple">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Peliculas</h5>
                        <a href="#" class="d-block mb-3">
                            <i class="fa-solid fa-list-check fa-2x text-black"></i>
                        </a>
                        <a href="{{ route('peliculas.index') }}" class="ahover btn btn-sm btn-outline-dark">ENTRAR</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-5 col-lg-3">
                <div class=" bg-purplea card shadow-sm text-center text-black border-purple">
                    <div class="card-body ">
                        <h5 class="card-title mb-2">Series</h5>
                        <a href="#" class="d-block mb-3">
                            <i class="fa-solid fa-list-check fa-2x text-black"></i>
                        </a>
                        <a href="{{ route('series.index') }}" class="ahover btn btn-sm btn-outline-dark">ENTRAR</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 col-lg-3">
                <div class="bg-purple card shadow-sm text-center text-black border-purple">
                    <div class="card-body">
                        <h5 class="card-title ">Categorias</h5>
                        <a href="#" class="d-block mb-3">
                            <i class="fa-solid fa-list-check fa-2x text-black"></i>
                        </a>
                        <a href="{{ route('categorias.index') }}" class="ahover btn btn-sm btn-outline-dark">ENTRAR</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 col-lg-3">
                <div class="bg-purplea card shadow-sm text-center text-black border-purple">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Actores</h5>
                        <a href="#" class="d-block mb-3">
                            <i class="fa-solid fa-list-check fa-2x text-black"></i>
                        </a>
                        <a href="{{ route('actores.index') }}" class="ahover btn btn-sm btn-outline-dark">ENTRAR</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-4 col-lg-3 mt-0">
                <div class="bg-purple card shadow-sm text-center text-black border-purple">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Usuarios</h5>
                        <a href="#" class="d-block mb-3">
                            <i class="fa-solid fa-list-check fa-2x text-black"></i>
                        </a>
                        <a href="{{ route('usuarios.index') }}" class="ahover btn btn-sm btn-outline-dark">ENTRAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

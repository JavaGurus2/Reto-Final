@extends('layouts.panelAdministracion')

@section('title', 'Ver Usuario')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-5  border border-dark shadow-lg p-4 rounded cartaShow">
            <div>
                <h4 class="mb-3 p-1 m-1">
                    <a href="{{ route('usuarios.index') }}" class="text-indigo-300"> <i
                            class="fa-solid fa-arrow-left  me-3 text-indigo-300 fondoRosa rounded text-white p-1"></i></a>
                    {{ __('Usuarios') }}

                </h4>
            </div>

            <div class="card border">
                <div class="card-header">
                    <h3>Información del usuario</h3>
                </div>
                <div class="card-body  ">
                    <dl class="row ">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $user->name }}</dd>
                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8"> <img src="{{ asset($user->imagen) }}" alt="Imagen del usuario"
                                style="max-width: 300px;"></dd>
                    </dl>
                </div>
                <div class="px-3 my-4">
                    <a href="{{ route('usuarios.edit', $user) }}" class="btn fondoRosa text-white">Editar</a>
                </div>
            </div>
        </div>

        

        <div class="col-6 ms-4">
            <div class="card border border-dark shadow-lg rounded cartaShow card-descargas">
                <div class="card-header bg-primary text-white">
                    <h3 class="m-0">Descargas del usuario</h3>
                </div>
                <div class="card-body cartaShow card-body-descargas">
                    <div class="table-responsive">
                        <h4>Películas descargadas:</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Sinopsis</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($descargasPeliculas as $descarga)
                                <tr>
                                    <td>{{ $descarga->titulo }}</td>
                                    <td>{{ $descarga->fecha_estreno }}</td>
                                    <td>
                                        <a href="{{ route('peliculas.show', $descarga) }}"
                                            class="btn btn-primary btn-md">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        

                                    </td>
                                </tr>
                                @endforeach
                                @if ($descargasPeliculas->isEmpty())
                                    <tr>
                                        <td colspan="3">No hay películas descargadas</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                            <ul class="pagination">
                                @if ($descargasPeliculas->previousPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $descargasPeliculas->appends(request()->except('peliculasPage'))->previousPageUrl() }}">
                                            <span aria-hidden="true" class="text-dark">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @if ($descargasPeliculas->currentPage() > 3)
                                    <li class="page-item"><span class="page-link">1</span></li>
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                @for ($i = max(1, $descargasPeliculas->currentPage() - 2); $i <= min($descargasPeliculas->lastPage(), $descargasPeliculas->currentPage() + 2); $i++)
                                    <li class="page-item @if ($i == $descargasPeliculas->currentPage()) active @endif">
                                        <a class="page-link"
                                            href="{{ $descargasPeliculas->appends(request()->except('peliculasPage'))->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($descargasPeliculas->currentPage() < $descargasPeliculas->lastPage() - 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                    <li class="page-item"><span class="page-link">{{ $descargasPeliculas->lastPage() }}</span></li>
                                @endif

                                @if ($descargasPeliculas->nextPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $descargasPeliculas->appends(request()->except('peliculasPage'))->nextPageUrl() }}"
                                            aria-label="Next">
                                            <span aria-hidden="true" class="text-dark">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                        
                    </div>
        
                    <div class="table-responsive">
                        <h4>Series descargadas:</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha estreno</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($descargasSeries as $descarga)
                                <tr>
                                    <td>{{ $descarga->nombre }}</td>
                                    <td>{{ $descarga->fecha_estreno }}</td>
                                    <td>
                                        <a href="{{ route('series.show', $descarga) }}" class="btn btn-primary btn-md">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        

                                    </td>
                                </tr>
                                @endforeach
                                @if ($descargasSeries->isEmpty())
                                    <tr>
                                        <td colspan="3">No hay series descargadas</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                            <ul class="pagination">
                                @if ($descargasSeries->previousPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $descargasSeries->previousPageUrl() }}">
                                            <span aria-hidden="true" class="text-dark">&laquo;</span>
                                        </a>
                                    </li>
                                @endif
                        
                                @if ($descargasSeries->currentPage() > 3)
                                    <li class="page-item"><span class="page-link">1</span></li>
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif
                        
                                @for ($i = max(1, $descargasSeries->currentPage() - 2); $i <= min($descargasSeries->lastPage(), $descargasSeries->currentPage() + 2); $i++)
                                    <li class="page-item @if ($i == $descargasSeries->currentPage()) active @endif">
                                        <a class="page-link"
                                            href="{{ $descargasSeries->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                        
                                @if ($descargasSeries->currentPage() < $descargasSeries->lastPage() - 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                    <li class="page-item"><span class="page-link">{{ $descargasSeries->lastPage() }}</span></li>
                                @endif
                        
                                @if ($descargasSeries->nextPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $descargasSeries->nextPageUrl() }}"
                                            aria-label="Next">
                                            <span aria-hidden="true" class="text-dark">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        

    </div>
@endsection

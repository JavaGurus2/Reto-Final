@extends('layouts.panelAdministracion')

@section('title', 'Ver Serie')

@section('content')
    <div class="row d-flex justify-content-center align-items-center my-5 border border-dark shadow-lg p-4 rounded bg-secondary">
        <div class="col-6 justify-content-center align-items-center">
            <div>
                <h4>
                    <a href="{{ route('series.index') }}" class="text-indigo-300"> <i
                        class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1 mb-4"></i></a>
                    {{ __('Series') }}

                </h4>

            </div>

            <div class="card">
                <div class="card-header fondoRosaClaro">
                    <h5 class="card-title ">Información de la serie</h5>
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $serie->nombre }}</dd>
                        <hr>
                        <dt class="col-sm-4">Sinopsis:</dt>
                        <dd class="col-sm-8">{{ $serie->sinopsis }}</dd>
                        <hr>
                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8">
                            @if (isset($serie->imagen))
                                <img src="{{ asset($serie->imagen) }}" alt="Imagen de la serie"
                                    class="img-fluid rounded sombraImagen" style="max-width: 300px;">
                            @endif
                        </dd>
                        <hr>

                        <dt class="col-sm-4">Fecha de estreno:</dt>
                        <dd class="col-sm-8">{{ $serie->fecha_estreno }}</dd>
                        <hr>

                        <dt class="col-sm-4">Clasificacion:</dt>
                        <dd class="col-sm-8">{{ $serie->clasificacion }}</dd>
                        <hr>
                    </dl>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('series.edit', $serie) }}" class="btn bg-purple text-white">Editar</a>
                </div>
            </div>

        </div>

        <!-- TEMPORADAS-->
        <div class="col-6 my-5">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between fondoRosaClaro">
                    <span class="text-dark "><h4>{{ __('Temporadas') }}</h4></span>
                    <a href="{{ route('temporadas.create', $serie) }}" class="btn fondoRosa text-white">Crear temporada</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>Numero temporada</th>
                                    <th>Fecha estreno</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($temporadas as $temporada)
                                    <tr>

                                        <td>{{ $temporada->numero }}</td>
                                        <td>{{ $temporada->fecha_estreno }}</td>
                                        <td>
                                            <a href="{{ route('temporadas.show', [$serie, $temporada]) }}"
                                                class="btn btn-primary btn-md">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal_{{ $temporada->id }}"
                                                data-product-id="{{ $temporada->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <!-- VENTANA MODAL -->
                                            <div class="modal fade" id="confirmDeleteModal_{{ $temporada->id }}"
                                                tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel">
                                                                Confirmar Borrado {{ $temporada->id }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Cerrar"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Estás seguro de que deseas borrar esta temporada?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <form method="post"
                                                                action="{{ route('temporadas.destroy', [$serie, $temporada]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit" class="btn btn-danger"
                                                                    value="Eliminar">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No hay temporadas</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                        <ul class="pagination">
                            @if ($temporadas->previousPageUrl())
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ $temporadas->appends(request()->except('page'))->previousPageUrl() }}">
                                        <span aria-hidden="true" class="text-dark">&laquo;</span>
                                    </a>
                                </li>
                            @endif

                            @if ($temporadas->currentPage() > 3)
                                <li class="page-item"><span class="page-link">1</span></li>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif

                            @for ($i = max(1, $temporadas->currentPage() - 2); $i <= min($temporadas->lastPage(), $temporadas->currentPage() + 2); $i++)
                                <li class="page-item @if ($i == $temporadas->currentPage()) active @endif">
                                    <a class="page-link"
                                        href="{{ $temporadas->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($temporadas->currentPage() < $temporadas->lastPage() - 2)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                <li class="page-item"><span class="page-link">{{ $temporadas->lastPage() }}</span></li>
                            @endif

                            @if ($temporadas->nextPageUrl())
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ $temporadas->appends(request()->except('page'))->nextPageUrl() }}"
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
@endsection

@extends('layouts.panelAdministracion')

@section('title', 'Ver episodios')

@section('content')
    <div
        class="row d-flex justify-content-center align-items-center my-5 border border-dark shadow-lg p-4 rounded bg-secondary">
        <div class="col-lg-6">
            <div>
                <h1 class="mb-4">Detalle de la temporada</h1>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Información de la temporada</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Nombre de la serie:</dt>
                        <dd class="col-sm-8">{{ $serie->nombre }}</dd>

                        <dt class="col-sm-4">Número:</dt>
                        <dd class="col-sm-8">{{ $temporada->numero }}</dd>

                        <dt class="col-sm-4">Fecha de estreno:</dt>
                        <dd class="col-sm-8">{{ $temporada->fecha_estreno }}</dd>
                    </dl>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('series.show', $serie) }}" class="btn btn-warning me-2">Volver</a>
                    <a href="{{ route('temporadas.edit', [$serie, $temporada]) }}" class="btn bg-purple">Editar</a>
                </div>
            </div>
        </div>

        <!-- Episodios -->
        <div class="col-lg-6 my-5">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="text-dark">{{ __('Episodios') }}</h5>
                    <a href="{{ route('episodios.create', [$serie, $temporada]) }}" class="btn btn-success">Crear
                        episodio</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Número episodio</th>
                                    <th>Fecha estreno</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($episodios as $episodio)
                                    <tr>
                                        <td>{{ $episodio->id }}</td>
                                        <td>{{ $episodio->numero }}</td>
                                        <td>{{ $episodio->fecha_estreno }}</td>
                                        <td>
                                            <a href="{{ route('episodios.show', [$serie, $temporada, $episodio]) }}"
                                                class="btn btn-primary btn-md">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal_{{ $episodio->id }}"
                                                data-product-id="{{ $episodio->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <!-- VENTANA MODAL -->
                                            <div class="modal fade" id="confirmDeleteModal_{{ $episodio->id }}"
                                                tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar
                                                                Borrado {{ $episodio->id }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Cerrar"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Estás seguro de que deseas borrar este episodio?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <form method="post"
                                                                action="{{ route('episodios.destroy', [$serie, $temporada, $episodio]) }}">
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
                                        <td colspan="4" class="text-center">No hay episodios</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                        <ul class="pagination">
                            @if ($episodios->previousPageUrl())
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ $episodios->appends(request()->except('page'))->previousPageUrl() }}">
                                        <span aria-hidden="true" class="text-dark">&laquo;</span>
                                    </a>
                                </li>
                            @endif

                            @if ($episodios->currentPage() > 3)
                                <li class="page-item"><span class="page-link">1</span></li>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif

                            @for ($i = max(1, $episodios->currentPage() - 2); $i <= min($episodios->lastPage(), $episodios->currentPage() + 2); $i++)
                                <li class="page-item @if ($i == $episodios->currentPage()) active @endif">
                                    <a class="page-link"
                                        href="{{ $episodios->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($episodios->currentPage() < $episodios->lastPage() - 2)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                <li class="page-item"><span class="page-link">{{ $episodios->lastPage() }}</span></li>
                            @endif

                            @if ($episodios->nextPageUrl())
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ $episodios->appends(request()->except('page'))->nextPageUrl() }}"
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

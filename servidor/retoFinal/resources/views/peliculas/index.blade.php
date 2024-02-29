@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5" style="height: 100vh;">
            <div class="col-md-8 ">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between ">
                        <span class="text-dark">{{ __('Peliculas') }}</span>
                        <a href="{{ route('peliculas.create') }}" class="btn btn-success">Crear pelicula</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titulo</th>
                                        <th>Fecha estreno</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($peliculas as $pelicula)
                                        <tr>
                                            <td>{{ $pelicula->id }}</td>
                                            <td>{{ $pelicula->titulo }}</td>
                                            <td>{{ $pelicula->fecha_estreno }}</td>
                                            <td>
                                                <a href="{{ route('peliculas.show', $pelicula) }}"
                                                    class="btn btn-primary btn-md">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal_{{ $pelicula->id }}"
                                                    data-product-id="{{ $pelicula->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                                <!-- VENTANA MODAL -->
                                                <div class="modal fade" id="confirmDeleteModal_{{ $pelicula->id }}"
                                                    tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteModalLabel">
                                                                    Confirmar Borrado {{ $pelicula->id }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Estás seguro de que deseas borrar esta pelicula?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <form method="post"
                                                                    action="{{ route('peliculas.destroy', $pelicula) }}">
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
                                            <td colspan="4" class="text-center">No hay peliculas</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                            <ul class="pagination">
                                @if ($peliculas->previousPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $peliculas->appends(request()->except('page'))->previousPageUrl() }}">
                                            <span aria-hidden="true" class="text-dark">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @if ($peliculas->currentPage() > 3)
                                    <li class="page-item"><span class="page-link">1</span></li>
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                @for ($i = max(1, $peliculas->currentPage() - 2); $i <= min($peliculas->lastPage(), $peliculas->currentPage() + 2); $i++)
                                    <li class="page-item @if ($i == $peliculas->currentPage()) active @endif">
                                        <a class="page-link"
                                            href="{{ $peliculas->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($peliculas->currentPage() < $peliculas->lastPage() - 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                    <li class="page-item"><span class="page-link">{{ $peliculas->lastPage() }}</span></li>
                                @endif

                                @if ($peliculas->nextPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $peliculas->appends(request()->except('page'))->nextPageUrl() }}"
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

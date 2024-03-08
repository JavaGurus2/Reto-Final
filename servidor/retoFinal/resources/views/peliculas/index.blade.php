@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5" style="height: 100vh;">
            <div class="col-md-8 ">
                <div class="card card-custom">
                    <div class="card-header d-flex justify-content-between fondoRosaClaro">
                        <span class="text-dark">
                            <h3>{{ __('Peliculas') }}</h3>
                        </span>
                        <a href="{{ route('peliculas.create') }}" class="btn fondoRosa text-white">Crear pelicula</a>
                    </div>

                    <div class="card-body ">
                        <!--  componente de búsqueda -->
                        @include('_components.search', [
                            'route' => route('peliculas.index'),
                            'placeholder' => 'Buscar por título',
                        ])

                        <div class="table-responsive prueba">
                            <table id="indexTable" class="table table-bordered table-dark">
                                <thead class="bg-dark">
                                    <tr>

                                        <th>Titulo</th>
                                        <th>Fecha estreno</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($peliculas as $pelicula)
                                        <tr>
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
                                                    <div class="modal-dialog modal-dialog-custom">
                                                        <!-- Aplica la clase personalizada para el tamaño del modal -->
                                                        <div class="modal-content modal-content-custom">
                                                            <!-- Aplica la clase personalizada para el contenido del modal -->
                                                            <div class="modal-header modal-header-custom">
                                                                <!-- Aplica la clase personalizada para el encabezado del modal -->
                                                                <h5 class="modal-title" id="confirmDeleteModalLabel">
                                                                    Confirmar Borrado {{ $pelicula->id }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                            </div>
                                                            <div class="modal-body modal-body-custom">
                                                                <!-- Aplica la clase personalizada para el cuerpo del modal -->
                                                                <p>¿Estás seguro de que deseas borrar esta película?</p>
                                                            </div>
                                                            <div class="modal-footer modal-footer-custom">
                                                                <!-- Aplica la clase personalizada para el pie del modal -->
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <form action="{{ route('peliculas.destroy', $pelicula) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Eliminar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No hay peliculas</td>
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

@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5" style="height: 100vh;">
            <div class="col-md-8 ">
                <div class="card card-custom">
                    <div class="card-header d-flex justify-content-between fondoRosaClaro">
                        <span class="text-dark">
                            <h3>{{ __('Actores') }}</h3>
                        </span>
                        <a href="{{ route('actores.create') }}" class="btn fondoRosa text-white">Crear actor</a>
                    </div>

                    <div class="card-body">
                        <!--  componente de búsqueda -->
                        @include('_components.search', [
                            'route' => route('actores.index'),
                            'placeholder' => 'Buscar por título',
                        ])

                        <div class="table-responsive prueba">
                            <table id="indexTable" class="table table-bordered table-dark">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($actores as $actor)
                                        <tr>
                                            <td>{{ $actor->nombre }}</td>
                                            <td>{{ $actor->email }}</td>
                                            <td>
                                                <a href="{{ route('actores.show', $actor) }}"
                                                    class="btn btn-primary btn-md">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal_{{ $actor->id }}"
                                                    data-product-id="{{ $actor->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                                <!-- VENTANA MODAL -->
                                                <div class="modal fade" id="confirmDeleteModal_{{ $actor->id }}"
                                                    tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-custom">
                                                        <!-- Aplica la clase personalizada para el tamaño del modal -->
                                                        <div class="modal-content modal-content-custom">
                                                            <!-- Aplica la clase personalizada para el contenido del modal -->
                                                            <div class="modal-header modal-header-custom">
                                                                <!-- Aplica la clase personalizada para el encabezado del modal -->
                                                                <h5 class="modal-title" id="confirmDeleteModalLabel">
                                                                    Confirmar Borrado {{ $actor->id }}</h5>
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
                                                                <form action="{{ route('actores.destroy', $actor) }}"
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
                                            <td colspan="4">No hay actores</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                            <ul class="pagination">
                                @if ($actores->previousPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $actores->appends(request()->except('page'))->previousPageUrl() }}">
                                            <span aria-hidden="true" class="text-dark">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @if ($actores->currentPage() > 3)
                                    <li class="page-item"><span class="page-link">1</span></li>
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif

                                @for ($i = max(1, $actores->currentPage() - 2); $i <= min($actores->lastPage(), $actores->currentPage() + 2); $i++)
                                    <li class="page-item @if ($i == $actores->currentPage()) active @endif">
                                        <a class="page-link"
                                            href="{{ $actores->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($actores->currentPage() < $actores->lastPage() - 2)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                    <li class="page-item"><span class="page-link">{{ $actores->lastPage() }}</span></li>
                                @endif

                                @if ($actores->nextPageUrl())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ $actores->appends(request()->except('page'))->nextPageUrl() }}"
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

@extends('layouts.panelAdministracion')

@section('title', 'Categorias')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center my-3">
                <div class="card my-4 shadow-lg w-90 px-5">
                    <div class="card-header p-0 position-relative mx-3 z-index-2" style="margin-top: -1.5rem;">
                        <div
                            class="bg-gradient-primary bg-dark rounded-3 shadow-lg border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                            <h6 class="text-white text-capitalize ps-3">Tabla de categorias</h6>

                                <a href="{{ route('categorias.create') }}" class="btn btn-success btn-md bg-gradient mb-3 mx-3">
                                    <i class="fa-solid fa-plus"></i><span class="mx-3">Añadir categoria</span>
                                </a>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-striped table-hover align-items-center mb-0 p-4 text-center">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categorias as $categoria)
                                        <tr>

                                            <td>{{ $categoria->nombre }}</td>
                                            <td>{{ $categoria->imagen }}</td>

                                            <td class="p-1">
                                                <a href="{{ route('categorias.show', $categoria) }}"
                                                    class="btn btn-primary btn-md">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal_{{ $categoria->id }}"
                                                    data-product-id="{{ $categoria->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                                <!-- VENTANA MODAL -->
                                                <div class="modal fade" id="confirmDeleteModal_{{ $categoria->id }}"
                                                    tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteModalLabel">
                                                                    Confirmar Borrado {{ $categoria->id }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Estás seguro de que deseas borrar esta categoria?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <form method="post"
                                                                    action="{{ route('categorias.destroy', $categoria) }}">
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
                                            <td colspan="7" class="text-center">No hay categorias</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if ($categorias->previousPageUrl())
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $categorias->appends(request()->except('page'))->previousPageUrl() }}">
                                    <span aria-hidden="true" class="text-dark">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @if ($categorias->currentPage() > 3)
                            <li class="page-item"><span class="page-link">1</span></li>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif

                        @for ($i = max(1, $categorias->currentPage() - 2); $i <= min($categorias->lastPage(), $categorias->currentPage() + 2); $i++)
                            <li class="page-item @if ($i == $categorias->currentPage()) active @endif">
                                <a class="page-link"
                                    href="{{ $categorias->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($categorias->currentPage() < $categorias->lastPage() - 2)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            <li class="page-item"><span class="page-link">{{ $categorias->lastPage() }}</span></li>
                        @endif

                        @if ($categorias->nextPageUrl())
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $categorias->appends(request()->except('page'))->nextPageUrl() }}"
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
@endsection

@section('footer', '©️ Netflix Egibide')

@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5" style="height: 100vh;">
            <div class="col-md-8 ">
                <div class="card card-custom">
                    <div class="card-header d-flex justify-content-between fondoRosaClaro">
                        <span class="text-dark"><h3>{{ __('Categorias') }}</h3></span>
                        <a href="{{ route('categorias.create') }}" class="btn fondoRosa text-white">Crear categoria</a>
                    </div>

                    <div class="card-body">
                        <!--  componente de búsqueda -->
                        @include('_components.search', [
                            'route' => route('categorias.index'),
                            'placeholder' => 'Buscar por título',
                        ])

                        <div class="table-responsive prueba">
                            <table id="indexTable" class="table table-bordered table-dark">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categorias as $categoria)
                                        <tr>
                                            <td>{{ $categoria->nombre }}</td>
                                            <td>
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
                                                    <div class="modal-dialog modal-dialog-custom">
                                                        <!-- Aplica la clase personalizada para el tamaño del modal -->
                                                        <div class="modal-content modal-content-custom">
                                                            <!-- Aplica la clase personalizada para el contenido del modal -->
                                                            <div class="modal-header modal-header-custom">
                                                                <!-- Aplica la clase personalizada para el encabezado del modal -->
                                                                <h5 class="modal-title" id="confirmDeleteModalLabel">
                                                                    Confirmar Borrado {{ $categoria->id }}</h5>
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
                                                                <form action="{{ route('categorias.destroy', $categoria) }}"
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
                                            <td colspan="4">No hay categorias</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

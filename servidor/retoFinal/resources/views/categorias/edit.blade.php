@extends('layouts.panelAdministracion')

@section('title', 'Editar Categoria')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary my-5">
                <h4 class="p-3 mb-5  text-white">
                    <a href="{{ route('categorias.show', $categoria) }}" class="text-indigo-300 "> <i
                        class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1"></i></a>
                    {{ __('Detalle Categorías') }}

                </h4>
                <h1 class="mb-4 border-bottom">Editar Categoria</h1>
                <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre" class="form-label"><h3>Nombre</h3></label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $categoria->nombre }}"  required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>

                    <div class="gap-2">
                        <button type="submit" class="btn bg-purple text-white">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

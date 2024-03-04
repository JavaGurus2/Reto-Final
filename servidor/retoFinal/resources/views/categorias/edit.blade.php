@extends('layouts.panelAdministracion')

@section('title', 'Editar Categoria')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary my-5">
                <h1 class="mb-4">Editar Categoria</h1>
                <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $categoria->nombre }}"  required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>

                    <div class="gap-2">
                        <button type="submit" class="btn bg-purple">Actualizar</button>
                        <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-warning">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

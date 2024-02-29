@extends('layouts.panelAdministracion')

@section('title', 'Editar Temporada')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 class="mb-4">Editar Temporada</h1>
                <form action="{{ route('temporadas.update', $temporada) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $temporada->nombre }}"  required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="number" class="form-control" id="numero" name="numero"
                            value="{{ $temporada->numero }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa el numero de la temporada.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_estreno" class="form-label">Fecha de Estreno</label>
                        <input type="number" class="form-control" id="fecha_estreno" name="fecha_estreno"
                            value="{{ $temporada->fecha_estreno }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa la fecha de estreno
                        </div>
                    </div>

                    <div class="gap-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('temporadas.show', $temporada) }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

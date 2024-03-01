@extends('layouts.panelAdministracion')

@section('title', 'Editar Serie')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 class="mb-4">Editar Serie</h1>
                <form action="{{ route('series.update', $serie) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $serie->nombre }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis"
                            value="{{ $serie->sinopsis }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una introduccion para la serie.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen"
                            value="{{ $serie->imagen }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_estreno" class="form-label">Fecha de Estreno</label>
                        <input type="date" class="form-control" id="fecha_estreno" name="fecha_estreno"
                            value="{{ $serie->fecha_estreno }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una fecha de estreno válida.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="clasificacion" class="form-label">Clasificación</label>
                        <input type="text" class="form-control" id="clasificacion" name="clasificacion"
                            value="{{ $serie->clasificacion }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una clasificación válida.
                        </div>
                    </div>


                    <div class="gap-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('series.show', $serie) }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

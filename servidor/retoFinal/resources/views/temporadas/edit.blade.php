@extends('layouts.panelAdministracion')

@section('title', 'Editar Temporada')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center ">
            <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary my-5">
                <h4 class="mb-5  text-white">
                    <a href="{{ route('temporadas.show', [$serie, $temporada]) }}" class="text-indigo-300 "> <i
                        class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1"></i></a>
                    {{ __('Detalles Temporada ') }}

                </h4>
                <h1 class="mb-4 border-bottom">Editar Temporada</h1>
                <form action="{{ route('temporadas.update', [$serie, $temporada]) }}" method="POST" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label"><h3>Nombre</h3></label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $temporada->nombre }}" required>
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
                        <input type="date" class="form-control" id="fecha_estreno" name="fecha_estreno"
                            value="{{ $temporada->fecha_estreno }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa la fecha de estreno
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

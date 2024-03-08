@extends('layouts.panelAdministracion')

@section('title', 'Crear Temporada')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded cartaShow my-5">
                <h4>
                    <a href="{{ route('series.show', $serie) }}" class="text-indigo-300"> <i
                            class="fa-solid fa-arrow-left  me-3 text-indigo-300 fondoRosa rounded text-white p-1 mb-4"></i></a>
                    {{ __('Temporadas') }}

                </h4>
                <h1 class="mb-4 border-bottom">Crear Temporada</h1>
                <form action="{{ route('temporadas.store', $serie) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">
                            <h3>Nombre</h3>
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">

                        <input type="hidden" name="numero" value="{{ $ultimoNumeroTemporada + 1 }}" required>
                        @if ($errors->has('numero'))
                            <div class="invalid-feedback">
                                {{ $errors->first('numero') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="fecha_estreno" class="form-label">
                            <h3>Fecha de Estreno</h3>
                        </label>
                        <input type="date" class="form-control" id="fecha_estreno" name="fecha_estreno" required>
                        @if ($errors->has('fecha_estreno'))
                            <div class="invalid-feedback">
                                {{ $errors->first('fecha_estreno') }}
                            </div>
                        @endif
                    </div>

                    <input type="hidden" name="serie_id" value="{{ $serie->id }}">

                    <div class="gap-2 mt-4">
                        <input type="submit" class="btn fondoRosa text-white" value="Crear">

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

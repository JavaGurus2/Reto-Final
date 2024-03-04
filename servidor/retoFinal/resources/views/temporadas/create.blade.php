@extends('layouts.panelAdministracion')

@section('title', 'Crear Temporada')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-7">
                <h1 class="mb-4">Crear Temporada</h1>
                <form action="{{ route('temporadas.store', $serie) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="text" class="form-control" id="numero" name="numero" required>
                        @if ($errors->has('numero'))
                            <div class="invalid-feedback">
                                {{ $errors->first('numero') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="fecha_estreno" class="form-label">Fecha de Estreno</label>
                        <input type="date" class="form-control" id="fecha_estreno" name="fecha_estreno" required>
                        @if ($errors->has('fecha_estreno'))
                            <div class="invalid-feedback">
                                {{ $errors->first('fecha_estreno') }}
                            </div>
                        @endif
                    </div>

                    <input type="hidden" name="serie_id" value="{{ $serie->id }}">

                    <div class="d-grid gap-2 mt-4">
                        <input type="submit" class="btn btn-primary" value="Crear">
                        <a href="{{ route('temporadas.index', $serie) }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

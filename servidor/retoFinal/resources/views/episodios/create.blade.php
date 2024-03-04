@extends('layouts.panelAdministracion')

@section('title', 'Crear Episodio')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border-dark shadow-lg p-4 rounded bg-secondary my-5">
                <h1 class="mb-4">Crear Episodio</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('episodios.store', [$serie, $temporada]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="titulo" required>
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="number" class="form-control" id="numero" name="numero" required>
                        @if ($errors->has('numero'))
                            <div class="invalid-feedback">
                                {{ $errors->first('numero') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis" required>
                        @if ($errors->has('sinopsis'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sinopsis') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="archivo">Archivo</label>
                        <input type="file" name="archivo" id="archivo" class="form-control-file" accept="video/*"
                            required>
                        <div class="invalid-feedback" id="archivoFeedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración (minutos)</label>
                        <input type="number" class="form-control" id="duracion" name="duracion" required>
                        @if ($errors->has('duracion'))
                            <div class="invalid-feedback">
                                {{ $errors->first('duracion') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="fecha_estreno">Fecha de Estreno</label>
                        <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-control" required>
                        <div class="invalid-feedback" id="fechaEstrenoFeedback"></div>
                    </div>

                    <input type="hidden" name="temporada_id" value="{{ $temporada->id }}">


                    <div class="d-grid gap-2 mt-4">
                        <input type="submit" class="btn bg-purple" value="Crear">
                        <a href="{{ route('episodios.index', [$serie, $temporada]) }}" class="btn btn-warning">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

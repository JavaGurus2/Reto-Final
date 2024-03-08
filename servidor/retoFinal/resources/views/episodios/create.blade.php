@extends('layouts.panelAdministracion')

@section('title', 'Crear Episodio')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded cartaShow my-5">
                <h4>
                    <a href="{{ route('temporadas.show', [$serie, $temporada]) }}" class="text-indigo-300"> <i
                            class="fa-solid fa-arrow-left  me-3 text-indigo-300 fondoRosa rounded text-white p-1 mb-5"></i></a>
                    {{ __('Detalles Temporada') }}

                </h4>
                <h1 class="mb-4 border-bottom">Crear Episodio</h1>

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
                        <label for="nombre" class="form-label">
                            <h3>Nombre</h3>
                        </label>
                        <input type="text" class="form-control" id="nombre" name="titulo" required>
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">

                        <input type="hidden" name="numero" value="{{ $ultimoNumeroEpisodio + 1 }}" required>
                        @if ($errors->has('numero'))
                            <div class="invalid-feedback">
                                {{ $errors->first('numero') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-5">
                        <label for="sinopsis" class="form-label">
                            <h3>Sinopsis</h3>
                        </label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis" required>
                        @if ($errors->has('sinopsis'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sinopsis') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group mb-5">
                        <label for="archivo">
                            <h3>Archivo</h3>
                        </label>
                        <input type="file" name="archivo" id="archivo"
                            class="form-control-file  bg-white p-2 rounded text-black" accept="video/*" required>
                        <div class="invalid-feedback" id="archivoFeedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">
                            <h3>Duración (minutos)</h3>
                        </label>
                        <input type="number" class="form-control" id="duracion" name="duracion" required>
                        @if ($errors->has('duracion'))
                            <div class="invalid-feedback">
                                {{ $errors->first('duracion') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="fecha_estreno">
                            <h3>Fecha de Estreno</h3>
                        </label>
                        <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-control" required>
                        <div class="invalid-feedback" id="fechaEstrenoFeedback"></div>
                    </div>

                    <input type="hidden" name="temporada_id" value="{{ $temporada->id }}">


                    <div class=" gap-2 my-4">
                        <input type="submit" class="btn fondoRosa text-white" value="Crear">

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

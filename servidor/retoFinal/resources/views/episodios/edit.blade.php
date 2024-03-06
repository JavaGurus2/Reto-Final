@extends('layouts.panelAdministracion')

@section('title', 'Editar Episodio')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary my-5">
                <h4>
                    <a href="{{ route('episodios.show', [$serie, $temporada, $episodio]) }}" class="text-indigo-300"> <i
                            class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1 mb-5"></i></a>
                    {{ __('Detalles Episodio') }}

                </h4>
                <h1 class="mb-4 border-bottom">Editar Episodio</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('episodios.update', [$serie, $temporada, $episodio]) }}" method="POST"
                    class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="titulo" class="form-label">
                            <h3>Titulo</h3>
                        </label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                            value="{{ $episodio->titulo }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">

                        <input type="hidden" class="form-control" id="numero" name="numero"
                            value="{{ $episodio->numero }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un numero para el capitulo no repetido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">
                            <h3>Sinopsis</h3>
                        </label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis"
                            value="{{ $episodio->sinopsis }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa la sinopsis del capitulo.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label">
                            <h3>Archivo</h3>
                        </label>
                        <input type="file" class="form-control" id="archivo" name="archivo"
                            value="{{ $episodio->imagen }}">
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">
                            <h3>Duración (minutos)</h3>
                        </label>
                        <input type="number" class="form-control" id="duracion" name="duracion"
                            value="{{ $episodio->duracion }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa la duracion del capitulo.
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="temporada_id" id="temporada_id" value="{{ $temporada->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_estreno" class="form-label">
                                <h3>Fecha de Estreno</h3>
                            </label>
                            <input type="date" class="form-control" id="fecha_estreno" name="fecha_estreno"
                                value="{{ $temporada->fecha_estreno }}" required>
                            <div class="invalid-feedback">
                                Por favor ingresa la fecha de estreno
                            </div>
                        </div>


                        <div class="mt-5 gap-2">
                            <button type="submit" class="btn bg-purple text-white">Actualizar</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

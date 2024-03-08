@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 my-5  ">
                <div class="card cartaShow ">
                    <div class="card-header p-3 text-white ">
                        <h4 class="p-1 m-1 ">
                            <a href="{{ route('peliculas.index') }}" class="text-indigo-300"> <i
                                    class="fa-solid fa-arrow-left  me-3 text-indigo-300 fondoRosa rounded text-white p-1"></i></a>
                            {{ __('Películas') }}
                        </h4>

                    </div>




                    <div class="card-body cartaShow">
                        @if ($edit)
                            <h1 class="mb-4 border-bottom text-black">Editar Película</h1>
                        @endif

                        @if (!$edit)
                            <a href="{{ route('peliculas.edit', $pelicula) }}" class="btn btn-warning ml-5 mb-5">Activar
                                editar</a>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="peliculaForm" method="POST" action="{{ route('peliculas.update', $pelicula) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group my-2">
                                <label for="titulo">
                                    <h3>Título</h3>
                                </label>
                                <input type="text" name="titulo" id="titulo" class="form-control"
                                    value="{{ old('titulo', $pelicula->titulo ?? '') }}"
                                    {{ $edit ? 'required' : 'disabled' }}>
                                <div class="invalid-feedback" id="tituloFeedback"></div>
                            </div>

                            <div class="form-group my-2">
                                <label for="sinopsis">
                                    <h3>Sinopsis</h3>
                                </label>
                                <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" {{ $edit ? 'required' : 'disabled' }}>{{ old('sinopsis', $pelicula->sinopsis ?? '') }}</textarea>
                                <div class="invalid-feedback" id="sinopsisFeedback"></div>
                            </div>

                            <div class="form-group my-2">
                                <label for="imagen">
                                    <h3>Imagen</h3>
                                </label>
                                <br>
                                <input type="file" name="imagen" id="imagen"
                                    class="form-control-file bg-white p-2 rounded img-fluid " accept="image/*"
                                    {{ $edit ? '' : 'disabled' }}>
                                @if (isset($pelicula->imagen))
                                    <img src="data:image/png;base64,{{ $pelicula->imagen }}" class="my-3 rounded"
                                        alt="Imagen de la película" style="max-width: 300px;">
                                @endif
                                <div class="invalid-feedback" id="imagenFeedback"></div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="form-group my-2">
                                <label for="archivo">
                                    <h3>Archivo</h3>
                                </label>
                                <br>
                                <input type="file" name="archivo" id="archivo"
                                    class="form-control-file bg-white p-2 rounded img-fluid " accept="video/*"
                                    {{ $edit ? '' : 'disabled' }}>
                                @if (isset($pelicula->archivo))
                                    <video class="rounded img-fluid" controls >
                                        <source src="{{ asset($pelicula->archivo) }}" class="img-fluid">
                                    </video>
                                @endif
                                <div class="invalid-feedback" id="archivoFeedback"></div>
                            </div>

                            <div class=" mb-3 form-group my-2">
                                <label for="fecha_estreno">
                                    <h3>Fecha de Estreno</h3>
                                </label>
                                <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-control"
                                    value="{{ old('fecha_estreno', $pelicula->fecha_estreno ?? '') }}"
                                    {{ $edit ? 'required' : 'disabled' }}>
                                <div class="invalid-feedback" id="fechaEstrenoFeedback"></div>
                            </div>
                            <!-- CATEGORIAS -->
                            <div class="mb-3 my-2">
                                <div class="card p-3">
                                    <label for="categoria" class="form-label">
                                        <h3>Categoría</h3>
                                    </label>

                                    <div class="row">
                                        @foreach ($categorias as $categoria)
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="categorias[]"
                                                        value="{{ $categoria->id }}" id="{{ $categoria->nombre }}"
                                                        {{ $pelicula->categorias->contains($categoria) ? 'checked' : '' }}
                                                        {{ $edit ? '' : 'disabled' }}>
                                                    <label class="form-check-label"
                                                        for="{{ $categoria->nombre }}">{{ $categoria->nombre }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('categorias[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- ACTORES -->
                            <div class="mb-3 my-2">
                                <div class="card p-3">
                                    <label for="actor" class="form-label">
                                        <h3>Actor</h3>
                                    </label>

                                    <div class="row">
                                        @foreach ($actores as $actor)
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="actores[]"
                                                        value="{{ $actor->id }}" id="{{ $actor->nombre }}"
                                                        {{ $pelicula->actores->contains($actor) ? 'checked' : '' }}
                                                        {{ $edit ? '' : 'disabled' }}>
                                                    <label class="form-check-label"
                                                        for="{{ $actor->nombre }}">{{ $actor->nombre }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('actores[]')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn fondoRosa text-white" id="submitButton"
                                {{ $edit ? '' : 'disabled' }}>Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict'

            var form = document.getElementById('peliculaForm');
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);

            // Validación  para la fecha
            var fechaEstrenoInput = document.getElementById('fecha_estreno');
            fechaEstrenoInput.addEventListener('change', function() {
                var selectedDate = new Date(fechaEstrenoInput.value);
                var currentDate = new Date();
                if (selectedDate > currentDate) {
                    fechaEstrenoInput.classList.add('is-invalid');
                    document.getElementById('fechaEstrenoFeedback').textContent =
                        'La fecha no puede ser posterior a la actual';
                } else {
                    fechaEstrenoInput.classList.remove('is-invalid');
                    document.getElementById('fechaEstrenoFeedback').textContent = '';
                }
            });
        })();
    </script>
@endsection

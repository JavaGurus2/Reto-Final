@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Peliculas') }}
                        <a href="{{ route('peliculas.edit', $pelicula) }}">Editar</a>
                        <a href="{{ route('peliculas.index') }}">Volver</a>
                    </div>

                    <div class="card-body">
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

                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control"
                                    value="{{ old('titulo', $pelicula->titulo ?? '') }}"
                                    {{ $edit ? 'required' : 'disabled' }}>
                                <div class="invalid-feedback" id="tituloFeedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="sinopsis">Sinopsis</label>
                                <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" {{ $edit ? 'required' : 'disabled' }}>{{ old('sinopsis', $pelicula->sinopsis ?? '') }}</textarea>
                                <div class="invalid-feedback" id="sinopsisFeedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" id="imagen" class="form-control-file"
                                    accept="image/*" {{ $edit ? '' : 'disabled' }}>
                                @if (isset($pelicula->imagen))
                                    <img src="{{ asset($pelicula->imagen) }}" alt="Imagen de la película"
                                        style="max-width: 100px;">
                                @endif
                                <div class="invalid-feedback" id="imagenFeedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="archivo">Archivo</label>
                                <input type="file" name="archivo" id="archivo" class="form-control-file"
                                    accept="video/*" {{ $edit ? '' : 'disabled' }}>
                                @if (isset($pelicula->archivo))
                                    <video controls style="max-width: 100px;">
                                        <source src="{{ asset($pelicula->archivo) }}">
                                    </video>
                                @endif
                                <div class="invalid-feedback" id="archivoFeedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="fecha_estreno">Fecha de Estreno</label>
                                <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-control"
                                    value="{{ old('fecha_estreno', $pelicula->fecha_estreno ?? '') }}"
                                    {{ $edit ? 'required' : 'disabled' }}>
                                <div class="invalid-feedback" id="fechaEstrenoFeedback"></div>
                            </div>

                            <button type="submit" class="btn btn-primary" id="submitButton"
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

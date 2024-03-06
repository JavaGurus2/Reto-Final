@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8 cartaShow">
                <div class="  box-shadow ">
                    <h4 class="p-3 m-1  text-white">
                        <a href="{{ route('peliculas.index') }}" class="text-indigo-300 "> <i
                                class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-black p-1"></i></a>
                        {{ __('Películas') }}

                    </h4>

                    <div class=" ">
                        <h1 class="mb-4 border-bottom text-white">Crear Película</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="peliculaForm" method="POST" action="{{ route('peliculas.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="titulo">
                                    <h3>Título</h3>
                                </label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                                <div class="invalid-feedback" id="tituloFeedback"></div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="sinopsis">
                                    <h3>Sinopsis</h3>
                                </label>
                                <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" required></textarea>
                                <div class="invalid-feedback" id="sinopsisFeedback"></div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="imagen">
                                    <h3>Imagen</h3>
                                </label>
                                <input type="file" name="imagen" id="imagen"
                                    class="form-control-file bg-white p-2 rounded " accept="image/*" required>
                                <div class="invalid-feedback" id="imagenFeedback"></div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="archivo">
                                    <h3>Archivo</h3>
                                </label>
                                <input type="file" name="archivo" id="archivo"
                                    class="form-control-file bg-white p-2 rounded " accept="video/*" required>
                                <div class="invalid-feedback" id="archivoFeedback"></div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="fecha_estreno">
                                    <h3>Fecha de Estreno</h3>
                                </label>
                                <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-control" required>
                                <div class="invalid-feedback" id="fechaEstrenoFeedback"></div>
                            </div>
                            <!-- CATEGORIAS -->
                            <div class="mb-3">
                                <div class="card p-3">
                                    <label for="categoria" class="form-label">
                                        <h3>Categoría</h3>
                                    </label>

                                    <div class="row">
                                        @foreach ($categorias as $categoria)
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="categorias[]"
                                                        value="{{ $categoria->id }}" id="{{ $categoria->nombre }}">
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
                            <div class="mb-3">
                                <div class="card p-3">
                                    <label for="categoria" class="form-label">
                                        <h3>Actor/Actriz</h3>
                                    </label>

                                    <div class="row">
                                        @foreach ($actores as $actor)
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="actores[]"
                                                        value="{{ $actor->id }}" id="{{ $actor->nombre }}">
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

                            <button type="submit" class="btn bg-purple text-white ">Crear Película</button>
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

            // Validación  para el título
            var tituloInput = document.getElementById('titulo');
            tituloInput.addEventListener('blur', function() {
                if (!tituloInput.value.trim()) {
                    tituloInput.classList.add('is-invalid');
                    document.getElementById('tituloFeedback').textContent = 'El título es requerido.';
                } else {
                    tituloInput.classList.remove('is-invalid');
                    document.getElementById('tituloFeedback').textContent = '';
                }
            });

            // Validación  para la sinopsis
            var sinopsisInput = document.getElementById('sinopsis');
            sinopsisInput.addEventListener('blur', function() {
                if (!sinopsisInput.value.trim()) {
                    sinopsisInput.classList.add('is-invalid');
                    document.getElementById('sinopsisFeedback').textContent = 'La sinopsis es requerida.';
                } else {
                    sinopsisInput.classList.remove('is-invalid');
                    document.getElementById('sinopsisFeedback').textContent = '';
                }
            });

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

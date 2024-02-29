@extends('layouts.panelAdministracion')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Peliculas') }}</div>

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
                        <form id="peliculaForm" method="POST" action="{{ route('peliculas.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                                <div class="invalid-feedback" id="tituloFeedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="sinopsis">Sinopsis</label>
                                <textarea name="sinopsis" id="sinopsis" class="form-control" rows="4" required></textarea>
                                <div class="invalid-feedback" id="sinopsisFeedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" id="imagen" class="form-control-file"
                                    accept="image/*" required>
                                <div class="invalid-feedback" id="imagenFeedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="archivo">Archivo</label>
                                <input type="file" name="archivo" id="archivo" class="form-control-file"
                                    accept="video/*" required>
                                <div class="invalid-feedback" id="archivoFeedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="fecha_estreno">Fecha de Estreno</label>
                                <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-control" required>
                                <div class="invalid-feedback" id="fechaEstrenoFeedback"></div>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Película</button>
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

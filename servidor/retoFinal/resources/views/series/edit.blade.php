@extends('layouts.panelAdministracion')

@section('title', 'Editar Serie')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center  ">
            <div class="col-8 border-dark shadow-lg p-4 rounded bg-secondary">
                <h1 class="mb-4">Editar Serie</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('series.update', $serie) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $serie->nombre }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis"
                            value="{{ $serie->sinopsis }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una introduccion para la serie.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen"
                            value="{{ $serie->imagen }}">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_estreno" class="form-label">Fecha de Estreno</label>
                        <input type="date" class="form-control" id="fecha_estreno" name="fecha_estreno"
                            value="{{ $serie->fecha_estreno }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una fecha de estreno válida.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="clasificacion" class="form-label">Clasificación</label>
                        <input type="text" class="form-control" id="clasificacion" name="clasificacion"
                            value="{{ $serie->clasificacion }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una clasificación válida.
                        </div>
                    </div>

                    <!-- CATEGORIAS -->
                    <div class="mb-3">
                        <div class="card p-3">
                            <label for="categoria" class="form-label">Categoría</label>

                            <div class="row">
                                @foreach ($categorias as $categoria)
                                    <div class="col-6 col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categorias[]"
                                                value="{{ $categoria->id }}" id="{{ $categoria->nombre }}"
                                                {{ $serie->categorias->contains($categoria) ? 'checked' : '' }}>
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
                            <label for="actor" class="form-label">Actor</label>

                            <div class="row">
                                @foreach ($actores as $actor)
                                    <div class="col-6 col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="actores[]"
                                                value="{{ $actor->id }}" id="{{ $actor->nombre }}"
                                                {{ $serie->actores->contains($actor) ? 'checked' : '' }}>
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


                    <div class="gap-2">
                        <button type="submit" class="btn bg-purple ">Actualizar</button>
                        <a href="{{ route('series.show', $serie) }}" class="btn btn-warning">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

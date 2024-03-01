@extends('layouts.panelAdministracion')

@section('title', 'Crear Serie')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-7">
                <h1 class="mb-4">Crear Serie</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis" required>
                        @if ($errors->has('sinopsis'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sinopsis') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" required>
                        @error('archivo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

                    <div class="mb-3">
                        <label for="clasificacion" class="form-label">Clasificación</label>
                        <input type="text" class="form-control" id="clasificacion" name="clasificacion" required>
                        @if ($errors->has('clasificacion'))
                            <div class="invalid-feedback">
                                {{ $errors->first('clasificacion') }}
                            </div>
                        @endif
                    </div>
                    <!-- CATEGORIAS -->
                    <!-- CATEGORIAS -->
                    <div class="mb-3">
                        <div class="card p-3">
                            <label for="categoria" class="form-label">Categoría</label>

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
                            <label for="categoria" class="form-label">Categoría</label>

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




                    <div class="d-grid gap-2 mt-4">
                        <input type="submit" class="btn btn-primary" value="Crear">
                        <a href="{{ route('series.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

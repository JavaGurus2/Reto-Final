@extends('layouts.panelAdministracion')

@section('title', 'Editar Serie')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center  ">
            <div class="col-8 border border-dark shadow-lg p-4 rounded cartaShow mb-2">


                <h4>
                    <a href="{{ route('series.show',$serie) }}" class="text-indigo-300 "> <i
                        class="fa-solid fa-arrow-left  me-3 text-indigo-300 fondoRosa rounded text-white p-1 mb-4"></i></a>
                    {{ __('Detalles Serie') }}
                </h4>


                <h1 class="mb-4 border-bottom">Editar Serie</h1>

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
                        <label for="nombre" class="form-label"><h3>Nombre</h3></label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $serie->nombre }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label"><h3>Sinopsis</h3></label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis"
                            value="{{ $serie->sinopsis }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una introduccion para la serie.
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="file" name="imagen" id="imagen" class="form-control-file bg-white p-2 rounded ">

                    @if (isset($serie->imagen))
                        <img src="{{ asset($serie->imagen) }}" class="my-3 rounded img-fluid" alt="Imagen de la serie"
                            style="max-width: 300px;">
                    @endif
                    <div class="invalid-feedback" id="imagenFeedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_estreno" class="form-label"><h3>Fecha de Estreno</h3></label>
                        <input type="date" class="form-control" id="fecha_estreno" name="fecha_estreno"
                            value="{{ $serie->fecha_estreno }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una fecha de estreno válida.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="clasificacion" class="form-label"><h3>Clasificación</h3></label>
                        <input type="text" class="form-control" id="clasificacion" name="clasificacion"
                            value="{{ $serie->clasificacion }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una clasificación válida.
                        </div>
                    </div>

                    <!-- CATEGORIAS -->
                    <div class="mb-3">
                        <div class="card p-3">
                            <label for="categoria" class="form-label"><h3>Categoría</h3></label>

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
                            <label for="actor" class="form-label"><h3>Actor</h3></label>

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
                        <button type="submit" class="btn fondoRosa text-white ">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

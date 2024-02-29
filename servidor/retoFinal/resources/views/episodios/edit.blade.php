@extends('layouts.panelAdministracion')

@section('title', 'Editar Episodio')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 class="mb-4">Editar Episodio</h1>
                <form action="{{ route('episodios.update', $episodio) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $episodio->nombre }}"  required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="number" class="form-control" id="numero" name="numero"
                            value="{{ $episodio->numero }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un numero para el capitulo no repetido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis"
                            value="{{ $episodio->sinopsis }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa la sinopsis del capitulo.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Archivo</label>
                        <input type="file" class="form-control" id="archivo" name="archivo"
                            value="{{ $episodio->imagen }}" >
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración (minutos)</label>
                        <input type="number" class="form-control" id="duracion" name="duracion"
                            value="{{ $episodio->duracion }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa la duracion del capitulo.
                        </div>


                    <div class="gap-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('episodios.show', $episodio) }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

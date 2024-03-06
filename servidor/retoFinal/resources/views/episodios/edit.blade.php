@extends('layouts.panelAdministracion')

@section('title', 'Editar Episodio')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary my-5">
                <h1 class="mb-4">Editar Episodio</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('episodios.update', [$serie,$temporada,$episodio]) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label"><h3>Nombre</h3></label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $episodio->nombre }}"  required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label"><h3>Numero</h3></label>
                        <input type="number" class="form-control" id="numero" name="numero"
                            value="{{ $episodio->numero }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un numero para el capitulo no repetido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label"><h3>Sinopsis</h3></label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis"
                            value="{{ $episodio->sinopsis }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa la sinopsis del capitulo.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label"><h3>Archivo</h3></label>
                        <input type="file" class="form-control" id="archivo" name="archivo"
                            value="{{ $episodio->imagen }}" >
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label"><h3>Duración (minutos)</h3></label>
                        <input type="number" class="form-control" id="duracion" name="duracion"
                            value="{{ $episodio->duracion }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa la duracion del capitulo.
                        </div>


                    <div class="mt-5 gap-2">
                        <button type="submit" class="btn bg-purple">Actualizar</button>
                        <a href="{{ route('episodios.show', [$serie,$temporada,$episodio]) }}" class="btn btn-warning">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

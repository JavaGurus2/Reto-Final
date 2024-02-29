@extends('layouts.panelAdministracion')

@section('title', 'Crear Episodio')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-7">
                <h1 class="mb-4">Crear Episodio</h1>
                <form action="{{ route('episodios.store') }}" method="POST"  enctype="multipart/form-data">
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
                        <label for="numero" class="form-label">Numero</label>
                        <input type="number" class="form-control" id="numero" name="numero" required>
                        @if ($errors->has('numero'))
                            <div class="invalid-feedback">
                                {{ $errors->first('numero') }}
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
                        <label for="archivo" class="form-label">Archivo</label>
                        <input type="file" class="form-control" id="archivo" name="archivo"  required>
                        @error('archivo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración (minutos)</label>
                        <input type="number" class="form-control" id="duracion" name="duracion" required>
                        @if ($errors->has('duracion'))
                            <div class="invalid-feedback">
                                {{ $errors->first('duracion') }}
                            </div>
                        @endif
                    </div>


                    <div class="d-grid gap-2 mt-4">
                        <input type="submit" class="btn btn-primary" value="Crear">
                        <a href="{{ route('episodios.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

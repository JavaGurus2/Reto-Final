@extends('layouts.panelAdministracion')

@section('title', 'Crear Actor/Actriz')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary">
                <h1 class="mb-4">Crear Actor/Actriz</h1>
                <form action="{{ route('actores.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                        @if ($errors->has('apellido'))
                            <div class="invalid-feedback">
                                {{ $errors->first('apellido') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 m-5">
                        <input type="submit" class="btn bg-purple " value="Crear">
                        <a href="{{ route('actores.index') }}" class="btn btn-warning">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

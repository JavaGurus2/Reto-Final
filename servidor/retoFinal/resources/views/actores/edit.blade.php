@extends('layouts.panelAdministracion')

@section('title', 'Editar Actor/actriz')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 class="mb-4">Editar actor/actriz</h1>
                <form action="{{ route('actores.update', $actore) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $actore->nombre }}"  required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido"
                            value="{{ $actore->apellido }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un apellido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $actore->email }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un correo electrónico.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen"
                            value="{{ $actore->imagen }}" >
                    </div>
                    <div class="gap-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('actores.show', $actore) }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection
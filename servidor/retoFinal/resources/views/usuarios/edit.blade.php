@extends('layouts.panelAdministracion')

@section('title', 'Editar Usuario')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 class="mb-4">Editar Usuario</h1>
                <form action="{{ route('usuarios.update', $user) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $user->name }}"  required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $user->email }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un correo electrónico.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ $user->password }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una contraseña.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen"
                            value="{{ $user->imagen }}" >
                    </div>
                    <div class="gap-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('usuarios.show', $user) }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

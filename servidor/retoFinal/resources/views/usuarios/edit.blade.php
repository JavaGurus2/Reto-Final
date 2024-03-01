@extends('layouts.panelAdministracion')

@section('title', 'Editar Usuario')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 class="mb-4">Editar Usuario</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('usuarios.update', $user) }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"
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
                        <input type="file" class="form-control" id="imagen" name="imagen">
                            @if (isset($user->imagen))
                            <img src="{{ asset($user->imagen) }}" alt="Imagen del usuario"
                                style="max-width: 100px;">
                        @endif
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rol" name="rol" value="1" {{ $user->rol ? 'checked' : '' }}>
                        <label class="form-check-label" for="rol">Asignar Rol</label>
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

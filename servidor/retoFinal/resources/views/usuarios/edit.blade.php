@extends('layouts.panelAdministracion')

@section('title', 'Editar Usuario')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col  border border-dark shadow-lg p-4 rounded bg-secondary">
                <h4 class="mb-3 p-1 m-1">
                    <a href="{{ route('usuarios.show', $user) }}" class="text-indigo-300"> <i
                        class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1"></i></a>
                    {{ __('Detalles Usuario') }}

                </h4>
                <h1 class="mb-4 border-bottom">Editar Usuario</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('usuarios.update', $user) }}" method="POST" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label"><h3>Nombre</h3></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            required>
                        <div class="invalid-feedback">
                            Por favor ingresa un nombre.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><h3>Email</h3></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                            required>
                        <div class="invalid-feedback">
                            Por favor ingresa un correo electrónico.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><h3>Contraseña</h3></label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ $user->password }}" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una contraseña.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label"><h3>imagen</h3></label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                        @if (isset($user->imagen))
                            <img src="{{ asset($user->imagen) }}" alt="Imagen del usuario" class="my-4"
                                style="max-width: 350px; ">
                        @endif
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rol" name="rol" value="1"
                            {{ $user->rol ? 'checked' : '' }}>
                        <label class="form-check-label" for="rol"><h3>Asignar Rol</h3></label>
                    </div>

                    <div class="gap-2">
                        <button type="submit" class="btn bg-purple text-white">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

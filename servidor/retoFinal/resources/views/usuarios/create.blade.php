@extends('layouts.panelAdministracion')

@section('title', 'Crear Usuario')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-7">
                <h1 class="mb-4">Crear Usuario</h1>
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <form action="{{ route('usuarios.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
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
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rol" name="rol" value="1" >
                        <label class="form-check-label" for="rol">Asignar Rol</label>
                    </div>


                    <div class="d-grid gap-2 mt-4">
                        <input type="submit" class="btn btn-primary" value="Crear">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

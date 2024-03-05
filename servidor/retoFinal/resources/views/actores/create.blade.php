@extends('layouts.panelAdministracion')

@section('title', 'Crear Actor/Actriz')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary">
                <h4 class="p-3 m-1  text-white">
                    <a href="{{ route('actores.index') }}" class="text-indigo-300 "> <i
                        class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1"></i></a>
                    {{ __('Actores/Actrices') }}

                </h4>
                <h1 class="mb-4 border-bottom">Crear Actor/Actriz</h1>
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

                    <div class="  gap-2 m-5">
                        <input type="submit" class="btn bg-purple text-white" value="Crear">
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

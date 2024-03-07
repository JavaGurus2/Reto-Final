@extends('layouts.panelAdministracion')

@section('title', 'Editar Actor/actriz')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border border-dark shadow-lg p-4 rounded cartaShow">
                <h4 class="p-3 m-1  text-white">
                    <a href="{{ route('actores.show', $actore) }}" class="text-indigo-300 "> <i
                        class="fa-solid fa-arrow-left  me-3 text-indigo-300 fondoRosa rounded text-white p-1"></i></a>
                    {{ __('Detalles Actor/Actriz') }}

                </h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1 class="mb-4 border-bottom">Editar actor/actriz</h1>
                <form action="{{ route('actores.update', $actore) }}" method="POST" class="needs-validation" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $actore->nombre }}" required>
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
                        <input type="file" class="form-control" id="imagen" name="imagen">
                        @if (isset($actore->imagen))
                            <img src="{{ asset($actore->imagen) }}" alt="Imagen de la película" class="my-4 rounded img-fluid" style="max-width: 300px;">
                        @endif

                    </div>
                    <div class="gap-2">
                        <button type="submit" class="btn fondoRosa text-white">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
@endsection

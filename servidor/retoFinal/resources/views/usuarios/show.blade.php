@extends('layouts.panelAdministracion')

@section('title', 'Ver Usuario')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h1 class="mb-4">Detalle del Usuario</h1>
            </div>

            <div class="card">
                <div class="card-header">
                    Información del usuario
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $user->name }}</dd>
                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>
                        <dt class="col-sm-4">Contraseña:</dt>
                        <dd class="col-sm-8">{{ $user->password }}</dd>
                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8">{{ $user->imagen }}</dd>
                    </dl>
                </div>
                <div class="px-3 mt-4">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary me-2">Volver</a>
                    <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.panelAdministracion')

@section('title', 'Ver Usuario')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-8  border border-dark shadow-lg p-4 rounded bg-secondary">
            <div>
                <h1 class="mb-4">Detalle del Usuario</h1>
            </div>

            <div class="card border">
                <div class="card-header">
                    <h3>Información del usuario</h3>
                </div>
                <div class="card-body  ">
                    <dl class="row ">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $user->name }}</dd>
                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8"> <img src="{{ asset($user->imagen) }}" alt="Imagen del usuario"
                                style="max-width: 300px;"></dd>
                    </dl>
                </div>
                <div class="px-3 mt-4">
                    <a href="{{ route('usuarios.edit', $user) }}" class="btn bg-purple">Editar</a>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-warning me-2">Volver</a>
                </div>
            </div>
        </div>

    </div>
@endsection

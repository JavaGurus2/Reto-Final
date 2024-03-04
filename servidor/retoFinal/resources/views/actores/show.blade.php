@extends('layouts.panelAdministracion')

@section('title', 'Ver Actor/Actriz')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-8 border-dark shadow-lg p-4 rounded bg-secondary">
            <div>
                <h1 class="mb-4">Detalle del actor/actriz</h1>
            </div>

            <div class="card">
                <div class="card-header">
                   <h3>Información del actor/actriz</h3>
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $actore->nombre }}</dd>
                        <dt class="col-sm-4">Apellido:</dt>
                        <dd class="col-sm-8">{{ $actore->apellido }}</dd>
                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $actore->email }}</dd>
                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8">
                            <img src="{{ asset($actore->imagen) }}" alt="Imagen del actor" style="max-width: 100px;">
                        </dd>
                    </dl>
                </div>
                <div class="px-3 mt-4">
                    <a href="{{ route('actores.edit', $actore) }}" class="btn bg-purple">Editar</a>
                    <a href="{{ route('actores.index') }}" class="btn btn-warning me-2">Volver</a>
                </div>
            </div>
        </div>

    </div>
@endsection

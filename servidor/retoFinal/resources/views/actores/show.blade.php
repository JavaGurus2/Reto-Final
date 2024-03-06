@extends('layouts.panelAdministracion')

@section('title', 'Ver Actor/Actriz')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-8 border-dark shadow-lg p-4 rounded cartaShow">
            <div>
                <h4 class="p-3 m-1  text-white">
                    <a href="{{ route('actores.index') }}" class="text-indigo-300 "> <i
                            class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1"></i></a>
                    {{ __('Actores/Actrices') }}

                </h4>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Información del actor/actriz</h3>
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $actore->nombre }}</dd>
                        <hr>
                        <dt class="col-sm-4">Apellido:</dt>
                        <dd class="col-sm-8">{{ $actore->apellido }}</dd>
                        <hr>
                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $actore->email }}</dd>
                        <hr>
                        <dt class="col-sm-4">Imagen:</dt>
                        <dd class="col-sm-8">
                            <img src="{{ asset($actore->imagen) }}" alt="Imagen del actor" class="rounded box-shadow"
                                style="max-width: 300px;">
                        </dd>
                    </dl>
                </div>
                <div class="px-3 mt-4 mb-2">
                    <a href="{{ route('actores.edit', $actore) }}" class="btn bg-purple text-white">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection

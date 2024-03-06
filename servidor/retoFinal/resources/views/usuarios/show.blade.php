@extends('layouts.panelAdministracion')

@section('title', 'Ver Usuario')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-8  border border-dark shadow-lg p-4 rounded cartaShow">
            <div>
                <h4 class="mb-3 p-1 m-1">
                    <a href="{{ route('usuarios.index') }}" class="text-indigo-300"> <i
                            class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1"></i></a>
                    {{ __('Usuarios') }}

                </h4>
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
                <div class="px-3 my-4">
                    <a href="{{ route('usuarios.edit', $user) }}" class="btn bg-purple text-white">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection

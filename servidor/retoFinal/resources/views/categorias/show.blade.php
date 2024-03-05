@extends('layouts.panelAdministracion')

@section('title', 'Ver Categoria')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 border border-dark shadow-lg p-4 rounded bg-secondary my-5">
            <div>
                <h4 class="p-3 m-1  text-white">
                    <a href="{{ route('categorias.index') }}" class="text-indigo-300 "> <i
                        class="fa-solid fa-arrow-left  me-3 text-indigo-300 bg-purple rounded text-white p-1"></i></a>
                    {{ __('Categorías') }}

                </h4>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Información de la categoria</h3>
                </div>
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $categoria->nombre }}</dd>
                        <hr>

                    </dl>
                </div>
                <div class="px-3 mt-4 mb-2">
                    <a href="{{ route('categorias.edit', $categoria) }}" class="btn text-white bg-purple">Editar</a>
                </div>
            </div>
        </div>

    </div>
@endsection
